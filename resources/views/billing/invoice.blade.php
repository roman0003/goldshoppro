@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">

    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Your Jewellery Shop</h1>
        <p class="text-gray-600 mt-2">Invoice #{{ $bill->id }}</p>
        <p class="text-gray-600">{{ $bill->created_at->format('d-m-Y') }}</p>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-700 uppercase tracking-wider">Metal Type</th>
                    <th class="px-6 py-3 text-center text-gray-700 uppercase tracking-wider">Weight</th>
                    <th class="px-6 py-3 text-center text-gray-700 uppercase tracking-wider">Price Per Gram</th>
                    <th class="px-6 py-3 text-center text-gray-700 uppercase tracking-wider">Total</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4">{{ $bill->inventory->metal_type ?? $bill->metal_type }}</td>
                    <td class="px-6 py-4 text-center">{{ $bill->weight ?? $bill->quantity }}</td>
                    <td class="px-6 py-4 text-center">₹ {{ $bill->price_per_gram ?? $bill->price_per_tola }}</td>
                    <td class="px-6 py-4 text-center font-semibold">₹ {{ $bill->total_price ?? $bill->total }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Grand Total -->
    <div class="text-right mt-6">
        <span class="text-lg font-bold text-gray-800">Grand Total: ₹ {{ $bill->total_price ?? $bill->total }}</span>
    </div>

    <!-- Print Button -->
    <div class="flex justify-end mt-6">
        <button onclick="window.print()"
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded shadow transition">
            Print Invoice
        </button>
    </div>

</div>
@endsection
