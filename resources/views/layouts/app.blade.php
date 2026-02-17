<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'GoldShop Pro') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg">
        <div class="p-6 border-b">
            <h1 class="text-xl font-bold text-[#D4AF37]">GoldShop Pro</h1>
        </div>

        <nav class="mt-6">
            <a href="{{ route('dashboard') }}" class="block px-6 py-3 text-gray-700 hover:bg-[#D4AF37] hover:text-white transition">Dashboard</a>
            <a href="{{ route('gold-price.index') }}" class="block px-6 py-3 text-gray-700 hover:bg-[#D4AF37] hover:text-white transition">Gold Price</a>
            <a href="{{ route('billing.index') }}" class="block px-6 py-3 text-gray-700 hover:bg-[#D4AF37] hover:text-white transition">Billing</a>
            <a href="{{ route('inventory.index') }}" class="block px-6 py-3 text-gray-700 hover:bg-[#D4AF37] hover:text-white transition">Inventory</a>
            <a href="{{ route('reports.index') }}" class="block px-6 py-3 text-gray-700 hover:bg-[#D4AF37] hover:text-white transition">Reports</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Navbar -->
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-700">{{ $header ?? __('Dashboard') }}</h2>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">{{ auth()->user()?->name ?? 'Guest' }}</span>
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-white bg-[#D4AF37] px-4 py-2 rounded hover:opacity-90">Logout</button>
                </form>
                @endauth
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            {{ $slot ?? '' }}
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
