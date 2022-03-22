@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('delivery-man.index') }}" class="btn btn-success float-right"><i class="fa fa-edit"></i> Manage Delivery Man</a></h3>
                </div>
                <div class="card-body">
					@if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <form action="{{ route('delivery-man.store') }}" method="POST">
                        @csrf
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label> Name: <sup class="font-weight-bold text-danger">*</sup></label>
                            <input type="text" name="name" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label> Email: <sup class="font-weight-bold text-danger">*</sup></label>
                            <input type="email" name="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label> Phone: <sup class="font-weight-bold text-danger">*</sup></label>
                            <input type="text" name="phone" placeholder="Enter Phone Number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left mt-1">
                            <input type="submit" name="btn" class="btn btn-success rounded mt-4 btn-block" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
