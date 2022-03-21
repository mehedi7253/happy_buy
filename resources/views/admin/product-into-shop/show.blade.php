
@extends('includes.app')
@section('content')

    <div class="content mt-3 mb-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-capitalize">{{ $shop->shop_name }} {{ $page_name }} </h3>
            </div>
            <div class="card-body">
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product </th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($productShop as $i=>$products)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $products->product_name }}</td>
                                <td>{{ $products->category_name }}</td>
                                <td>
                                    <form action="{{ route('product.shop.delete', $products->ProductID) }}" method="POST">
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

@endsection
