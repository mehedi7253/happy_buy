@extends('pages.includes.app')
    @section('content')
        <div class="container">
            <div class="row">
                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                    <div class="mt-5 mb-5">
                        <div class="col-md-7 col-sm-12 float-left">
                            <div class="card">
                                <div class="card-body">
                                    <p>Customer Information</p>
                                    <hr/>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Customer Name: <sup class="text-danger font-weight-bold">*</sup></label>
                                        <input value="{{ Auth::user()->name }}" class="form-control" name="customer_name">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 float-left">
                                        <label>Customer Phone: <sup class="text-danger font-weight-bold">*</sup></label>
                                        <input value="{{ Auth::user()->phone }}" class="form-control" name="customer_phone">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 float-left">
                                        <label>Customer Email: <sup class="text-danger font-weight-bold">*</sup></label>
                                        <input value="{{ Auth::user()->email }}" class="form-control" name="customer_email">
                                    </div>
                                    <div class="form-group col-md-12 float-left">
                                        <label>Shipping Address: <sup class="text-danger font-weight-bold">*</sup></label>
                                        <textarea class="form-control" name="address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 float-left">
                            <div class="card">
                                <div class="card-body">
                                    <p>Oredr Summery</p>
                                    <hr/>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $i=>$item)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td style="width: 64%">{{ $item->product_name }} x{{ $item->quantity }}</td>
                                                    <td class="text-right">
                                                        {{ number_format($item->quantity * $item->sell_price) }}
                                                        <input  value="{{ $item->invoice_nuber }}" name="invoice_number" hidden>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="border-0"></td>
                                                <td class="text-right border-0">Sub Total:</td>
                                                <td class="text-right border-0">
                                                    @foreach ($subtotals as $subtotal)
                                                        {{ number_format($subtotal->SubTotal, 2) }}
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-0"></td>
                                                <td class="text-right border-0">Shipping :</td>
                                                <td class="text-right border-0">
                                                    {{ number_format($item->shipping_charge,2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-0"></td>
                                                <td class="text-right border-0">Total :</td>
                                                <td class="text-right border-0">
                                                    @foreach ($subtotals as $subtotal)
                                                        {{ number_format($subtotal->SubTotal + $item->shipping_charge, 2) }}
                                                        <input hidden value="{{ $subtotal->SubTotal + $item->shipping_charge }}" name="amount" id="total_amount">
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-0"></td>
                                                <td class="border-0"></td>
                                                <td class="border-0">
                                                    <button type="submit" class="btn btn-success btn-block">Pay Now</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('script')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>

    @endsection
