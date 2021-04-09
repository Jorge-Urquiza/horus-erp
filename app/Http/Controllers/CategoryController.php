<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesTable;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        flash()->stored();

        return redirect()->route('categories.index');
    }

    public function show(Category $categoria)
    {
        //
    }

    public function edit(Category $categoria)
    {
        return view('categories.edit', compact('categoria'));
    }

   function update(Request $request, Category $category)
    {
        $category->fill($request->all());

        $category->save();

        flash()->updated();

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        flash()->deleted();

        return redirect()->route('categories.index');
    }

    public function list()
    {
        return CategoriesTable::generate();
    }
}
