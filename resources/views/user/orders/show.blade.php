@extends('includes.app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">

            </div>
        </div>
    </div>
        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 float-left">
                            <p class="font-weight-bold">Order Number: <span class="font-weight-normal">{{ $orders->invoice_number }}</span></p>
                            <p class="font-weight-bold">Order Date: <span class="font-weight-normal">{{ @date('d-m-Y', strtotime($orders->created_at))  }}</span></p>
                        </div>
                        <div class="col-md-6 col-sm-12 float-left">
                            <p class="font-weight-bold text-right">Transaction Number</p>
                            <p class="font-weight-bold text-right">{{ $orders->transaction_id }}</p>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 float-left">
                            <h6 class="font-weight-bold">Billing Details</h6><br/>
                            <h5 class="font-weight-bolder">{{ $orders->name }}</h5>
                            <p class="font-weight-bold">{{ $orders->email }} <br/> {{ $orders->phone }} </p>

                        </div>
                        <div class="col-md-4 col-sm-12 float-left">
                            <h6 class="font-weight-bold">Shipping Address</h6>
                            <label class="font-weight-bold text-center">{{ $orders->address }}</label>
                        </div>
                        <div class="col-md-4 col-sm-12 float-left">
                            <h6 class="font-weight-bold text-right">Payment To</h6>
                            <br/>
                            <h5 class="font-weight-bolder text-right">HappyBuy</h5>
                            <p class="font-weight-bold text-right">info@happybuy.com <br/> +880 17xxxxxxxx </p>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="track">
                                @if ($orders->process_status == '1')
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Delivery Boy Picked </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Complete</span> </div>
                                @elseif ($orders->process_status == '2')
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Delivery Boy Picked </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Complete</span> </div>
                                @elseif ($orders->process_status == '3')
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Delivery Boy Picked </span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Complete</span> </div>
                                @elseif ($orders->process_status == '4')
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Delivery Boy Picked </span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Complete</span> </div>
                                @endif

                            </div>
                        </div>

                    </div>
                    <hr/>
                    <div class="row">

                        <div class="col-md-12 mx-auto">
                            <h6>Order Details</h6><br/>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_items as $i=>$order_item)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $order_item->product_name }}</td>
                                                <td>{{ $order_item->quantity }}</td>
                                                <td>
                                                    {{ number_format($order_item->sell_price,2) }}
                                                </td>
                                                <td>
                                                    {{ number_format($order_item->sell_price * $order_item->quantity,2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot >
                                        <tr>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>

                                            <td class="text-right border-0">Sub Total:</td>
                                            <td class="text-right border-0">
                                                @foreach ($subtotal as $subtotals)
                                                 {{ number_format($subtotals->SubTotal,2) }}
                                                @endforeach
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="text-right border-0">Delivery Charge:</td>
                                            <td class="text-right border-0">60.00</td>

                                        </tr>
                                        <tr>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="text-right border-0">Total:</td>
                                            <td class="text-right border-0">
                                                @foreach ($subtotal as $subtotals)
                                                    {{ number_format($subtotals->SubTotal + 60,2) }}
                                                @endforeach
                                            </td>

                                        </tr>


                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection
