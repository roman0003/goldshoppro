@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-3xl font-bold text-gray-700 mb-6">Reports Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('reports.monthly') }}" class="p-4 bg-white shadow rounded-lg hover:bg-gray-50 transition">
            <h3 class="font-semibold text-gray-700">Monthly Report</h3>
        </a>
        <!-- You can add more reports links here -->
    </div>
</div>
@endsection
