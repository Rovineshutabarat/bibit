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
        return view('pages.store.product-detail', [
            'product' => Product::findOrFail($id)
        ]);
    }
}
