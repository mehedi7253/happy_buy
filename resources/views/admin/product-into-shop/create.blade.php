@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('category.index') }}" class="btn btn-success float-right"><i class="fa fa-edit"></i> Manage Category</a></h3>
                </div>
                <div class="card-body">
					@if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <form action="{{ route('search.product') }}" method="POST" role="search">
                        @csrf
                        <div class="col-md-6 col-sm-12 float-left form-group">
                            <label>Select Category</label> <br/>
                            <select class="form-control" id="category_id" name="category_id">
                                <option>------Select Category-------</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 float-left form-group mt-2">
                            <button type="submit" id="search" class="btn btn-success mt-4 col-md-4 rounded">Submit</button>
                        </div>
                    </form>

                    @if(isset($data))
                        <form action="{{ route('store.product.shop') }}" method="POST">
                            @csrf
                            <div class="form-group col-md-12">
                                <label>Select Shop</label>
                                <select class="form-control col-6" name="shop_id">
                                    <option>------Select Shop-------</option>
                                    @foreach ($shops as $shop)
                                        <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Select Product <sup class="text-danger font-weight-bold">*</sup></label>
                                <br/>
                                @foreach ($data as $product)
                                    <input value="{{ $product->category_id }}" name="category_id" hidden>
                                    <input type="checkbox" name="product_id[]" value="{{ $product->id }}"> {{  $product->product_name  }} <br/>
                                @endforeach
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" name="btn" class="btn btn-secondary rounded" value="Submit">
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>

    @endsection
