@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('product.index') }}" class="btn btn-success float-right"><i class="fa fa-edit"></i> Manage Products</a></h3>
                </div>
                <div class="card-body">
					@if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-7 col-sm-12 float-left">
                            <div class="form-group">
                                <label>Product Name: <sup class="font-weight-bold text-danger">*</sup></label>
                                <input type="text" name="product_name" placeholder="Product Name" class="form-control @error('product_name') is-invalid @enderror" value="{{ $product->product_name }}">
                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Product Price: <sup class="font-weight-bold text-danger">*</sup></label>
                                <input type="text" name="product_price" placeholder="Product Price" class="form-control @error('product_price') is-invalid @enderror" value="{{ $product->product_price }}">
                                @error('product_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="form-group">
                                <label>Offer Price: <sup class="font-weight-bold text-danger">Select Only Offer Product</sup></label>
                                <input type="number" name="special_price" class="form-control" value="{{ $product->special_price }}">
                            </div>
                            <div class="form-group">
                                <label>Description <sup class="text-danger font-weight-bold">*</sup></label><br/>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="application">{{ $product->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 float-left">
                            <div class="form-group">
                                <label>Select category: <sup class="font-weight-bold text-danger">*</sup></label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label>prdocut Type: <sup class="font-weight-bold text-danger">*</sup></label>
                                <select class="form-control" name="type">
                                    @if ($product->type == 'Regular')
                                        <option value="Regular" selected>Regular</option>
                                        <option value="Offer">Offer</option>
                                    @else
                                        <option value="Regular">Regular</option>
                                        <option value="Offer" selected>Offer</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status <sup class="text-danger font-weight-bold">*</sup></label><br/>
                                <input type="radio" name="status" checked value="0"> Available
                                <input type="radio" name="status" value="1"> Not Available <br/>
                            </div>
                            <div class="form-group">
                                <label>Select Image <sup class="text-danger font-weight-bold">*</sup></label>
                                <input type="file" name="imageFile[]" id="images" max="3" multiple="multiple" placeholder="Enter Shop Information" class="form-control @error('imageFile') is-invalid @enderror">
                                @error('imageFile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="imgPreview float-left" style="height: 241px; border: 1px solid black; width: 100%"> </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-12 mt-3">
                            <button type="submit"  name="btn" class="btn btn-secondary btn-block">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    @endsection
    @section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });
    </script>
    @endsection
