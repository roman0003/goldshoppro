@extends('layouts.app')
 
@section('content')
<div class="p-6">
    <h2 class="text-3xl font-bold text-gray-700 mb-6">Gold Prices</h2>
 
    <div class="mb-4">
        <a href=''gold.create') }}" class="bg-[#D4AF37] text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Add New Price
        </a>
    </div>
 
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase tracking-wider">Metal</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase tracking-wider">Price Per Tola</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($prices as $price)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $price->metal_type }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">Rs. {{ $price->price_per_tola }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href='' class="text-blue-500 hover:underline mr-2">Edit</a>
                        <a href='' class="text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection