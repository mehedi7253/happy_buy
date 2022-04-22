<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Order List";
        $orders = DB::table('orders')->where('status', 'Processing')->orderBy('id','DESC')->get();
        return view('admin.orders.index', compact('page_name', 'orders'));
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
        $man = User::all()->where('role_id','3');
        $order_items = DB::table('orders')
            ->join('productorders', 'productorders.invoice_nuber', 'orders.invoice_number')
            ->join('products', 'products.id', 'productorders.product_id')
            ->where('orders.invoice_number', $invoice)
            ->get();

        // $active_boys = DB::select(DB::raw("SELECT users.name, orders.id as OrderID, orders.delivery_boy_id, orders.process_status FROM users, orders WHERE users.id = orders.delivery_boy_id AND orders.process_status != 4"));

        $subtotal = DB::select(DB::raw("SELECT SUM(sell_price * quantity) as SubTotal FROM productorders WHERE invoice_nuber = '$invoice'"));

        return view('admin.orders.show', compact('page_name', 'orders', 'order_items', 'subtotal', 'man'));
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
        $order->delivery_boy_id = $request->delivery_boy_id;
        $order->save();

        return back()->with('success','Order Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = order::find($id);
        $orders->delete();
        return back()->with('success','Order Delete Successful');
    }
}
