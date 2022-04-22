@extends('pages.includes.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12 mt-5">
                <div class="card-body">
                    <div class="col-md-5 col-sm-12 float-left mt-5 mb-5">
                        <img src="{{ asset('product/'.$product->banner) }}" id="mainImage" class="main-Image">

                        @foreach(json_decode($product->name) as $i=>$picture)
                            <div class="col-md-4 col-sm-12 float-left">
                                <img src="{{ asset('/product/'.$picture) }}" id="img{{ ++$i }}" class="sub-image" style="height: 150px; width: 100%; padding: 5px; cursor: pointer;">
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-7 col-sm-12 float-left mt-5 mb-5">
                        <div class=" ml-5">
                            <h3 class="ml-2 text-capitalize">Product Name: <span class="font-weight-bold text-danger">{{ $product->product_name }}</span></h3>
                            <p class="ml-2 text-capitalize font-weight-bold">Category: <span class="font-weight-bold text-danger"> {{ $product->Categories->category_name }}</span></p>
                            @if ($product->special_price == '')
                                <p class="ml-2 text-capitalize font-weight-bold">Product Price:<span class="font-weight-bold text-danger" > {{ number_format($product->product_price,2) }}</span></p>
                            @else
                                <p class="ml-2 text-capitalize font-weight-bold">Product Price:<del class="font-weight-bold text-danger" > {{ number_format($product->product_price,2) }}</del></p>
                                <p class="ml-2 text-capitalize font-weight-bold">Offer Price:<span class="font-weight-bold text-danger"> {{ number_format($product->special_price,2) }}</span></p>
                            @endif

                            @foreach ($rating as $ratings)
                                <p class="ml-2 text-capitalize font-weight-bold">Aravrage Rating: <span class="font-weight-bold text-danger"> {{ $ratings->AvarageRating }} Based On {{ $ratings->User }} User</span>  </p>
                            @endforeach

                            @foreach ($totalSell as $sell)
                                <p class="ml-2 text-capitalize font-weight-bold">Total Sell: <span class="font-weight-bold text-danger">  {{ $sell->TotalSell }} </span></p>
                             @endforeach

                            <form action="{{ route('product.add.cart',$product->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group ml-2">
                                    <input type="submit" class="btn btn-success col-5" value="Add To Cart">
                                </div>
                            </form>
                             <p class="ml-2">
                                <?php echo $product->description?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-12 mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Rate Now</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ratings.update',$product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                             <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input value="{{ $product->id }}" name="product_id" hidden>
                                <input type="submit" name="btn" class="btn btn-success" value="Rate Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var img1Element  = document.getElementById('img1');
            img1Element.onclick = function () {
                var imgUrl = img1Element.getAttribute('src');
                var mainImage = document.getElementById('mainImage');
                mainImage.setAttribute('src', imgUrl);
            };

        var img2Element  = document.getElementById('img2');
            img2Element.onclick = function () {
                var imgUrl = img2Element.getAttribute('src');
                var mainImage = document.getElementById('mainImage');
                mainImage.setAttribute('src', imgUrl);
            };

        var img3Element  = document.getElementById('img3');
            img3Element.onclick = function () {
                var imgUrl = img3Element.getAttribute('src');
                var mainImage = document.getElementById('mainImage');
                mainImage.setAttribute('src', imgUrl);
            };

        var img4Element  = document.getElementById('img4');
            img4Element.onclick = function () {
                var imgUrl = img4Element.getAttribute('src');
                var mainImage = document.getElementById('mainImage');
                mainImage.setAttribute('src', imgUrl);
            };

    </script>
@endsection
