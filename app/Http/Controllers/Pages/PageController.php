<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
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

    public function allShop()
    {
        $shop = shop::all();
        return view('pages.shop.allshop', compact('shop'));
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
        $category = DB::table('categories')
            ->join('products', 'products.category_id', 'categories.id')
            ->where('categories.id', $id)
            ->where('products.type', 'Regular')
            ->get();

        return view('pages.category.index', compact('category'));
    }

    public function offerProduct()
    {
       $offers = Product::all()->where('type', 'Offer');
       return view('pages.offer.index', compact('offers'));
    }

    public function product($id)
    {
        $product = Product::find($id);
        $rating = DB::select(DB::raw("SELECT AVG(rating) as AvarageRating, COUNT(user_id) AS User FROM ratings WHERE product_id = $id"));
        $totalSell = DB::select(DB::raw("SELECT COUNT(product_id) as TotalSell FROM productorders WHERE product_id = $id"));

        return view('pages.category.show', compact('product','rating', 'totalSell'));
    }


}
