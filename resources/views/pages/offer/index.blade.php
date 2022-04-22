@extends('pages.includes.app')
    @section('content')
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 mt-5">
                    <h1 class="text-center text-capitalize mb-3">Offer Product's</h1>
                    <div class="form-group input-group col-md-4 float-right">
                            <input type="text" class="form-control"  id="myInput" placeholder="Search...." title="Type in a name">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                @foreach ($offers as $products)
                    <div class="col-md-3 col-sm-12 float-left mt-3 mb-5">
                        <div class="card" style="border: 1px solid black;" id="myTable">
                            <span>
                                <img src="{{ asset('product/'.$products->banner ) }}" class="card-img-top" style="height: 200px; width: 100%;">
                                <div class="card-body">
                                    <p class="text-center font-weight-bold">{{ $products->product_name }}</p>
                                    <p class="text-center font-weight-bold">{{ number_format($products->special_price,2) }}</p>
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
                            </span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable span").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    @endsection
