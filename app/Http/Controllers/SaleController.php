<?php

namespace App\Http\Controllers;
use App\Sale;
use App\Stock;
use App\Client;
use App\Company;
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
        $sales = DB::table('sales')
            ->join('clients', 'sales.client_id', '=', 'clients.id')
            ->select('sales.id', 'clients.name as client_name', 'sales.invoice_number','sales.invoicedate') // Include 'invoice_number'
            ->get();
        
            dd($sales);
        // Optionally, if you need the logged-in user's companies, you can still retrieve it
        $loggedInUserCompanies = Auth::user()->companies;
        
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'stock_id' => 'required|exists:stocks,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric'
        ]);

        $sale = Sale::findOrFail($id);
        $sale->update($request->all());

        $stock = Stock::findOrFail($request->stock_id);
        $stock->remaining_stock -= $request->quantity;
        $stock->save();

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    // Remove the specified sale from storage
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        // $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }

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
