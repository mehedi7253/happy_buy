@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('shop-category.index') }}" class="btn btn-success float-right"><i class="fa fa-edit"></i> Manage Shop Category</a></h3>
                </div>
                <div class="card-body">
					@if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('shop-category.store') }}" method="POST">
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
                            <label>Select Category <sup class="text-danger font-weight-bold">*</sup></label>
                            <br/>
                            @foreach ($categories as $category)
                                <input type="checkbox" name="category_id[]" value="{{ $category->id }}"> {{  $category->category_name  }} <br/>
                            @endforeach
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="btn" class="btn btn-secondary rounded" value="Submit">
                        </div>
                    </form>

                </div>
            </div>
        </div>

    @endsection
