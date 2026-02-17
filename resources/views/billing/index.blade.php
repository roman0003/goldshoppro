@extends('layouts.app')
 
@section('content')
<div class="p-6">
    <h2 class="text-3xl font-bold text-gray-700 mb-6">Bills</h2>
 
    @if(session('success'))
    <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
        {{session('success')}}
    </div>
    @endif

    <div class="mb-4">
        <a href="{{route('billing.create') }}" class="bg-[#D4AF37] text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Add New Bill
        </a>     
    </div>


    

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase tracking-wider">Metal</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase tracking-wider">Quantity</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($bills as $bill)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $bill->customer_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $bill->metal_type }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">Rs. {{ $bill->price_per_tola }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $bill->quantity }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">Rs. {{ $bill->total }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $bill->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{route('billing.invoice',$bill->id) }}" class="btn btn-sm btn-primary">
            View Invoice
        </a>   
            <a href="{{route('billing.download',$bill->id) }}" class="btn btn-sm btn-danger">
            Download PDF
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection