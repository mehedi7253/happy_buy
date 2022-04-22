@extends('pages.includes.app')
@section('content')

    <section class="shop">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-5 mt-5">
                    <h3 class="text-center text-uppercase font-weight-bold mb-3">Shops</h3>
                    @foreach ($shop as $shops)
                        <div class="col-md-4 col-sm-12 float-left">
                            <div class="card"  style="border: 2px solid red;">
                                <div class="card-header" style="background-color: red">
                                    <h4 class="text-center text-white">{{ $shops->shop_name }}</h4>
                                </div>
                                <div class="card-body">
                                    @if ($shops->google_map == '')
                                     <div style="height: 300px; width: 200px">
                                        <label class="text-danger text-center">No Map Added Yet</label>
                                     </div>
                                     @else
                                     <div style="height: 300px; width: 200px">
                                        <?php echo $shops->google_map ?>
                                     </div>

                                    @endif

                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('single.shop',['name'=>$shops->url]) }}" class="btn btn-success rounded float-right">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
