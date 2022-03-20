@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('product.index') }}" class="btn btn-success float-right"><i class="fa fa-edit"></i> Manage Product</a></h3>
                </div>
                <div class="card-body">
					@if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="col-md-6 col-sm-12 float-left">
                        @foreach(json_decode($product->name) as $picture)
                            <div class="col-md-4 col-sm-12 float-left">
                                <img src="{{ asset('/product/'.$picture) }}" style="height: 150px; width: 100%; padding: 5px">
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-6 col-sm-12 float-left">
                        <table class="table table-bordered">
                            <tr>
                              <th>Product Name: </th>
                              <td>{{ $product->product_name }}</td>
                            </tr>
                            <tr>
                                <th>Product Category: </th>
                                <td>{{ $product->Categories->category_name }}</td>
                              </tr>
                            <tr>
                                <th>Product Price: </th>
                                <td> {{ number_format($product->product_price,2) }}</td>
                            </tr>
                            <tr>
                                <th>Status: </th>
                                <td>
                                    @if ($product->status == '0')
                                    <button class="btn btn-success">Available</button>
                                    @else
                                    <button class="btn btn-danger">Un Available</button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Description: </th>
                                <td><?php echo $product->description ?></td>
                            </tr>

                        </table>
                    </div>

                </div>
            </div>
        </div>

    @endsection
