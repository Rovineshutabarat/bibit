<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Validator;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::where('user_id', auth()->user()->id)
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

    public function checkout(Request $request)
    {
        $selectedItems = json_decode($request->input('selected-items'), true);

        $validateRequest = Validator::make(['selected_items' => $selectedItems], [
            'selected_items' => 'required|array',
            'selected_items.*.product_id' => 'required|exists:product,id',
            'selected_items.*.quantity' => 'required|integer|min:1'
        ]);

        if ($validateRequest->fails()) {
            notify()->error('Validasi Gagal');
            return redirect()->back();
        }

        $user = auth()->user();

        if (!$user->address || !$user->contact) {
            notify()->error('Silahkan Lengkapi Data Anda Terlebih Dahulu');
            return redirect()->route('main.profile');
        }

        $totalAmount = 20000;
        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'unpaid',
            'total_amount' => 0
        ]);

        foreach ($selectedItems as $item) {
            $product = Product::findOrFail($item['product_id']);
            $subtotal = $product->price * $item['quantity'];

            $order->orderDetails()->create([
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'total_amount' => $subtotal
            ]);

            $totalAmount += $subtotal;
        }

        $order->update(['total_amount' => $totalAmount]);

        notify()->success('Checkout berhasil. Silahkan lakukan pembayaran.');
        return redirect()->route('order.index');
    }

}
