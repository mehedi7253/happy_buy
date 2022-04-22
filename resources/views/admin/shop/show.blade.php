@extends('includes.app')
    @section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ $shop->shop_name }} Details</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $shop->shop_name }} <a href="{{ route('shop.index') }}" class="btn btn-success float-right"><i class="fa fa-edit"></i> Manage Shops</a></h3>
                </div>
                <div class="card-body">
                    <div class="col-md-6 col-sm-12 float-left">
                        @foreach(json_decode($shop->name) as $picture)
                            <div class="col-md-4 col-sm-12 float-left">
                                <img src="{{ asset('/shop/'.$picture) }}" style="height: 150px; width: 100%; padding: 5px">
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-6 col-sm-12 float-left">
                        <table class="table table-bordered">
                            <tr>
                              <th>Shop Name: </th>
                              <td>{{ $shop->shop_name }}</td>
                            </tr>
                            <tr>
                                <th>Shop Location: </th>
                                <td>{{ $shop->location }}</td>
                              </tr>
                              <tr>
                                <th>Shop Phone: </th>
                                <td>{{ $shop->phone_number }}</td>
                              </tr>
                              <tr>
                                <th>Shop Description: </th>
                                <td>{{ $shop->shop_info }}</td>
                              </tr>
                        </table>
                    </div>

                    <h3 class="ml-5">Google Map</h3>
                    <div class="col-md-10 mx-auto ml-5">
                        <?php echo $shop->google_map ?>
                    </div>
                </div>
            </div>
        </div>

    @endsection
