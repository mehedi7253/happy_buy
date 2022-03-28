@extends('pages.includes.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 float-left mt-5 mb-5" style="border: 1px solid red">
                <img src="{{ asset('product/'.$product->banner) }}" id="mainImage" class="main-Image">

                @foreach(json_decode($product->name) as $i=>$picture)
                    <div class="col-md-4 col-sm-12 float-left">
                        <img src="{{ asset('/product/'.$picture) }}" id="img{{ ++$i }}" class="sub-image" style="height: 150px; width: 100%; padding: 5px">
                    </div>
                @endforeach
            </div>

            <div class="col-md-6 col-sm-12 float-left mt-5 mb-5" style="border: 1px solid red">

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
