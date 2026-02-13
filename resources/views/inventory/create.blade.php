@extends('layouts.app')
 
@section('content')
<div class="p-6 max-w-lg mx-auto bg-white shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Add Inventory Item</h2>
 
    <form method="POST" action="{{ route('inventory.store') }}">
        @csrf
 
        <div class="mb-4">
            <label>Metal Type</label>
            <input type="text" name="metal_type" required class="w-full border-gray-300 rounded px-3 py-2">
        </div>
 
        <div class="mb-4">
            <label>Quantity (Tola)</label>
            <input type="number" step="0.01" name="quantity" required class="w-full border-gray-300 rounded px-3 py-2">
        </div>
 
        <div class="mb-4">
            <label>Cost Price</label>
            <input type="number" step="0.01" name="cost_price" required class="w-full border-gray-300 rounded px-3 py-2">
        </div>
 
        <div class="mb-4">
            <label>Selling Price</label>
            <input type="number" step="0.01" name="selling_price" required class="w-full border-gray-300 rounded px-3 py-2">
        </div>
 
        <button type="submit" class="bg-[#D4AF37] text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Add Item
        </button>
    </form>
</div>
@endsection