<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $page_name = "Cart Item";
            $items = DB::table('carts')
            ->join('products','products.id','carts.product_id')
            ->select('products.*', 'carts.id as cartID', 'carts.quantity', 'carts.sell_price', 'carts.user_id')
            ->where('carts.user_id', Auth::user()->id)
            ->get();

            $subtotal = DB::select(DB::raw("SELECT SUM(sell_price * quantity) as SubTotal FROM carts WHERE user_id = 'Auth::user()->id'"));

            return view('pages.cart.index', compact('page_name','items','subtotal'));
        }else{
            $page_name = "Cart Item";
            return view('pages.cart.index', compact('page_name',));
        }


    }

    public function addToCart(Request $request, $id)
    {
        if(Auth::check())
        {
            $product = Product::find($id);

            $cart_product = DB::table('carts')
                ->where('user_id','=',Auth::user()->id)
                ->where('product_id','=', $product->id)
                ->get();

            if(count($cart_product) > 0){
                return back()->with('error','Product Allready added on Your Cart');
            }else{
                $cart = new cart();
                $cart->product_id  = $product->id;
                $cart->user_id     = Auth::user()->id;
                $cart->shop_id     = 1;
                $cart->quantity    = 1;
                $cart->sell_price  = $product->product_price;
                $cart->invoice_nuber = 123;
                $cart->save();
                return back()->with('message','Product Add In Cart Successfull');
            }

        }else{
            return back()->with('error','You Are Not LogeedIn..');
        }

    }

    public function quantityUpdate(Request $request, $id)
    {
        $update = cart::find($id);
        $update->quantity = $request->quantity;
        $update->save();
        return back();
    }

    public function removeItem($id)
    {
        $item = cart::find($id);
        $item->delete();
        return back();
    }
}
