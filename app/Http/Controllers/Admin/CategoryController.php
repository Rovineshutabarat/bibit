<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
class CategoryController extends Controller
{

    public function index(): View
    {
        return view(
            'pages.adminpage.category.index',
            [
                'categories' => Category::all()
            ]
        );
    }

    public function create(): View
    {
        return view('pages.adminpage.category.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'string|max:255',
        ]);
        if ($validatedData) {
            Category::create($validatedData);
            notify()->success('Berhasil Tambah Kategori ⚡️');
            return redirect()->route('adminpage.category.index');
        } else {
            notify()->error('Input Tidak Valid');
            return redirect()->back();
        }
    }

    public function edit($id): View
    {
        return view('pages.adminpage.category.edit', [
            'category' => DB::table('category')->where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'string|max:255',
        ]);
        $category = DB::table('category')->where('id', $id)->first();
        if ($category) {
            Category::where('id', $id)->update($validatedData);
            notify()->success('Berhasil Update Kategori ⚡️');
            return redirect()->route('adminpage.category.index');
        } else {
            notify()->error('Input Tidak Valid');
            return redirect()->back();
        }
    }

    public function delete($id): RedirectResponse
    {
        Category::where('id', $id)->delete();
        notify()->success('Berhasil Hapus Kategori ⚡️');
        return redirect()->route('adminpage.category.index');
    }
}