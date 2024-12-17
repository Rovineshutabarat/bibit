<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductDetailController extends Controller
{
    public function index($id): View
    {
        $product = Product::findOrFail($id);
        $product->increment('total_view');

        return view('pages.store.product-detail', [
            'product' => $product
        ]);
    }
}
