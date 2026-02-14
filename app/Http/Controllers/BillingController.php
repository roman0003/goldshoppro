<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Goldprice; 
use App\Models\Inventory;// Make sure model name is correct

class BillingController extends Controller
{
    public function index()
    {
        $bills = Billing::latest()->get();
        return view('billing.index', compact('bills'));
    }

    public function create()
    {
        $goldPrices = Goldprice::all();
        return view('billing.create', compact('goldPrices'));
    }

  

 
public function store(Request $request)
{
    $request->validate([
        'customer_name' => 'required',
        'metal_type' => 'required',
        'quantity' => 'required|numeric|min:0.01',
    ]);
 
    // Check Inventory
    $inventory = Inventory::where('metal_type', $request->metal_type)->first();
 
    if (!$inventory) {
        return back()->with('error', 'No inventory found for this metal.');
    }
 
    if ($inventory->quantity < $request->quantity) {
        return back()->with('error', 'Not enough stock available.');
    }
 
    // Get Gold Price
    $gold = GoldPrice::where('metal_type', $request->metal_type)->first();
 
    if (!$gold) {
        return back()->with('error', 'Gold price not found.');
    }
 
    $total = $gold->price_per_tola * $request->quantity;
 
    // Create Bill
    Billing::create([
    'customer_name' => $request->customer_name,
    'metal_type' => $request->metal_type,
    'price_per_tola' => $gold->price_per_tola,
    'quantity' => $request->quantity,
    'total' => $total,
]);

 
    // Reduce Inventory
    $inventory->quantity -= $request->quantity;
    $inventory->save();
 
    return redirect()->route('billing.index')
        ->with('success', 'Bill created and inventory updated successfully!');
}
}
