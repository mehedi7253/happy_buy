<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\productorder;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ProductOrderController extends Controller
{
    public function orderProduct(Request $request)
    {
        $invoice = rand(100,1000000);
        $date  = new DateTime();
        $user_id = Auth::user()->id;

        foreach($request->product_id as $key=>$insert)
        {
            $saverecord = [
                'user_id'         => $user_id,
                'product_id'      => $request->product_id [$key],
                'quantity'        => $request->quantity [$key],
                'sell_price'      => $request->sell_price [$key],
                'shipping_charge' => 60,
                'invoice_nuber'   => $invoice,
                'created_at'      => $date,
            ];
            $data = DB::table('productorders')->insert($saverecord);
        }
        $orderId = DB::getPdo()->lastInsertId();
        $empty = DB::select(DB::raw("DELETE FROM carts WHERE user_id = '$user_id'"));

        return redirect()->route('next.order.show',[$orderId])->with('message','Order Placed Successful');
    }

    public function nextOrder($id)
    {
        $orderId = productorder::find($id);
        $invoice = $orderId->invoice_nuber;
        $items = DB::table('productorders')
            ->join('products','products.id','productorders.product_id')
            ->where('invoice_nuber',$invoice)
            ->get();
        $subtotals = DB::select(DB::raw("SELECT SUM(sell_price * quantity) as SubTotal FROM productorders WHERE invoice_nuber = '$invoice'"));

        return view('pages.cart.confirm-order', compact('items', 'subtotals'));
    }
}
