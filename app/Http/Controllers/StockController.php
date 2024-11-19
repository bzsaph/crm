<?php

namespace App\Http\Controllers;

use App\Stock;
use App\SoldStock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('admin.stock.index', compact('stocks'));
    }

    public function create()
    {
        return view('admin.stock.create_edit');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'item_name' => 'required|string',
            'quantity' => 'required|integer', // Incoming quantity
            'loged_in_id' => 'nullable|integer|exists:users,id',
        ]);
    
        // Check if the item already exists in the stock
        $stockItem = Stock::where('item_name', $request->item_name)->first();
    
        // If the item exists, update the remaining stock by adding the incoming quantity
        if ($stockItem) {
            // Add the incoming quantity to the existing remaining_stock
            $stockItem->remaining_stock += $request->quantity;
            $stockItem->save(); // Save the updated stock item
        } else {
            // If the item doesn't exist, create a new stock record
            Stock::create([
                'item_name' => $request->item_name,
                'quantity' => $request->quantity, // Set initial quantity
                'remaining_stock' => $request->quantity, // Initial remaining stock is the same as quantity
                'loged_in_id' => $request->loged_in_id, // If provided
            ]);
        }
    
        // Redirect back with a success message
        return redirect()->route('stock.index')->with('success', 'Stock item added successfully.');
    }
    

    public function edit($stockId)
    {
        $stock = Stock::findOrFail($stockId);
        return view('admin.stock.create_edit', compact('stock'));
    }

    public function update(Request $request, $stockId)
    {
        // Validate the request
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);
    
        // Find the stock item by ID
        $stock = Stock::findOrFail($stockId);
    
        // Calculate the difference between the incoming quantity and the existing quantity
        $quantityDifference = $request->remaining_stock;
    
        // Update the stock item details
        $stock->update([
            'item_name' => $request->item_name, // Update item name
               // Update the quantity
        ]);
    
        // Adjust the remaining stock based on the difference
        $stock->quantity=$quantityDifference+$request->quantity;
        $stock->remaining_stock = $quantityDifference+$request->quantity;
        $stock->save();  // Save the updated stock
    
        // Redirect back with success message
        return redirect()->route('stock.index')->with('success', 'Stock updated.');
    }
    

    public function sold()
    {
        $soldItems = SoldStock::all();
        return view('admin.stock.sold', compact('soldItems'));
    }
}
