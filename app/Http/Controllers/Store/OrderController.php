<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::where('user_id', auth()->user()->id)
            ->with(['orderDetails.product', 'user'])
            ->get();

        return view('pages.store.order', [
            'orders' => $orders
        ]);
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $user = auth()->user();
        if ($user->address == null && $user->contact == null) {
            notify()->error('Silahkan Lengkapi Data Anda Terlebih Dahulu');
            return redirect()->route('main.profile');
        }
        $product = Product::findOrFail($id);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'status' => 'unpaid',
            'total_amount' => $product->price * $request->quantity
        ]);

        $order->orderDetails()->create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_amount' => $product->price * $request->quantity
        ]);

        return redirect()->route('order.index');
    }
}
