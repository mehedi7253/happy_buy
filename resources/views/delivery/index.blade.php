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
                         ADMIN Profile
                    @elseif (Auth::user()->role_id == '2')
                        USER Profile
                    @elseif (Auth::user()->role_id == '3')
                        Delivery boy Profile
                    @endif
                </div>
                <div class="card-body">
                    <div class="col-md-5 col-sm-12 float-left">
                        <img src="{{ asset('user/images/'.Auth::user()->image) }}" style="height: 295px; width: 100%">
                    </div>
                    <div class="col-md-7 col-sm-12 float-left">
                        <table class="table-bordered table">
                            <tr>
                                <th> Name</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ Auth::user()->phone }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    {{ Auth::user()->address }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endsection
