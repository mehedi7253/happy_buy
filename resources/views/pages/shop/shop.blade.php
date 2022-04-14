@extends('pages.includes.app')
    @section('content')

        <section class="shop_page">
            <div class="col-md-5 mx-auto">
                <h1 class="font-weight-bold text-center text-white shop_page_h1 text-capitalize">{{ $shop->shop_name }}</h1>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-12 float-left mt-5 mb-5" style="border: 2px solid red; border-radius: 10px">
                    <h4 class="p-2 text-center">Find Us</h4>

                       <p class="text-center"><i class="fa fa-location-arrow text-success"></i> {{ $shop->location }}</p>
                       <p class="text-center"><i class="fa fa-phone text-success"></i> {{ $shop->phone_number }}</p>
                       <p class="text-center"><i class="fa fa-info text-success" ></i> {{ $shop->id }}</p>
                </div>

                <div class="col-md-10 col-sm-12 float-left mt-5 mb-5">

                    @php
                    $category = DB::table('product_in_shops')
                        ->join('categories', 'categories.id', '=', 'product_in_shops.category_id')
                        ->where('product_in_shops.shop_id', '=', $shop->id)
                        ->GroupBy('product_in_shops.category_id')
                        ->get();
                    @endphp
                    @foreach ($category as $categories)
                        <div class="col-md-3 col-sm-12 float-left" >
                            <div class="card">
                                <div class="card-body text-center">
                                 <a href="{{ route('category.shop.product', $categories->id) }}" style="text-decoration: none">
                                    <img src="{{ asset('category/images/'.$categories->cat_banner) }}" style="height: 50px; width: 50px">
                                    <br/>
                                   <span class="p-2">{{ $categories->category_name }}</span>
                                </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    @endsection
