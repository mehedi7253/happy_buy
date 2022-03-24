@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} </h3>
                </div>
                <div class="card-body">
					@if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    <form action="{{ route('user.profile.update', $user_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label> Name</label>
                            <input type="text" name="name" value="{{ $user_data->name }}" class="form-control">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                 <label style="color: red">{{ $message }}</label>
                             </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Email</label>
                            <input type="email" disabled title="Can't Update Your Email" value="{{ $user_data->email }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Phone Number</label>
                            <input type="number" name="phone" value="{{ $user_data->phone }}" class="form-control">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                 <label style="color: red">{{ $message }}</label>
                             </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Profile Picture</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  autocomplete="image" autofocus>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                 <label style="color: red">{{ $message }}</label>
                             </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label>Address</label>
                            <textarea class="form-control" name="address">{{ $user_data->address }}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                 <label style="color: red">{{ $message }}</label>
                             </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <img src="{{ asset('user/images/'.$user_data->image) }}" style="height: 120px; width: 120px"><br/>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 float-left">
                            <label></label>
                            <input type="submit" name="btn" value="Update Now" class="btn btn-success rounded">
                        </div>
                    </form>

                </div>
            </div>
        </div>

    @endsection
