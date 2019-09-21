<?php

namespace App\Http\Controllers;

use App\Category;

use App\Http\Requests\Categories\CreateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('backend.category.index')->with('categories', Category::all());
    }


    public function create()
    {
        return view('backend.category.create');
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:categories'
        ]);

        Category::create([
            'name' => $request->name
        ]);
        session()->flash('success', 'Category Created Successfully.');
        return redirect(route('category.create'));
    }


    public function show(Category $category)
    {

    }


    public function edit(Category $category)
    {
        return view('backend.category.edit')->with('category', $category);
    }


    public function update(Request $request, Category $category)
    {
        $this->validate(request(), [
            'name' => 'required|unique:categories,name,'.$category->id
        ]);


        $category->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Category Updated Successfully.');
        return redirect(route('category.index'));
    }


    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Category Deleted Successfully.');
        return redirect(route('category.index'));
    }
}
