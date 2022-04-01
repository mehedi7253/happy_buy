@extends('includes.app')
    @section('content')
        <div class="col-md-12 col-sm-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }}</h3>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sender Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $i=>$list)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>
                                            <a href="{{ route('deliver-chat.show',$list->user_id) }}" class="btn btn-outline-primary btn-sm rounded">Reply</a>
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
