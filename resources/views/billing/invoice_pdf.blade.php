<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $bill->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* DomPDF workaround: Tailwind needs this for PDF */
        body { font-family: DejaVu Sans, sans-serif; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f3f4f6; font-weight: 600; }
    </style>
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-8">

    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Your Jewellery Shop</h1>
        <p class="text-gray-600 mt-2">Invoice #{{ $bill->id }}</p>
        <p class="text-gray-600">{{ $bill->created_at->format('d-m-Y') }}</p>
    </div>

    <!-- Invoice Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-gray-700 uppercase tracking-wider">Metal</th>
                    <th class="px-6 py-3 text-center text-gray-700 uppercase tracking-wider">Weight</th>
                    <th class="px-6 py-3 text-center text-gray-700 uppercase tracking-wider">Price Per Gram</th>
                    <th class="px-6 py-3 text-center text-gray-700 uppercase tracking-wider">Total</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 text-left">
                        {{ $bill->inventory?->metal_type ?? $bill->metal_type ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $bill->weight ?? $bill->quantity ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        ₹ {{ $bill->price_per_gram ?? $bill->price_per_tola ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4 text-center font-semibold">
                        ₹ {{ $bill->total_price ?? $bill->total ?? 'N/A' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Grand Total -->
    <div class="text-right mt-6 text-lg font-bold text-gray-800">
        Grand Total: ₹ {{ $bill->total_price ?? $bill->total ?? 'N/A' }}
    </div>

</div>

</body>
</html>
