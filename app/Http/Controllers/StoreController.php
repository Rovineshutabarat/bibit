<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoreController extends Controller
{
    public function index(): View
    {
        return view('pages.store.index', [
            'products' => Product::all()
        ]);
    }

    public function cart()
    {
        return view('store.cart');
    }

    public function productDetail($id)
    {
        return view('store.product-detail', [
            'product' => Product::findOrFail($id)
        ]);
    }
}
