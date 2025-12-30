<?php

namespace App\Http\Controllers;

use App\Stock;
use App\SoldStock;
use App\TaxCode;
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
        $taxCodes = TaxCode::all(); // get all tax codes from DB
        return view('admin.stock.create_edit', compact('taxCodes'));
    }
    
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        $taxCodes = TaxCode::all();
        return view('admin.stock.create_edit', compact('stock', 'taxCodes'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'item_name'    => 'required|string|max:255',
            'itemCd'       => 'nullable|string|max:100',
            'itemClsCd'    => 'nullable|string|max:100',
            'description'  => 'nullable|string',
            'taxCode'      => 'nullable|in:TAX_A,TAX_B,TAX_C,TAX_D',
            'quantity'     => 'required|integer|min:0',
        ]);
    
        // Check if stock exists
        $stock = Stock::where('itemCd', $request->itemCd)->first();
    
        if ($stock) {
            // Increase both quantity and remaining_stock
            $stock->quantity += $request->quantity;
            $stock->remaining_stock += $request->quantity;
            $stock->save();
        } else {
            Stock::create([
                'item_name'       => $request->item_name,
                'itemCd'          => $request->itemCd,
                'itemClsCd'       => $request->itemClsCd,
                'description'     => $request->description,
                'taxCode'         => $request->taxCode,
                'quantity'        => $request->quantity,
                'remaining_stock' => $request->quantity,
                'loged_in_id'     => auth()->id(),
            ]);
        }
    
        return redirect()->route('stock.index')->with('success', 'Stock item saved successfully.');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name'    => 'required|string|max:255',
            'itemCd'       => 'nullable|string|max:100',
            'itemClsCd'    => 'nullable|string|max:100',
            'description'  => 'nullable|string',
            'taxCode'      => 'nullable|in:TAX_A,TAX_B,TAX_C,TAX_D',
            'quantity'     => 'required|integer|min:0',
        ]);
    
        $stock = Stock::findOrFail($id);
    
        // Calculate difference for remaining_stock
        $difference = $request->quantity;
        $newRemaining = $stock->remaining_stock + $difference;
    
        if ($newRemaining < 0) {
            return back()->withErrors(['quantity' => 'Cannot reduce quantity below items already sold.']);
        }
    
        $stock->update([
            'item_name'       => $request->item_name,
            'itemCd'          => $request->itemCd,
            'itemClsCd'       => $request->itemClsCd,
            'description'     => $request->description,
            'taxCode'         => $request->taxCode,
            'quantity'        => $request->quantity,
            'remaining_stock' => $newRemaining,
        ]);
    
        return redirect()->route('stock.index')->with('success', 'Stock updated successfully.');
    }
    

    

    public function sold()
    {
        $soldItems = SoldStock::all();
        return view('admin.stock.sold', compact('soldItems'));
    }
}
