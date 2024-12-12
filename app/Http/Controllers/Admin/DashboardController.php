<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
{
    // Hitung jumlah produk
    $productCount = Product::count();

    // Hitung total penjualan hanya untuk pesanan yang sudah complete
    $totalSales = Order::where('status', 'complete')->sum('total_amount');

    // Ambil data penjualan untuk grafik hanya untuk pesanan yang sudah complete
    $salesData = Order::where('status', 'complete')
        ->selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Konversi data untuk Chart.js
    $chartLabels = $salesData->pluck('month')->map(function ($month) {
        return date('F', mktime(0, 0, 0, $month, 10));
    });

    $chartData = $salesData->pluck('total');

    return view('pages.adminpage.dashboard.index', compact('productCount', 'totalSales', 'chartLabels', 'chartData'));
}
}
