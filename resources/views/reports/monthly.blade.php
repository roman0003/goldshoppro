@extends('layouts.app')
 
@section('content')
<div class="container mt-4">
 
    <h2 class="mb-4">Monthly Sales Report</h2>
 
    <div class="card p-4 mb-4">
        <h4>Total Sales: Rs. {{ $totalSales }}</h4>
        <h4>Total Quantity Sold: {{ $totalQuantity }} Tola</h4>
    </div>
 
    <div class="card p-4 mb-4">
        <canvas id="salesChart"></canvas>
    </div>
 
    <div class="card p-4">
        <h4>All Bills</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Metal</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bills as $bill)
                <tr>
                    <td>{{ $bill->id }}</td>
                    <td>{{ $bill->customer_name }}</td>
                    <td>{{ $bill->metal_type }}</td>
                    <td>{{ $bill->quantity }}</td>
                    <td>Rs. {{ $bill->total }}</td>
                    <td>{{ $bill->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 
</div>
 
<script>
const ctx = document.getElementById('salesChart').getContext('2d');
const salesChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($dailySales->keys()) !!},
        datasets: [{
            label: 'Daily Sales (Rs.)',
            data: {!! json_encode($dailySales->values()) !!},
            borderColor: '#D4AF37',
            fill: false,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true },
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
@endsection