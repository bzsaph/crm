<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Stock;
use App\Client;
use App\Company;
use App\SoldProduct;
use App\TaxCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;  // Use this import statement
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
{
    // Display a listing of the sales
    public function index()
    {
        // Logged-in user
        $user = Auth::user();

        // Get user's company safely
        $company = $user->companies()->first();

        if (!$company) {
            abort(403, 'No company assigned to this user.');
        }

        // Fetch sales for this company
        $sales = DB::table('sales')
            ->join('clients', 'sales.client_id', '=', 'clients.id')
            ->join('companies', 'sales.sold_from', '=', 'companies.id')
            ->where('sales.sold_from', $company->id)
            ->select(
                'sales.id',
                'clients.name as client_name',
                'sales.invoice_number',
                'sales.invoicedate'
            )
            ->orderBy('sales.created_at', 'desc')
            ->get();

        return view('admin.sales.index', [
            'sales' => $sales,
            'loggedInUserCompanies' => $company->id
        ]);
    }
    // Show the form for creating a new sale
    public function create()
    {

        try {
            $clients = Client::all();
            $companyId = Auth::user()->companies->first()->id ?? null;

            if ($companyId) {
                // Get stocks created by users in the same company
                $stocks = Stock::whereIn('loged_in_id', function ($query) use ($companyId) {
                    $query->select('users.id')
                        ->from('users')
                        ->join('company_users', 'users.id', '=', 'company_users.user_id')
                        ->where('company_users.company_id', $companyId);
                })->get();
            } else {
                $stocks = collect(); // empty collection if no company
            }
            return view('admin.sales.create', compact('clients', 'stocks'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Sale not found
            return redirect()->route('sales.index')->with('error', 'Sale not found.');
        } catch (\Exception $e) {
            // Any other exception
            return redirect()->route('sales.index')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }




    public function store(Request $request)
    {
        // Decode products JSON
        $products = json_decode($request->products, true);
        $request->merge(['products' => $products]);

        // Validation
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoicedate' => 'required|date',
            'sale_type' => 'required|string',
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:stocks,id',
            'products.*.quantity' => 'required|numeric|min:1',
            'products.*.unit_price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $invoiceNumber = 'INV-' . strtoupper(uniqid());

            // CREATE SALE (✔ invoicedate included)
            $sale = Sale::create([
                'client_id'     => $request->client_id,
                'invoice_number' => $invoiceNumber,
                'invoicedate'   => $request->invoicedate, // 🔴 IMPORTANT
                'sold_from'     => Auth::user()->companies->first()->id ?? null,
                'loged_in_id'   => Auth::id(),
            ]);

            foreach ($products as $product) {
                $stock = Stock::findOrFail($product['product_id']);

                $unitPrice = $product['unit_price'];
                $quantity  = $product['quantity'];
                $totalPrice = $unitPrice * $quantity;

                $taxRate = $stock->taxCode ? TaxCode::where('name', $stock->taxCode)->value('rate') ?? 0 : 0;

                $sale->soldProducts()->create([
                    'stock_id'          => $stock->id,
                    'quantity'          => $quantity,
                    'unit_price'        => $unitPrice,
                    'total_price'       => $totalPrice,
                    'invoice_number'    => $invoiceNumber,
                    'sale_type'         => $request->sale_type,
                    'currency'          => $request->currency ?? 'RWF',
                    'sold_from'         => Auth::user()->companies->first()->id ?? null,
                    'loged_in_id'       => Auth::id(),

                    // From request
                    'company_tin'       => Auth::user()->companies->first()->tinnumber ?? null,
                    'computation_type'  => $request->computation_type ?? 'INCLUSIVE',
                    'voucher_amount'    => $request->voucher_amount ?? 0,
                    'discount_amount'   => $request->discount_amount ?? 0,
                    'business_partner_name' => optional($sale->client)->name,
                    'invoice_date'      => $request->invoicedate,
                    'client_tin'        => $request->company_tin,
                    'total_amount'      => $totalPrice,  // per item
                    'total_vat'         => ($totalPrice * $taxRate / 100),
                    'client_tin_pin'    => optional($sale->client)->pin,
                    'exchange_rate'     => $request->exchange_rate ?? 1,
                    'discount_type'     => $request->discount_type ?? '',

                    // From stock
                    'item_code'         => $stock->itemCd ?? null,
                    'item_description'  => $stock->description ?? null,
                    'item_category'     => $stock->itemClsCd ?? null,
                    'batch'             => $product['batch'] ?? null,
                    'tax_code'          => $stock->taxCode ?? null,
                    'tax_rate'          => $taxRate,
                    'expire_date'       => $product['expire_date'] ?? null,
                ]);

                // Deduct stock
                $stock->remaining_stock -= $quantity;
                $stock->save();
            }

            DB::commit();

            return redirect()
                ->route('sales.index')
                ->with('success', "Sale recorded successfully");
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());

            return back()
                ->withInput() // 🔴 keeps ALL form data
                ->withErrors([
                    'error' => 'Failed to record sale: ' . $e->getMessage()
                ]);
        }
    }

    // Display the specified sale
    public function show($id)
    {
        try {
            $sale = Sale::findOrFail($id);
            return view('admin.sales.show', compact('sale'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Sale not found
            return redirect()->route('sales.index')->with('error', 'Sale not found.');
        } catch (\Exception $e) {
            // Any other exception
            return redirect()->route('sales.index')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    // Show the form for editing the specified sale
    public function edit($id)
    {
        try {
            // Find the sale, will throw ModelNotFoundException if not found
            $sale = Sale::findOrFail($id);

            // Get logged-in user's company ID
            $companyId = Auth::user()->companies->first()->id ?? null;

            // Get clients related to the sale (adjust if needed)
            $clients = Client::where('company_id', $companyId)->get();
            // Get stocks created by users in the same company
            if ($companyId) {
                $stocks = Stock::whereIn('loged_in_id', function ($query) use ($companyId) {
                    $query->select('users.id')
                        ->from('users')
                        ->join('company_users', 'users.id', '=', 'company_users.user_id')
                        ->where('company_users.company_id', $companyId);
                })->get();
            } else {
                $stocks = collect(); // empty collection if no company
            }

            return view('admin.sales.edit', compact('sale', 'clients', 'stocks'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Sale not found
            return redirect()->route('sales.index')->with('error', 'Sale not found.');
        } catch (\Exception $e) {
            // Any other exception
            return redirect()->route('sales.index')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    // Update the specified sale in storage
    public function update(Request $request, $saleId)
    {
       
        $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'nullable|exists:sold_products,id',
            'products.*.stock_id' => 'required|exists:stocks,id',
            'products.*.quantity' => 'required|numeric|min:1',
            'products.*.unit_price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $sale = Sale::findOrFail($saleId);

            // Load tax codes once
            $taxCodes = TaxCode::pluck('rate', 'name');

            $totalAmount = 0;
            $totalVat = 0;

            foreach ($request->products as $productData) {

                // =======================
                // NEW PRODUCT
                // =======================
                if (empty($productData['id'])) {
                    $stock = Stock::findOrFail($productData['stock_id']);
                    $requestedQty = $productData['quantity'];

                    if ($requestedQty > $stock->remaining_stock) {
                        $requestedQty = $stock->remaining_stock;
                        session()->flash('warning', "Only {$requestedQty} units of {$stock->item_name} are available. Quantity adjusted.");
                    }

                    $unitPrice = $productData['unit_price'];
                    $totalPrice = $requestedQty * $unitPrice;

                    $taxRate = $taxCodes[$stock->taxCode] ?? 0;
                    $vatAmount = ($totalPrice * $taxRate) / 100;

                    $totalAmount += $totalPrice;
                    $totalVat += $vatAmount;

                    SoldProduct::create([
                        'sale_id'             => $saleId,
                        'stock_id'            => $stock->id,
                        'quantity'            => $requestedQty,
                        'unit_price'          => $unitPrice,
                        'total_price'         => $totalPrice,
                        'invoice_number'      => $sale->invoice_number,
                        'invoice_date'        => $sale->invoicedate,
                        'currency'            => $request->currency ?? 'RWF',
                        'sale_type'           => $request->sale_type,
                        'company_tin'         => $request->company_tin,
                        'computation_type'    => $request->computation_type ?? 'INCLUSIVE',
                        'voucher_amount'      => $request->voucher_amount ?? 0,
                        'discount_amount'     => $request->discount_amount ?? 0,
                        'business_partner_name' => optional($sale->client)->name,
                        'client_tin'          => optional($sale->client)->tin,
                        'total_amount'        => $totalPrice,
                        'total_vat'           => $vatAmount,
                        'client_tin_pin'      => optional($sale->client)->pin,
                        'exchange_rate'       => $request->exchange_rate ?? 1,
                        'discount_type'       => $request->discount_type ?? '',

                        // Item-specific
                        'item_code'           => $stock->itemCd ?? null,
                        'item_description'    => $stock->description ?? null,
                        'item_category'       => $stock->itemClsCd ?? null,
                        'batch'               => $productData['batch'] ?? null,
                        'tax_code'            => $stock->taxCode ?? null,
                        'tax_rate'            => $taxRate,
                        'expire_date'         => $productData['expire_date'] ?? null,

                        'sold_from'           => Auth::user()->companies->first()->id ?? null,
                        'loged_in_id'         => Auth::id(),
                    ]);

                    // Deduct stock
                    $stock->remaining_stock -= $requestedQty;
                    if ($stock->remaining_stock < 0) $stock->remaining_stock = 0;
                    $stock->save();

                    continue;
                }

                // =======================
                // UPDATE EXISTING PRODUCT
                // =======================
                $soldProduct = SoldProduct::findOrFail($productData['id']);

                $oldStock = Stock::findOrFail($soldProduct->stock_id);
                $newStock = Stock::findOrFail($productData['stock_id']);

                $oldQuantity = $soldProduct->quantity;
                $requestedQty = $productData['quantity'];
                $newStockId = $newStock->invoicedate;

                // Return old quantity to old stock
                $oldStock->remaining_stock += $oldQuantity;
                $oldStock->save();

                // Max available in new stock
                $maxAvailable = $newStock->remaining_stock + $oldQuantity;

                if ($requestedQty > $maxAvailable) {
                    $requestedQty = $maxAvailable;
                    session()->flash('warning', "Only {$requestedQty} units of {$newStock->item_name} are available. Quantity adjusted.");
                }

                // Adjust stock: deduct new quantity
                $stockDiff = $requestedQty;
                $newStock->remaining_stock -= $stockDiff;
                if ($newStock->remaining_stock < 0) $newStock->remaining_stock = 0;
                $newStock->save();

                $unitPrice = $productData['unit_price'];
                $totalPrice = $requestedQty * $unitPrice;
                $taxRate = $taxCodes[$newStock->taxCode] ?? 0;
                $vatAmount = ($totalPrice * $taxRate) / 100;

                $totalAmount += $totalPrice;
                $totalVat += $vatAmount;

                $soldProduct->update([
                    'stock_id'            => $newStock->id,
                    'quantity'            => $requestedQty,
                    'unit_price'          => $unitPrice,
                    'total_price'         => $totalPrice,
                    'tax_code'            => $newStock->taxCode,
                    'tax_rate'            => $taxRate,

                    'sale_type'           => $request->sale_type,
                    'company_tin'         => $request->company_tin,
                    'computation_type'    => $request->computation_type ?? 'INCLUSIVE',
                    'voucher_amount'      => $request->voucher_amount ?? 0,
                    'discount_amount'     => $request->discount_amount ?? 0,
                    'business_partner_name' => optional($sale->client)->name,
                    'invoice_date'        => $request->invoicedate,
                    'client_tin'          => optional($sale->client)->tin,
                    'total_amount'        => $totalPrice,
                    'total_vat'           => $vatAmount,
                    'client_tin_pin'      => optional($sale->client)->pin,
                    'exchange_rate'       => $request->exchange_rate ?? 1,
                    'discount_type'       => $request->discount_type ?? '',

                    // Item-specific
                    'item_code'           => $newStock->itemCd ?? null,
                    'item_description'    => $newStock->description ?? null,
                    'item_category'       => $newStock->itemClsCd ?? null,
                    'batch'               => $productData['batch'] ?? null,
                    'expire_date'         => $productData['expire_date'] ?? null,
                ]);
            }

          
            DB::commit();

            return redirect()
                ->route('sales.index')
                ->with('success', 'Sale updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Update failed: ' . $e->getMessage()
            ])->withInput();
        }
    }
    // Remove the specified sale from storage


    // Generate an invoice for the specified sale
    public function generateInvoice($id)
    {
        $sale = Sale::with(['products.stock', 'client'])->findOrFail($id);
        $company = Company::find($sale->sold_from);


        // Define the file name and path
        $invoiceDir = storage_path('app/invoices/');
        $invoiceFile = $company->name . "invoiced-date" . $sale->invoicedate .  '.pdf';
        $invoiceFile = str_replace(' ', '_', $invoiceFile); // Replace spaces with underscores
        $invoicePath = $invoiceDir . $invoiceFile;

        // ✅ Ensure directory exists
        if (!File::exists($invoiceDir)) {
            File::makeDirectory($invoiceDir, 0755, true); // Create directory with proper permissions
        }

        // Generate the PDF
        $pdf = PDF::loadView('admin.invoices.productinvoice', ['sale' => $sale, 'company' => $company]);

        // Save the PDF to the specified path
        $pdf->save($invoicePath);

        // Check if file was saved successfully
        if (!file_exists($invoicePath)) {
            return response()->json(['error' => 'Invoice file not found.'], 404);
        }

        return response()->download($invoicePath);
    }

    // Generate an invoice for the specified sale
    public function generateperform($id)
    {
        try {
            $sale = Sale::with(['products.stock', 'client'])->findOrFail($id);
            $company = Company::find($sale->sold_from);


            // Define the file name and path
            $invoiceDir = storage_path('app/invoices/');
            $invoiceFile = $company->name . "invoiced-date" . $sale->invoicedate .  '.pdf';
            $invoiceFile = str_replace(' ', '_', $invoiceFile); // Replace spaces with underscores
            $invoicePath = $invoiceDir . $invoiceFile;

            // ✅ Ensure directory exists
            if (!File::exists($invoiceDir)) {
                File::makeDirectory($invoiceDir, 0755, true); // Create directory with proper permissions
            }

            // Generate the PDF
            $pdf = PDF::loadView('admin.invoices.perform_invoice_page', ['sale' => $sale, 'company' => $company]);

            // Save the PDF to the specified path
            $pdf->save($invoicePath);

            // Check if file was saved successfully
            if (!file_exists($invoicePath)) {
                return response()->json(['error' => 'Invoice file not found.'], 404);
            }

            return response()->download($invoicePath);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Sale not found
            return redirect()->route('sales.index')->with('error', 'Sale not found.');
        } catch (\Exception $e) {
            // Any other exception
            return redirect()->route('sales.index')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
