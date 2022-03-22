<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product_in_shop;
use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductIntoShopController extends Controller
{
    public function index()
    {
        $page_name = "All Product and Shop List";
        $shopProducts = DB::table('product_in_shops')
                ->join('shops', 'shops.id', '=','product_in_shops.shop_id')
                ->groupBy('product_in_shops.shop_id')
                ->get();

        return view('admin.product-into-shop.index', compact('page_name','shopProducts'));
    }

    public function create()
    {
        $page_name = "All Product and Shop List";
        $categories  = Category::all();

        return view('admin.product-into-shop.create', compact('page_name','categories'));
    }

    public function searchProduct(Request $request)
    {
        $page_name = "Add Category Into Shop";
        $categories  = Category::all();
        $shops     = shop::all();
        $search = $request->category_id;
        $data = DB::table('products')
            ->where('category_id', 'LIKE', "%" . $search . "%")
            ->get();

        if (count($data)>0){
            return view('admin.product-into-shop.create',compact('data', 'page_name', 'categories', 'shops'));
        }

    }

    public function store(Request $request)
    {
        foreach($request->product_id as $key=>$insert)
        {
            $saverecord = [
                'shop_id'      => $request->shop_id,
                'category_id'  => $request->category_id,
                'product_id'   => $request->product_id [$key],
            ];
            $data = DB::table('product_in_shops')->insert($saverecord);
        }
        return redirect()->route('shop.product.index')->with('success','Product Added Successfull');
    }

    public function show($id)
    {
        $page_name = "Products";
        $shop = shop::find($id);
        $productShop = DB::table('product_in_shops')
                ->join('products', 'products.id', '=', 'product_in_shops.product_id')
                ->join('categories', 'categories.id','=','product_in_shops.category_id')
                ->select('products.*','categories.*', 'product_in_shops.id as ProductID')
                ->where('product_in_shops.shop_id', '=', $id)
                ->get();

        return view('admin.product-into-shop.show', compact('page_name','shop','productShop'));
    }

    public function delete($id)
    {
        $productShop_delete = product_in_shop::find($id);
        $productShop_delete->delete();
        return back()->with('success','Remove Successful');
    }
}
