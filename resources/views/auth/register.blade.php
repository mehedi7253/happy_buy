@extends('pages.includes.app')

    @section('content')
    <div class="col-md-8 mx-auto" style="margin-top: 5%">
        <div class="card mb-5">
            <div class="card-header">
                <h3 class="text-center">User Registration</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Name" autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Enter Email Address" autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">{{ __('Phone') }}</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number" autocomplete="phone">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Enter Confirm Password" autocomplete="new-password">

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary col-6 btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ url('login') }}" class="text-decoration-none float-right">Old User? Login Here</a>
            </div>
        </div>
    </div>
    @endsection
