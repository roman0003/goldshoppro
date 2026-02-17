<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goldprice;

class GoldPriceController extends Controller
{
    public function index()
    {
        $prices = Goldprice::all();
        return view('gold-price.index',compact('prices'));
    }

   public function create()
{
    return view('gold-price.create');
}


    public function store(Request $request)
{
    $data = $request->validate([
        'metal_type' => 'required|string|max:255',
        'price_per_tola' => 'required|numeric|min:0',
    ]);

    Goldprice::create($data);

    return redirect()->route('gold-price.index')
        ->with('success', 'Gold price added successfully!');
}

}
