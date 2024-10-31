<?php

namespace App\Http\Controllers;

use App\Models\Product;

class GuestController extends Controller
{
    public function index()
    {
        $foodProducts = Product::where('categoryId', '=', 1)->where('isActive', 1)->count();
        $drinkProducts = Product::where('categoryId', '=', 2)->where('isActive', 1)->count();
        $latestProducts = Product::latest()->where('isActive', 1)->take(4)->get();
        return view('user.index', compact('latestProducts', 'foodProducts', 'drinkProducts'));
    }
}
