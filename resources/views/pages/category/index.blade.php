@extends('pages.includes.app')
    @section('content')
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 mt-5">
                    <h1 class="text-center text-capitalize mb-3">Product's</h1>
                </div>

                @foreach ($category as $products)
                    <div class="col-md-3 col-sm-12 float-left mt-3 mb-5">
                        <div class="card" style="border: 1px solid black;">
                            <img src="{{ asset('product/'.$products->banner ) }}" class="card-img-top" style="height: 200px; width: 100%; border-radius: 10px">
                            <div class="card-body">
                                <p class="text-center font-weight-bold">{{ $products->product_name }}</p>
                                <p class="text-center font-weight-bold">{{ number_format($products->product_price,2) }}</p>
                            </div>
                            <div class="card-footer">
                                <form action="{{ route('product.add.cart',$products->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-primary btn-block"><i class="fa fa-shopping-basket"></i> Add To Cart</button>
                                </form>
                                <br/>
                                <a href="{{ route('product.details',$products->id) }}" class="btn  btn-dark btn-block"> View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endsection
