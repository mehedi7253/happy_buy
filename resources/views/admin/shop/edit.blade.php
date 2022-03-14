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
                    <h3>{{ $page_name }} <a href="{{ route('category.index') }}" class="btn btn-success float-right"><i class="fa fa-edit"></i> Manage Category</a></h3>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>

    @endsection
