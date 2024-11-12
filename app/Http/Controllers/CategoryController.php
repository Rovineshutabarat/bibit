<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('adminpage.category.index',
            [
                'categories' => Category::all()
            ]);
    }

    public function create(): View
    {
        return view('adminpage.category.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
        ]);
        if ($validate) {
            DB::table('category')->insert($validate);
            return redirect()->route('adminpage.category.index');
        }
    }

    public function delete($id)
    {
        DB::table('category')->where('id', $id)->delete();
        return redirect()->route('adminpage.category.index');
    }

    public function edit($id): View
    {
        return view('adminpage.category.edit', [
            'category' => DB::table('category')->where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
        ]);
        $category = DB::table('category')->where('id', $id)->first();
        if ($category) {
            DB::table('category')->where('id', $id)->update($validatedData);
            return redirect()->route('adminpage.category.index');
        }
    }
}
