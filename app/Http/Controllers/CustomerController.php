<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;


class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('billings')->get();
        return view('customers.index',compact('customers'));
    }

    public function show(Customer $customer)
{
    $customer->load('billings');
 
    return view('customers.show', compact('customer'));
}
}
