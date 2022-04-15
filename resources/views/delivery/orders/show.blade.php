@extends('includes.app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 float-left">
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>

            <div class="col-md-8 col-sm-12 float-left">
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
            </div>
            <div class="col-md-4 col-sm-12 float-left mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Order Action</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('delivery-orders.update',$orders->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Delivery Status<sup class="text-danger font-weight-bold">*</sup></label>
                                <select name="process_status" class="form-control">
                                    <option disabled value="1"  {{ $orders->process_status == 1 ? 'selected' : '' }}>Rechived</option>
                                    <option disabled value="2"  {{ $orders->process_status == 2 ? 'selected' : '' }}>Assigned</option>
                                    <option value="3"  {{ $orders->process_status == 3 ? 'selected' : '' }}>Processing</option>
                                    <option value="4"  {{ $orders->process_status == 4 ? 'selected' : '' }}>Complete</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Payment Status<sup class="text-danger font-weight-bold">*</sup></label>
                                <input disabled value="Paid" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Assign Delivery Boy<sup class="text-danger font-weight-bold">*</sup></label>
                               <input disabled value="{{ Auth::user()->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-secondary btn-block rounded" value="Update Order">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
