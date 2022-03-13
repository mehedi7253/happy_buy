@extends('includes.app')
    @section('content')
        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('category.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Category</a></h3>
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
                                    <th>Category Name</th>
                                    <th>URL</th>
                                    <th>Status</th>
                                    <th>Banner</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $i=>$category)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->url }}</td>
                                        <td>
                                            @if($category->status == '0')
                                                <span class="label text-success">Available</span>
                                            @else
                                                <span class="label text-danger">Un-Available</span>
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset('category/images/'.$category->cat_banner) }}" class="img-thumbnail" style="height: 50px; width: 50px">
                                        </td>
                                        <td>
                                            <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('category.edit',$category->id) }}"><i class="fa fa-edit"></i></a>
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
