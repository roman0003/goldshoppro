@extends('layouts.app')
 
@section('content')
<div class="p-6 max-w-lg mx-auto bg-white shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Add Gold Price</h2>
 
    <form method="POST" action="{{ route('gold.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Metal Type</label>
            <input type="text" name="metal_type" required class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4AF37]">
        </div>
 
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Price Per Tola</label>
            <input type="number" step="0.01" name="price_per_tola" required class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#D4AF37]">
        </div>
 
        <button type="submit" class="bg-[#D4AF37] text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Save
        </button>
    </form>
</div>
@endsection
