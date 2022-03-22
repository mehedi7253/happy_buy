@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('delivery-man.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Delivery Man</a></h3>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($boys as $i=>$boy)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $boy->name }}</td>
                                        <td>{{ $boy->email }}</td>
                                        <td>{{ $boy->phone }}</td>
                                        <td>
                                            <form action="{{ route('delivery-man.destroy', $boy->id) }}" method="POST">
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
