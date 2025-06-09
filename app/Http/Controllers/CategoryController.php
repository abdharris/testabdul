<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Index with filter kode & nama
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->filled('kode')) {
            $query->where('kode', 'like', '%' . $request->kode . '%');
        }
        if ($request->filled('nama')) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        $categories = $query->orderBy('id')->paginate(10);

        return view('categories.index', compact('categories'));
    }

    // Show single category with items (eager loading)
    public function show($id)
    {
        $category = Category::with('masterItems')->findOrFail($id);
        return view('categories.show', compact('category'));
    }

    // Form create/edit
    public function formView($method, $id = 0)
    {
        $category = $method == 'new' ? new Category : Category::findOrFail($id);
        return view('categories.form', compact('category', 'method'));
    }

    // Save new or update
    public function formSubmit(Request $request, $method, $id = 0)
    {
        $request->validate([
            'kode' => 'required|unique:categories,kode,' . ($method == 'edit' ? $id : 'NULL'),
            'nama' => 'required',
        ]);

        if ($method == 'new') {
            $category = new Category;
        } else {
            $category = Category::findOrFail($id);
        }

        $category->kode = $request->kode;
        $category->nama = $request->nama;
        $category->save();

        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('categories.index');
    }
}
