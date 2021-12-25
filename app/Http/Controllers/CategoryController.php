<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:editor']);
    }

    public function index()
    {
        $data = Category::paginate(10);

        return view('category.index', compact('data'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $req)
    {
        $category = Category::create(['category' => $req->category_name]);

        if ($category) {
            return redirect()->route('category.index');
        } else {
            return redirect()->route('category.index')->withErrors(['message' => 'Failed to create category' + $category]);
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->delete()) {
            return redirect()->route('category.index');
        } else {
            return redirect()->route('category.index')->withErrors(['message' => 'Failed to delete category']);
        }
    }
}
