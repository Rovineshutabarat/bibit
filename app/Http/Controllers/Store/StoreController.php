<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoreController extends Controller
{

    public function index(Request $request): View
    {
        $search = $request->query('search');
        if ($search != null) {
            return view('pages.store.search_product', [
                'products' => Product::where('name', 'like', '%' . $search . '%')->get(),
            ]);
        }
        return view('pages.store.index', [
            'products' => Product::all(),
            'categories' => Category::all(),
        ]);
    }
}
