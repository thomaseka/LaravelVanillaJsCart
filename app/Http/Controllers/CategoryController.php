<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('subcategory')->orderBy('categoryId', 'DESC')->get();
        return view('user.marketplace', compact('categories'));
    }
}
