@extends('pages.includes.app')
    @section('content')
    <section class="recomandation">
        <div class="container">
            <div class="col-md-12 col-sm-12 mb-5 mt-3">
                <div class="card">
                    <h4 class="p-3" style="border-bottom: 1px solid silver; width: 40%">{{ $page_name }}</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead style="background-color: #666666; color: white;">
                                    <tr class="text-center">
                                        <th>Serial</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if (Auth::check())
                                <tbody>
                                    @foreach ($items as $i=>$item)
                                        <tr class="text-center">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->product_name }}</td>
                                            <td>
                                                <img src="{{ asset('product/'.$item->banner) }}" style="height: 50px; width: 100%">
                                            </td>

                                            <td>{{ number_format($item->sell_price, 2) }}</td>
                                            <td style="width: 30%">
                                               <div class="input-group quantity">
                                                    <form action="{{ route('qauntity.decrement', $item->cartID) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="submit" class="btn btn-danger" onclick="decrementValue()" value="-" />
                                                    </form>
                                                    <input type="text" name="quantity" class="form-control col-6" value="{{ $item->quantity }}" maxlength="2" max="10" size="1" id="number{{ $item->cartID }}" />

                                                     <form action="{{ route('qauntity.update', $item->cartID) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="submit" class="btn btn-success" onclick="incrementValue()" value="+" />
                                                    </form>

                                                </div>

                                            </td>
                                            <td>
                                                {{ number_format($item->sell_price * $item->quantity,2) }}
                                            </td>
                                            <td class="font-weight-bold">
                                                <form action="{{ route('carts.destroy', $item->cartID) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot >
                                    <tr>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="text-right border-0">Sub Total:</td>
                                        <td class="text-right border-0">
                                            @foreach ($subtotal as $subtotals)
                                             {{ number_format($subtotals->SubTotal,2) }}
                                            @endforeach
                                        </td>
                                        <td class="border-0"></td>
                                    </tr>
                                    <tr>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="text-right border-0">Delivery Charge:</td>
                                        <td class="text-right border-0">60.00</td>
                                        <td class="border-0"></td>
                                    </tr>
                                    <tr>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="text-right border-0">Total:</td>
                                        <td class="text-right border-0">
                                            @foreach ($subtotal as $subtotals)
                                                {{ number_format($subtotals->SubTotal + 60,2) }}
                                            @endforeach
                                        </td>
                                        <td class="border-0"></td>
                                    </tr>

                                    <tr>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="border-0"></td>
                                        <td class="border-0">
                                            <form action="{{ route('orderProduct') }}" method="POST">
                                                @csrf
                                                @foreach ($items as $i=>$item)
                                                    <input name="product_id[]" value="{{ $item->id }}" hidden>
                                                    <input name="quantity[]" value="{{ $item->quantity }}" hidden>
                                                    <input name="sell_price[]" value="{{ $item->sell_price }}" hidden>
                                                @endforeach
                                                <button type="submit" class="btn btn-success btn-block">Place Order</button>
                                            </form>
                                        </td>
                                        <td class="border-0"></td>
                                    </tr>
                                </tfoot>
                                @else
                                    <tbody>
                                        <tr>
                                            <td class="text-danger font-weight-bold">No Product Add On Your Cart</td>
                                        </tr>
                                    </tbody>
                                @endif

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @endsection

    @section('script')
    <script type="text/javascript">
        function incrementValue()
        {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                    document.getElementById('number').value = value;
            }
        }
        function decrementValue()
        {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                    document.getElementById('number').value = value;
            }

        }
    </script>
    @endsection
