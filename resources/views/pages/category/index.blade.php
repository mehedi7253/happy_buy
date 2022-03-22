@extends('pages.includes.app')
    @section('content')
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 mt-5">
                    <h1 class="text-center text-capitalize mb-3">Product's</h1>
                </div>

                @foreach ($category as $products)
                    <div class="col-md-4 col-sm-12 float-left mt-3 mb-5">
                        <div class="card">
                            <div class="card-body">

                            </div>
                            <div class="card-footer">
{{ $products->shop_id }}
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    @endsection
