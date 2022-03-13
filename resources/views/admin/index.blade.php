@extends('includes.app')
    @section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    @if (Auth::user()->role_id == '1')
                         ADMIN
                    @elseif (Auth::user()->role_id == '1')
                        USER
                    @elseif (Auth::user()->role_id == '1')
                        Delivery boy
                    @endif
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>

    @endsection
