<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        // dd($categories);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        // dd($id);
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $category = Category::find($request->id);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        // dd('here');
        // dd($id);
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('categories.index');
        // dd($category);
    }
}
