<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product_in_shop;
use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $page_name = "All Product and Shop List";
        $shopProducts = DB::table('product_in_shops')
                ->join('shops', 'shops.id', '=','product_in_shops.shop_id')
                ->groupBy('product_in_shops.shop_id')
                ->get();

        return view('admin.product-into-shop.index', compact('page_name','shopProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "All Product and Shop List";
        $categories  = Category::all();
        $shops     = shop::all();

        return view('admin.product-into-shop.create', compact('page_name','categories', 'shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->category_id as $key=>$insert)
        {
            $saverecord = [
                'shop_id'      => $request->shop_id,
                'category_id'  => $request->category_id [$key],
            ];
            $data = DB::table('product_in_shops')->insert($saverecord);
        }
        return redirect()->route('shop-category.index')->with('success','Product Added Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "Shop Category List";
        $shop = shop::find($id);
        $productShop = DB::table('product_in_shops')
                ->join('categories', 'categories.id','=','product_in_shops.category_id')
                ->select('categories.*', 'product_in_shops.id as ProductID')
                ->where('product_in_shops.shop_id', '=', $id)
                ->get();

        return view('admin.product-into-shop.show', compact('page_name','shop','productShop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productShop_delete = product_in_shop::find($id);
        $productShop_delete->delete();
        return back()->with('success','Remove Successful');
    }
}
