<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $cart = Cart::where("user_id", auth()->user()->id)->first();

        $cart_products = CartProduct::where("cart_id", $cart->id)->get();

        $total = $cart_products->sum(function ($cart_product) {
            return $cart_product->product->price * $cart_product->quantity;
        });

        return view("pages.store.cart", [
            "cart_products" => $cart_products,
            "total" => $total,
        ]);
    }

    public function store(Request $request, $id)
    {
        $cart = Cart::firstOrCreate([
            "user_id" => auth()->user()->id
        ]);

        $product = Product::where("id", $id)->first();

        $cart_product = CartProduct::where("cart_id", $cart->id)
            ->where("product_id", $product->id)
            ->first();

        if (!$cart_product) {

            CartProduct::create(
                [
                    "cart_id" => $cart->id,
                    "product_id" => $product->id,
                    "quantity" => $request->quantity,
                ]
            );
            return redirect()->route('cart.index');
        }
        $cart_product->update([
            "quantity" => $cart_product->quantity + $request->quantity,
        ]);
        return redirect()->route('cart.index');
    }

    public function delete(Request $request, $id)
    {
        $cart = Cart::firstOrCreate([
            "user_id" => auth()->user()->id
        ]);

        $product = Product::where("id", $id)->first();

        CartProduct::where("cart_id", $cart->id)
            ->where("product_id", $product->id)
            ->delete();

        return redirect()->route('cart.index');
    }
// update quantity
    public function updateQuantity(Request $request)
    {
        $cart = Cart::where("user_id", auth()->user()->id)->first();
        $cart_product = CartProduct::where("cart_id", $cart->id)
            ->where("product_id", $request->product_id)
            ->first();

        if ($cart_product) {
            $cart_product->update([
                "quantity" => $request->quantity,
            ]);
        }

        $total = $cart->cartProducts->sum(function ($cart_product) {
            return $cart_product->product->price * $cart_product->quantity;
        });

        return response()->json([
            'success' => true,
            'total' => $total,
        ]);
    }
}
