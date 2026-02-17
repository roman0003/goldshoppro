@extends('layouts.app')
 
@section('content')
<div class="p-6 max-w-lg mx-auto bg-white shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Create New Bill</h2>
 
    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    @if(session('error'))
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded">
            {{ session('error') }}
        </div>
    @endif
 
    <form method="POST" action="{{ route('billing.store') }}">
        @csrf
 
        <div class="mb-4">
    <label class="block text-gray-700 mb-2">Customer Name</label>
    <input type="text" name="customer_name" required
        class="w-full border-gray-300 rounded px-3 py-2">
</div>
 
<div class="mb-4">
    <label class="block text-gray-700 mb-2">Phone</label>
    <input type="text" name="customer_phone"
        class="w-full border-gray-300 rounded px-3 py-2">
</div>
 
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Metal Type</label>
            <select name="inventory_id" id="inventory_id" required
                class="w-full border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-[#D4AF37]">
                <option value="">Select Metal</option>
                @foreach($inventories as $inv)
                    <option value="{{ $inv->id }}"
                        data-price="{{ $inv->selling_price }}">
                        {{ $inv->metal_type }} (Rs. {{ $inv->selling_price }})
                    </option>
                @endforeach
            </select>
        </div>
 
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Quantity (Tola)</label>
            <input type="number" step="0.01" name="quantity" id="quantity"
                class="w-full border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-[#D4AF37]">
        </div>
 
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Total (Preview)</label>
            <input type="text" id="total_preview"
                class="w-full bg-gray-100 border-gray-300 rounded px-3 py-2"
                readonly>
        </div>
 
        <button type="submit"
            class="bg-[#D4AF37] text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Create Bill
        </button>
    </form>
</div>
 
<script>
const inventorySelect = document.getElementById('inventory_id');
const quantityInput = document.getElementById('quantity');
const totalPreview = document.getElementById('total_preview');
 
function calculateTotal() {
    const selectedOption = inventorySelect.options[inventorySelect.selectedIndex];
    const price = selectedOption.getAttribute('data-price');
    const quantity = quantityInput.value;
 
    if (price && quantity) {
        const total = price * quantity;
        totalPreview.value = "Rs. " + total.toFixed(2);
    } else {
        totalPreview.value = "";
    }
}
 
inventorySelect.addEventListener('change', calculateTotal);
quantityInput.addEventListener('input', calculateTotal);
</script>
@endsection