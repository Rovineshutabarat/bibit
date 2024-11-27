<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('pages.adminpage.product.index', [
            'products' => Product::all()
        ]);
    }

    public function create(): View
    {
        return view('pages.adminpage.product.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:category,id',
        ]);
        if ($validatedData) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/product'), $imageName);
                $validatedData['image'] = 'images/product/' . $imageName;
            }
            Product::create($validatedData);
            notify()->success('Berhasil Tambah Produk ⚡️');
            return redirect()->route('adminpage.product.index');
        } else {
            notify()->error('Input Tidak Valid');
            return redirect()->back();
        }
    }

    public function edit($id): View
    {
        return view('pages.adminpage.product.edit', [
            'product' => Product::with('category')->findOrFail($id),
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:category,id',
        ]);
        if (!$validatedData) {
            notify()->error('Input Tidak Valid');
        }
        $product = Product::where('id', $id)->first();
        if (!$product) {
            notify()->error('Produk Tidak Ditemukan');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/product'), $imageName);
            $validatedData['image'] = 'images/product/' . $imageName;
        }
        Product::where('id', $id)->update($validatedData);
        notify()->success('Berhasil Update Produk ⚡️');
        return redirect()->route('adminpage.product.index');
    }

    public function delete($id): RedirectResponse
    {
        Product::where('id', $id)->delete();
        notify()->success('Berhasil Hapus Produk ⚡️');
        return redirect()->route('adminpage.product.index');
    }
}
