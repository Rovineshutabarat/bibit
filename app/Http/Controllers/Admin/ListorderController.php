<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;

class ListorderController extends Controller
{
    public function index(): View
{
    $orders = Order::with(['orderDetails.product', 'user']) // Menyertakan relasi produk dan user
    ->get()
    ->map(function ($order) {
        return [
            'id' => $order->id,
            'user' => $order->user->username, // Menampilkan nama pengguna
            'products' => $order->orderDetails->pluck('product.name')->join(', '),
            'total_amount' => $order->orderDetails->sum('total_amount'),
            'status' => $order->status,
            'order_date' => $order->created_at->format('d M Y'),
        ];
    });

return view('pages.adminpage.listorder.index', compact('orders'));

}


public function update(Request $request, $id)
{
    // Validasi status
    $validatedData = $request->validate([
        'status' => 'required|in:pending,shipped,success,cancelled'  // Status yang valid
    ]);

    // Temukan order berdasarkan ID yang diberikan
    $orders = Order::with(['orderDetails.product'])->get(); // Ambil data sebagai objek Eloquent


    // Perbarui status
    $order->status = $validatedData['status'];
    $order->save();

    // Redirect ke halaman daftar pesanan dengan pesan sukses
    return redirect()->route('adminpage.listorder.index')->with('success', 'Status pesanan berhasil diperbarui.');
}

}
