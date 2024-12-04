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
        $category = $request->query('category');
        if ($search != null || $category != null) {
            return view('pages.store.filter_product', [
                'products' => Product::where('name', 'like', '%' . $search . '%')
                    ->when($category, function ($query) use ($category) {
                        return $query->where('category_id', $category);
                    })
                    ->get(),
            ]);
        }
        return view('pages.store.index', [
            'products' => Product::all(),
            'categories' => Category::all(),
        ]);
    }
}
