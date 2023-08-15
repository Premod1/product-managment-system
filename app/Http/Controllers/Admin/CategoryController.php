<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(5);
        return view('admin.category.index',compact('category'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|max:255', // Validation rules for the category input
        ]);

        $category = new Category();
        $category->name = $request->input('category');
        $category->save();

        return redirect()->route('category')->with('status', 'Category added successfully.');
    }
}
