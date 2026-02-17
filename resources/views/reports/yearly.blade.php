@extends('layouts.app')
 
@section('content')
<div class="container mt-4">
 
    <h2 class="mb-4">Yearly Sales Report ({{ now()->year }})</h2>
 
    <div class="card p-4 mb-4">
        <h4>Best-Selling Metal: {{ $bestMetal }}</h4>
        <ul>
            @foreach($salesPerMetal as $metal => $data)
                <li>{{ $metal }}: Quantity {{ $data['quantity'] }} Tola, Total Rs. {{ $data['total'] }}</li>
            @endforeach
        </ul>
    </div>
 
    <div class="card p-4">
        <h4>All Bills</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Metal</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bills as $bill)
                <tr>
                    <td>{{ $bill->id }}</td>
                    <td>{{ $bill->customer_name }}</td>
                    <td>{{ $bill->metal_type }}</td>
                    <td>{{ $bill->quantity }}</td>
                    <td>Rs. {{ $bill->total }}</td>
                    <td>{{ $bill->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 
</div>
@endsection