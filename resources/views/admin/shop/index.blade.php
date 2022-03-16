@extends('includes.app')
    @section('content')
        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('shop.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add Shop</a></h3>
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
                                <th>Location</th>
                                <th>Phone</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Map</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shops as $i=>$shop)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $shop->shop_name }}</td>
                                    <td>{{ $shop->location }}</td>
                                    <td>{{ $shop->phone_number }}</td>
                                    <td>{{ $shop->shop_info }}</td>
                                    <td>
                                        @if($shop->status == '0')
                                            <span class="label text-success">Available</span>
                                        @else
                                            <span class="label text-danger">Un-Available</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('shop.destroy',$shop->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('shop.edit',$shop->id) }}"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-primary" href="{{ route('shop.show',$shop->id) }}"><i class="fa fa-eye"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        @if ($shop->google_map == NULL)
                                            <a class="btn btn-primary" href="{{ route('google-map.edit',$shop->id) }}"><i class="fa fa-plus"></i></a>
                                        @else
                                            <a class="btn btn-primary" href="{{ route('shop.show',$shop->id) }}"><i class="fa fa-eye"></i></a>
                                        @endif
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
