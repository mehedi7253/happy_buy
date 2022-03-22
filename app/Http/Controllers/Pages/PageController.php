<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function shop()
    {
        $shops = shop::all();
        return view('pages.shop.index', compact('shops'));
    }

    public function singleShop($name)
    {
        $shops = DB::table('shops')->where('url','=',$name)->get();

        foreach($shops as $shop)
        {
             $shop;
        }

        return view('pages.shop.shop', compact('shop'));
    }

    public function prodcutCategory($id)
    {
        $category = DB::table('product_in_shops')
            ->join('products','products.category_id', '=', 'product_in_shops.category_id')
            ->where('product_in_shops.category_id', '=', $id)
            ->get();

            return view('pages.category.index', compact('category'));
    }
}
