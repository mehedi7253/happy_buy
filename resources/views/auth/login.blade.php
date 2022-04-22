@extends('pages.includes.app')
    @section('content')
    <div class="col-md-7 mx-auto mb-5" style="margin-top: 7%">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">User Login</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Enter Password" autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success col-6">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="form-group">
                        <p class="">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link float-right" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </p>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ url('register') }}" class="text-decoration-none float-right">New User? Registraion Here</a>
            </div>
        </div>
    </div>
    @endsection
