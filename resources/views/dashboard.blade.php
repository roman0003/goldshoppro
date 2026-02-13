@extends('layouts.app')
 
@section('content')
<div class="p-6">
 
    <h2 class="text-3xl font-bold text-gray-700 mb-8">Dashboard</h2>
 
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
 
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm font-semibold">Today's Sales</h3>
            <p class="text-3xl font-bold text-[#D4AF37] mt-2">Rs. 0</p>
            <a href=''billing.index') }}" class="text-sm text-[#D4AF37] mt-3 inline-block hover:underline">
                View Sales
            </a>
        </div>
 
        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm font-semibold">Gold Rate (24K)</h3>
            <p class="text-3xl font-bold text-[#D4AF37] mt-2">Rs. --</p>
            <a href=''gold.index') }}" class="text-sm text-[#D4AF37] mt-3 inline-block hover:underline">
                Go to Gold Prices
            </a>
        </div>
 
        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-500 text-sm font-semibold">Total Customers</h3>
            <p class="text-3xl font-bold text-[#D4AF37] mt-2">0</p>
            <a href='' class="text-sm text-[#D4AF37] mt-3 inline-block hover:underline">
                View Customers
            </a>
        </div>
 
    </div>
</div>
@endsection