@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('shop-category.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Category In Shop</a></h3>
                </div>
                <div class="card-body">
					@if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Shop Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shopProducts as $i=>$shopProduct)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $shopProduct->shop_name }}</td>
                                        <td>
                                            <a href="{{ route('shop-category.show', $shopProduct->shop_id) }}" class="btn btn-success rounded">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endsection
