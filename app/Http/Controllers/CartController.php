<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $DEFAULT_PRODUCT_QUANTITY = 1;
    public function index()
    {
        $cart = Cart::where("user_id", auth()->user()->id)->first();
        return view("store.cart", [
            "cart_products" => CartProduct::where("cart_id", $cart->id)
                ->get(),
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
                    "quantity" => $this->DEFAULT_PRODUCT_QUANTITY,
                ]
            );
            notify()->success('Berhasil Tambah Ke Keranjang ⚡️');
            return redirect()->route('cart.index');
        }
        $cart_product->update([
            "quantity" => $cart_product->quantity + $this->DEFAULT_PRODUCT_QUANTITY,
        ]);
        notify()->success('Berhasil Tambah Ke Keranjang ⚡️');
        return redirect()->route('cart.index');
    }

    public function addQuantity(Request $request, $id)
    {
        $cart = Cart::firstOrCreate([
            "user_id" => auth()->user()->id
        ]);

        $product = Product::where("id", $id)->first();

        $cart_product = CartProduct::where("cart_id", $cart->id)
            ->where("product_id", $product->id)
            ->first();

        $cart_product->update([
            "quantity" => $cart_product->quantity + $this->DEFAULT_PRODUCT_QUANTITY,
        ]);

        return redirect()->route('cart.index');
    }

    public function subtractQuantity(Request $request, $id)
    {
        $cart = Cart::firstOrCreate([
            "user_id" => auth()->user()->id
        ]);

        $product = Product::where("id", $id)->first();

        $cart_product = CartProduct::where("cart_id", $cart->id)
            ->where("product_id", $product->id)
            ->first();

        $cart_product->update([
            "quantity" => $cart_product->quantity - $this->DEFAULT_PRODUCT_QUANTITY,
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

        notify()->success('Berhasil Hapus Produk dari Keranjang ⚡️');
        return redirect()->route('cart.index');
    }

}
