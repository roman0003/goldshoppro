@extends('layouts.app')
 
@section('content')
<div class="container mt-4">
 
<h2>Customers</h2>
 
<table class="table table-bordered">
<thead>
<tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Total Bills</th>
    <th>Total Spent</th>
</tr>
</thead>
 
<tbody>
@foreach($customers as $customer)
<tr>
    <td>
    <a href="{{route('customers.show', $customer->id) }}">
        {{ $customer->name }}
    </a>
</td>
    <td>{{ $customer->phone }}</td>
    <td>{{ $customer->billings->count() }}</td>
    <td>Rs. {{ $customer->billings->sum('total') }}</td>
</tr>
@endforeach
</tbody>
</table>
 
</div>
@endsection