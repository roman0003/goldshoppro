<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goldprice;

class GoldPriceController extends Controller
{
    public function index()
    {
        $prices = GoldPrice::all();
        return view('gold-price.index',compact('prices'));
    }

    public function create()
    {
        return void('gold-price.create');
    }

    public function store(Request $request)
    {
        GoldPrice::create($request->all());
        return redirect('/gold-price');
    }
}
