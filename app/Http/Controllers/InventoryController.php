<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Inventory;
 
class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::latest()->get();
        return view('inventory.index', compact('inventories'));
    }
 
    public function create()
    {
        return view('inventory.create');
    }
 
    public function store(Request $request)
    {
        $data = $request->validate([
    'metal_type' => 'required|string',
    'quantity' => 'required|numeric|min:0',
    'cost_price' => 'required|numeric|min:0',
    'selling_price' => 'required|numeric|min:0',
]);

Inventory::create($data);


 
        return redirect()->route('inventory.index')->with('success', 'Inventory added successfully!');
    }
}
