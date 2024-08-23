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
            'quantity' => 'required|integer',
            'remaining_stock' => 'required|integer',
            'loged_in_id' => 'nullable|integer|exists:users,id',
        ]);
    
        // Store the stock item
        Stock::create($request->all());
    
        return redirect()->route('stock.index')->with('success', 'Stock item added successfully.');
    }

    public function edit($stockId)
    {
        $stock = Stock::findOrFail($stockId);
        return view('admin.stock.create_edit', compact('stock'));
    }

    public function update(Request $request, $stockId)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);

        $stock = Stock::findOrFail($stockId);
        $stock->update($request->all());

        return redirect()->route('stock.index')->with('success', 'Stock updated.');
    }

    public function sold()
    {
        $soldItems = SoldStock::all();
        return view('admin.stock.sold', compact('soldItems'));
    }
}
