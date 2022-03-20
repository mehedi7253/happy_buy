@extends('includes.app')
    @section('content')

        <div class="content mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }} <a href="{{ route('category.index') }}" class="btn btn-success float-right"><i class="fa fa-edit"></i> Manage Category</a></h3>
                </div>
                <div class="card-body">
					@if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <form action="" method="POST">
                        @csrf
                        <div class="col-md-6 col-sm-12 float-left">
                            <label>Select Shop</label>
                            <select class="form-control" name="shop_id">
                                <option>------Select Shop-------</option>
                                @foreach ($shops as $shop)
                                    <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 float-left">
                            <label>Select Category</label>
                            <select class="form-control" id="category" name="category_id">
                                <option>------Select Category-------</option>
                                <option value="" selected disabled>Select Category</option>
                                @foreach ($categories as $key =>$categorie)
                                    <option value="{{ $key }}">{{ $categorie->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 float-left">
                            <label>Select Product</label>
                            <select name="state" id="state" class="form-control"></select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection

    @section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        // when category dropdown changes
        $('#category').change(function() {

            var categoryID = $(this).val();

            if (categoryID) {

                $.ajax({
                    type: "GET",
                    url: "{{ url('getProduct') }}?category_id=" + categoryID,
                    success: function(res) {

                        if (res) {

                            $("#state").empty();
                            $("#state").append('<option>Select State</option>');
                            $.each(res, function(key, value) {
                                $("#state").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {

                            $("#state").empty();
                        }
                    }
                });
            } else {

                $("#state").empty();

            }
        });
    </script>
    @endsection
