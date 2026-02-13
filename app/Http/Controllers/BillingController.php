<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Goldprice; // to get current gold rates
 
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
 
        $gold = Goldprice::where('metal_type', $request->metal_type)->first();
        $total = $gold->price_per_tola * $request->quantity;
 
        Billing::create([
            'customer_name' => $request->customer_name,
            'metal_type' => $request->metal_type,
            'price_per_tola' => $gold->price_per_tola,
            'quantity' => $request->quantity,
            'total' => $total,
        ]);
 
        return redirect()->route('billing.index')->with('success', 'Bill created successfully!');
    }
}