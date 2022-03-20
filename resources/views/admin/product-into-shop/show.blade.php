
@extends('includes.app')
@section('content')

    <div class="content mt-3 mb-5">
        <div class="card">
            <div class="card-header">
                <h3>{{ $page_name }} <a href="{{ route('category.index') }}" class="btn btn-success float-right"><i class="fa fa-edit"></i> Manage Category</a></h3>
            </div>
            <div class="card-body">
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
