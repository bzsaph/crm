<?php

namespace App\Http\Controllers;
use App\Sale;
use App\Stock;
use App\Client;
use App\Company;
use App\SoldProduct;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;  // Use this import statement
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
{
    // Display a listing of the sales
    public function index()
    {
 // Get the logged-in user
                $user = Auth::user();
                $loggedInUserCompanies = Auth::user()->companies->first()->id;
              

                // Fetch sales data for the logged-in user's company
                $sales = DB::table('sales')
                ->join('clients', 'sales.client_id', '=', 'clients.id')
                ->join('companies', 'sales.sold_from', '=', 'companies.id')
                ->where('sales.sold_from', $loggedInUserCompanies)
                ->select('sales.id', 'clients.name as client_name', 'sales.invoice_number', 'sales.invoicedate')
                ->orderBy('sales.created_at', 'desc') // Order by creation date
                ->get();
            

   
        
         
        // Optionally, if you need the logged-in user's companies, you can still retrieve it

        return view('admin.sales.index', compact('sales', 'loggedInUserCompanies'));
    }
    

    // Show the form for creating a new sale
    public function create()
    {
        $clients = Client::all();
        $stocks = Stock::all();
        return view('admin.sales.create', compact('clients', 'stocks'));
    }


    

    public function store(Request $request)
    {
        // Decode the JSON string for 'products' into an array
        $products = json_decode($request->products, true);
    
        // Now merge the decoded 'products' array back into the request
        $request->merge(['products' => $products]);
    
        // Validate the 'products' field as an array
        $request->validate([
            'client_id' => 'required|exists:clients,id', // Ensure the client exists in the clients table
            'products' => 'required|array', // Ensure 'products' is an array
            'products.*.product_id' => 'required|exists:stocks,id', // Validate product_id exists in the stocks table
            'products.*.quantity' => 'required|numeric|min:1', // Ensure quantity is numeric and greater than 0
            'products.*.unit_price' => 'required|numeric|min:0', // Ensure unit_price is numeric and not negative
        ]);
    
        // Begin a transaction to ensure atomicity of the sale and stock updates
        DB::beginTransaction();
    
        try {
            // Generate a unique invoice number
            $invoiceNumber = 'INV-' . strtoupper(uniqid());
    
            // Create a new sale record
            $sale = new Sale();
            $sale->client_id = $request->client_id;
            $sale->invoicedate=$request->invoicedate;
            $sale->invoice_number = $invoiceNumber;
            $sale->sold_from = Auth::user()->companies->first()->id ?? null; // Get the first company of the logged-in user
            $sale->loged_in_id = Auth::id(); // Record the ID of the logged-in user
            $sale->save();
    
            // Loop through each product in the sale
            foreach ($products as $product) {
                // Find the product in stock using the product ID
                $stock = Stock::find($product['product_id']);
                
                // Check if the product exists in stock
                if (!$stock) {
                    DB::rollBack();
                    return redirect()->back()->withErrors(['error' => "Stock not found for ID: {$product['product_id']}"]);
                }
    
                // Check if there is enough stock available
                if ($stock->remaining_stock < $product['quantity']) {
                    DB::rollBack();
                    return redirect()->back()->withErrors(['error' => "Not enough stock for product: {$stock->item_name}"]);
                }
    
                // Calculate the total price for the product
                $unitPrice = $product['unit_price'];
                $quantity = $product['quantity'];
                $totalPrice = $unitPrice * $quantity; // Unit price * Quantity
  
                // Create a sale product entry (pivot table or similar)
                $sale->soldProducts()->create([
                    'sale_id' => $sale->id,
                    'stock_id' => $product['product_id'],
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                  
                    'total_price' => $totalPrice, // Store the calculated total price
                    'invoice_number' => $invoiceNumber,
                    'sold_from' => Auth::user()->companies->first()->id ?? null, // Get the first company's ID
                    'loged_in_id' => Auth::id(), // Store the logged-in user ID
                ]);
    
                // Deduct the sold quantity from the stock
                $stock->remaining_stock -= $quantity;
                $stock->save(); // Update the stock after deduction
            }
    
            // Commit the transaction if everything is successful
            DB::commit();
    
            // Redirect to the sales index page with a success message
            return redirect()->route('sales.index')->with('success', 'Sale recorded successfully! Invoice Number: ' . $invoiceNumber);
    
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();
            
            // Log the error for debugging
            Log::error("Error recording sale: " . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while recording the sale.'.$e->getMessage()]);
        }
    }
    

    
    
    


    // Display the specified sale
    public function show($id)
    {
        $sale = Sale::findOrFail($id);
        return view('admin.sales.show', compact('sale'));
    }

    // Show the form for editing the specified sale
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $clients = Client::all();
        $stocks = Stock::all();
        return view('admin.sales.edit', compact('sale', 'clients', 'stocks'));
    }

    // Update the specified sale in storage
    public function update(Request $request, $saleId)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'nullable|exists:sold_products,id', // Existing product ID
            'products.*.stock_id' => 'required|exists:stocks,id',  // Stock ID
            'products.*.quantity' => 'required|numeric|min:1',     // Quantity
            'products.*.unit_price' => 'required|numeric|min:0',   // Unit price
        ]);
    
        DB::beginTransaction();
    
        try {
            foreach ($request->products as $productData) {
                // Handle new products (no ID present)
                if (empty($productData['id'])) {
                    $stock = Stock::findOrFail($productData['stock_id']);
    
                    if ($stock->remaining_stock < $productData['quantity']) {
                        throw new \Exception("Insufficient stock for {$stock->item_name}");
                    }
    
                    $stock->remaining_stock -= $productData['quantity'];
                    $stock->quantity -= $productData['quantity'];
                    $stock->save();
    
                    SoldProduct::create([
                        'sale_id' => $saleId,
                        'stock_id' => $productData['stock_id'],
                        'quantity' => $productData['quantity'],
                        'unit_price' => $productData['unit_price'],
                        'total_price' => $productData['quantity'] * $productData['unit_price'],
                    ]);
    
                    continue;
                }
    
                // Update existing products
                $soldProduct = SoldProduct::find($productData['id']);
                if (!$soldProduct) continue;
    
                $stock = Stock::findOrFail($productData['stock_id']);
    
                $quantityChanged = $productData['quantity'] != $soldProduct->quantity;
                $stockChanged = $productData['stock_id'] != $soldProduct->stock_id;
                $priceChanged = $productData['unit_price'] != $soldProduct->unit_price;
    
                if ($quantityChanged || $stockChanged || $priceChanged) {
                    // Restore stock for the old quantity and product
                    $oldStock = Stock::findOrFail($soldProduct->stock_id);
                    $oldStock->remaining_stock += $soldProduct->quantity;
                    $oldStock->quantity += $soldProduct->quantity;
                    $oldStock->save();
    
                    // Reduce stock for the new product
                    if ($stock->remaining_stock < $productData['quantity']) {
                        throw new \Exception("Insufficient stock for {$stock->item_name}");
                    }
    
                    $stock->remaining_stock -= $productData['quantity'];
                    $stock->quantity -= $productData['quantity'];
                    $stock->save();
    
                    // Update the sold product record
                    $soldProduct->update([
                        'stock_id' => $productData['stock_id'],
                        'quantity' => $productData['quantity'],
                        'unit_price' => $productData['unit_price'],
                        'total_price' => $productData['quantity'] * $productData['unit_price'],
                    ]);
                }
            }
    
            DB::commit();
            return redirect()->route('sales.index')->with('success', 'Sale updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    
    

    
    


    // Remove the specified sale from storage
 

    // Generate an invoice for the specified sale
    public function generateInvoice($id)
    {
   
        $sale = Sale::with(['products.stock', 'client'])->findOrFail($id);
    
        $company = Company::find($sale->sold_from); // Retrieve the company based on the sold_from field
    
        // Define the file name and path
        $invoiceFile = 'invoice-' . $sale->id . '.pdf';
        $invoicePath = storage_path('app/invoices/' . $invoiceFile);
    
        // Generate the PDF
        $pdf = PDF::loadView('admin.invoices.productinvoice', ['sale' => $sale, 'company' => $company]);
    
        // Save the PDF to the specified path
        $pdf->save($invoicePath);
    
        // Check if file is saved correctly
        if (!file_exists($invoicePath)) {
            return response()->json(['error' => 'Invoice file not found.'], 404);
        }
    
        return response()->download($invoicePath);
    }
    
    

}
