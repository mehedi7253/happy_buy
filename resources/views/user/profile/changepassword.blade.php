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
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach

                    <form method="POST" action="{{ route('user.password.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="password">Current Password</label>
                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password" placeholder="Current Password">
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" placeholder="New Password">
                        </div>

                        <div class="form-group">
                            <label for="password">New Confirm Password</label>
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password" placeholder="ENter Password Again">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded"> Update Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    @endsection
