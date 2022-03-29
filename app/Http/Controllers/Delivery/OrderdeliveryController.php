<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderdeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Order List";
        $orders = DB::table('orders')->where('delivery_boy_id', Auth::user()->id)->where('status', 'Processing')->get();
        return view('delivery.orders.index', compact('page_name', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "Order Details";
        $orders = order::find($id);
        $invoice = $orders->invoice_number;

        $order_items = DB::table('orders')
            ->join('productorders', 'productorders.invoice_nuber', 'orders.invoice_number')
            ->join('products', 'products.id', 'productorders.product_id')
            ->where('orders.invoice_number', $invoice)
            ->get();

        $subtotal = DB::select(DB::raw("SELECT SUM(sell_price * quantity) as SubTotal FROM productorders WHERE invoice_nuber = '$invoice'"));

        return view('delivery.orders.show', compact('page_name', 'orders', 'order_items', 'subtotal'));
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
        $order = order::find($id);
        $order->process_status  = $request->process_status;
        $order->rate            = 1;
        $order->save();

        return back()->with('success', 'Order Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
