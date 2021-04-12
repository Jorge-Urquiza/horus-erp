<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesTable;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\categories\StoreCategoriesRequest;

class CategoryController extends Controller
{
    public function index()
    {
        
        return view('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoriesRequest $request)
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

   function update(StoreCategoriesRequest $request, Category $category)
    {
        $category->fill($request->all());

        $category->save();

        flash()->updated();

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        dd($category);
        flash()->deleted();

        return redirect()->route('categories.index');
    }

    public function list()
    {
        return CategoriesTable::generate();
    }
}
