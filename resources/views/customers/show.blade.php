
@extends('layouts.app')
 
@section('content')
<div class="container mt-4">
 
<h2>Customer Details</h2>
 
<div class="card mb-4">
    <div class="card-body">
        <h4>{{ $customer->name }}</h4>
        <p><strong>Phone:</strong> {{ $customer->phone }}</p>
        <p><strong>Email:</strong> {{ $customer->email }}</p>
 
        <p><strong>Total Bills:</strong> {{ $customer->billings->count() }}</p>
        <p><strong>Total Spent:</strong> 
            Rs. {{ $customer->billings->sum('total') }}
        </p>
    </div>
</div>
 
<h3>Purchase History</h3>
 
<table class="table table-bordered">
<thead>
<tr>
    <th>Date</th>
    <th>Metal</th>
    <th>Quantity</th>
    <th>Total</th>
</tr>
</thead>
 
<tbody>
@foreach($customer->billings as $bill)
<tr>
    <td>{{ $bill->created_at->format('d-m-Y') }}</td>
    <td>{{ $bill->metal_type }}</td>
    <td>{{ $bill->quantity }}</td>
    <td>Rs. {{ $bill->total }}</td>
</tr>
@endforeach
</tbody>
</table>
 
</div>
@endsection