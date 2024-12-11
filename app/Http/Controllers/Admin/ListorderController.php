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
        $orders = Order::with(['orderDetails.product', 'user'])
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
        $validatedData = $request->validate([
            'status' => 'required|in:unpaid,paid,canceled,shipping,complete'
        ]);

        Order::where('id', $id)->update([
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('adminpage.listorder.index')->with('success', 'Status pesanan berhasil diperbarui.');
    }

}
