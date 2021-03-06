<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesTable;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\categories\StoreCategoriesRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categorias.create')->only(['create']);
        $this->middleware('permission:categorias.index')->only(['index','show']);
        $this->middleware('permission:categorias.destroy')->only(['destroy']);
        $this->middleware('permission:categorias.edit')->only(['edit']);
    }

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

        flash()->deleted();

        return redirect()->route('categories.index');
    }

    public function list()
    {
        return CategoriesTable::generate();
    }
}
