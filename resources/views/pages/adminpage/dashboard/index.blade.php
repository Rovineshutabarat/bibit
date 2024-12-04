@extends('layouts.adminpage')

@section('title', 'Dashboard - Admin Page')

@section('adminpage-content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Jumlah Produk -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold">Jumlah Produk</h2>
            <p class="text-3xl mt-2">{{ $productCount }}</p>
        </div>

        <!-- Total Penjualan -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold">Total Penjualan</h2>
            <p class="text-3xl mt-2">Rp {{ number_format($totalSales, 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Grafik Penjualan -->
    <div class="mt-8 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold">Grafik Penjualan Bulanan</h2>
        <canvas id="salesChart" class="mt-4"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                label: 'Total Penjualan (Rp)',
                data: {!! json_encode($chartData) !!},
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
