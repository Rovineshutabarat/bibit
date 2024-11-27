<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
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
}
