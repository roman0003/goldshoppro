@extends('layouts.app')
 
@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6">Inventory</h2>
 
    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif
 
    <div class="mb-4">
        <a href="{{route('inventory.create') }}" class="bg-[#D4AF37] text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Add Inventory Item
        </a>
    </div>
 
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Metal</th>
                    <th class="px-6 py-3">Quantity</th>
                    <th class="px-6 py-3">Cost Price</th>
                    <th class="px-6 py-3">Selling Price</th>
                    <th class="px-6 py-3">Date Added</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($inventories as $item)
                <tr>
                    <td class="px-6 py-4">{{ $item->metal_type }}</td>
                    <td class="px-6 py-4">{{ $item->quantity }}</td>
                    <td class="px-6 py-4">Rs. {{ $item->cost_price }}</td>
                    <td class="px-6 py-4">Rs. {{ $item->selling_price }}</td>
                    <td class="px-6 py-4">{{ $item->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection