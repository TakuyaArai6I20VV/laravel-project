<?php
namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController
{
    public function index(Category $category)
    {
        return view('categories.index')->with(['posts' => $category->getByCategory()]);
    }
}
