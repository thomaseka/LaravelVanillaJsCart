<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


// public function __construct()
// {
//     // $this->middleware('level:1')->only(['create', 'update', 'delete', 'getProducts']); // hanya admin
//     // $this->middleware('level:3')->only(['index', 'show', 'tampil']); // hanya user
// }



class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
        // Get the query parameter 'subCategoryId'
        $subCategoryId = $request->query('subCategoryId', 0);

        if ($subCategoryId > 0) {
            $products = Product::where('subCategoryId', $subCategoryId)->where('isActive', 1)->get();
        } else {
            $products = Product::where('isActive', 1)->get();
        }

        return response()->json(['products' => $products, 'success' => true], 200);
    }
}
