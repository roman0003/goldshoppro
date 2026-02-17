@extends('layouts.app')
 
@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6">Dashboard Overview</h2>
 
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
 
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-500">Total Sales</h3>
            <p class="text-2xl font-bold text-green-600">
                Rs. {{ number_format($totalSales, 2) }}
            </p>
        </div>
 
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-500">Total Bills</h3>
            <p class="text-2xl font-bold">
                {{ $totalBills }}
            </p>
        </div>
 
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-500">Total Inventory</h3>
            <p class="text-2xl font-bold text-blue-600">
                {{ $totalInventory }} Tola
            </p>
        </div>
 
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-500">Low Stock Items</h3>
            <p class="text-2xl font-bold text-red-600">
                {{ $lowStock }}
            </p>
        </div>
 
    </div>
</div>
@endsection