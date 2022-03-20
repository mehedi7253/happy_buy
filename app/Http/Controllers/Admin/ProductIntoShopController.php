<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductIntoShopController extends Controller
{
    public function index()
    {
        $page_name = "All Product and Shop List";
        return view('admin.product-into-shop.index', compact('page_name'));
    }

    public function create()
    {
        $page_name = "All Product and Shop List";
        $categories  = Category::all();
        $shops       = shop::all();
        return view('admin.product-into-shop.create', compact('page_name','categories', 'shops'));
    }

    public function getProduct(Request $request)
    {
        $products = DB::table('products')
            ->where('category_id', $request->category_id)
            ->pluck('category_name', 'category_id');

        return response()->json($products);
    }
}
