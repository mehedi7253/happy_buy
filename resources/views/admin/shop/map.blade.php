@extends('includes.app')
    @section('content')
        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('shop.index') }}" class="btn btn-success float-right"><i class="fa fa-edit"></i> Manage Shop</a></h3>
                </div>
                <div class="card-body">
					@if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('google-map.update',$shop->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-4 col-sm-12 float-left">
                            <label>Click Here To Open Google Map</label>
                            <a target="_blank" href="https://google-map-generator.com/" class="btn btn-info btn-block">Google Map</a>
                        </div>
                        <div class="form-group col-md-8 col-sm-12 float-left">
                            <label>Google Link<sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="google_map" class="form-control @error('google_map') is-invalid @enderror" placeholder="Enter Google Map Link">
                            @error('google_map')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-sm-12 float-left">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
