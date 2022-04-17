<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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

    public function store(CreateCategoryRequest $request)
    {
        $data = request()->all();
        Category::create($data);
        session()->flash('success', 'Category created successfully');
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('categories.create')->with('category', $category);
    }

    public function update(UpdateCategoriesRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]);
        session()->flash('success', 'Category updated successfully');
        return redirect(route('categories.index'));
    }

    public function destroy(Category $category)
    {
//        dd('here');
        $category->delete();
        return redirect(route('categories.index'));
    }
}
