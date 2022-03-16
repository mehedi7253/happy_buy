@extends('includes.app')
    @section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ $page_name }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('shop.index') }}" class="btn btn-success float-right"><i class="fa fa-edit"></i> Manage Shops</a></h3>
                </div>
                <div class="card-body">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <form action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Shop Name <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="shop_name" placeholder="Enter Shop Name" class="form-control @error('shop_name') is-invalid @enderror" value="{{ old('shop_name') }}">
                            @error('shop_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>URL <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="url" placeholder="Enter Shop URL" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}">
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Location <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="location" placeholder="Enter Shop Location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Shop Phone Number <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="phone_number" placeholder="Enter Shop Phone Number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Shop Information <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="shop_info" placeholder="Enter Shop Information" class="form-control @error('shop_info') is-invalid @enderror" value="{{ old('shop_info') }}">
                            @error('shop_info')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Select Image <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="file" name="imageFile[]" id="images" max="3" multiple="multiple" placeholder="Enter Shop Information" class="form-control @error('imageFile') is-invalid @enderror">
                            @error('imageFile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Status <sup class="text-danger font-weight-bold">*</sup></label><br/>
                            <input type="radio" name="status" checked value="0"> Available
                            <input type="radio" name="status" value="1"> Not Available <br/>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mt-3">
                            <button type="submit"  name="btn" class="btn btn-secondary btn-block">Submit</button>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left text-center">
                            <div class="imgPreview float-left"> </div>
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
