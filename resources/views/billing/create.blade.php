
@extends('layouts.app')
 
@section('content')
<div class="p-6 max-w-lg mx-auto bg-white shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Create New Bill</h2>
 
    <form method="POST" action="{{ route('billing.store') }}">
        @csrf
 
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Customer Name</label>
            <input type="text" name="customer_name" required class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4AF37]">
        </div>
 
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Metal Type</label>
            <select name="metal_type" required class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4AF37]">
                @foreach($goldPrices as $gold)
                    <option value="{{ $gold->metal_type }}">{{ $gold->metal_type }}</option>
                @endforeach
            </select>
        </div>
 
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Quantity (Tola)</label>
            <input type="number" step="0.01" name="quantity" required class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4AF37]">
        </div>
 
        <button type="submit" class="bg-[#D4AF37] text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Create Bill
        </button>
    </form>
</div>
@endsection