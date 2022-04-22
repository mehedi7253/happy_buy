@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $page_name }}</h4>
                </div>
                <div class="card-body">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Category Name <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="category_name" placeholder="Enter Category Name" class="form-control @error('category_name') is-invalid @enderror" value="{{ $category->category_name }}">
                            @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>URL <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" disabled placeholder="Enter Category URL" class="form-control @error('url') is-invalid @enderror" value="{{ $category->url }}">
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Banner </label>

                            <input type="file" name="cat_banner" class="form-control @error('cat_banner') is-invalid @enderror">
                            @error('cat_banner')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <img src="{{ asset('category/images/'.$category->cat_banner) }}" class="img-thumbnail mt-4" style="height: 70px; width: 100px">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Status <sup class="text-danger font-weight-bold">*</sup></label><br/>

                            @if ($category->status == '0')
                                <input type="radio" name="status" checked value="0"> Available
                                <input type="radio" name="status" value="1"> Not Available <br/>
                            @else
                                <input type="radio" name="status" checked value="0"> Available
                                <input type="radio" name="status" checked value="1"> Not Available <br/>
                            @endif
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label> </label>
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
