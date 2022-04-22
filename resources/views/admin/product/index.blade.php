@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('product.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Prodcut</a></h3>
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
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $i=>$product)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->Categories->category_name }}</td>
                                        <td>
                                            @if ($product->type == 'Regular')
                                                {{ number_format($product->product_price,2) }}
                                            @else
                                                {{ number_format($product->special_price,2) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->status == '0')
                                                 <span class="label text-success">Available</span>
                                            @else
                                                <span class="label text-danger">Un-Available</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('product.show',$product->id) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('product.edit',$product->id) }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-primary" href="{{ route('product.show',$product->id) }}"><i class="fa fa-eye"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');"><i class="fa fa-trash"></i></button>
                                            </form>
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
