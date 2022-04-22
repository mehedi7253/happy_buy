<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Happy buy</title>
    <link rel="stylesheet" href="{{ asset('template/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/style/main.css') }}">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><span style="color: yellow; font-weight: bold">Happy</span><span style="color: red;font-weight: bold">Buy</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('allshop.shop') }}">Shop</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('offer.product') }}">Offer</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('contact-us.index') }}">Contact Us</a>
                    </li>
              </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item p-2">
                        <a href="{{ route('cart.index') }}" class="btn btn-sm  btn-danger"><i class="fa fa-shopping-basket"></i> <sup>
                            @php
                                if(Auth::check())
                                {
                                    $cart_count = DB::table('carts')
                                        ->where('user_id','=',Auth::user()->id)
                                        ->count();

                                    $subtoal = DB::table('carts')
                                    ->where('user_id','=',Auth::user()->id)
                                    ->SUM('sell_price');


                                }else{
                                    $cart_count = 0;
                                    $subtoal    = 0.00;
                                }
                            @endphp
                            {{ $cart_count }}
                        </sup> {{ number_format($subtoal,2) }} T.K</a>
                    </li>
                    @if (Route::has('login'))

                    @auth
                    <li class="nav-item p-2">
                        @if (Auth::user()->role_id == '1')
                            <a href="{{ route('admin.index') }}" class="btn btn-sm  btn-success" type="button"><i class="fa fa-user-circle"></i> {{ Auth::user()->name }}</a>
                        @elseif (Auth::user()->role_id == '2')
                             <a href="{{ route('user.index') }}" class="btn btn-sm  btn-success" type="button"><i class="fa fa-user-circle"></i> {{ Auth::user()->name }}</a>
                        @elseif (Auth::user()->role_id == '3')
                             <a href="{{ route('delivery.index') }}" class="btn btn-sm  btn-success" type="button"><i class="fa fa-user-circle"></i> {{ Auth::user()->name }}</a>
                        @endif
                    </li>
                    <li class="nav-item p-2">
                        <a class="btn btn-sm  btn-danger" href="{{ route('logout') }}"
                         onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @else
                        <li class="nav-item p-2">
                            <a href="{{ route('register') }}" class="btn btn-sm  btn-success" type="button"><i class="fa fa-arrow-right"></i> Sign Up</a>
                        </li>
                        <li class="nav-item p-2">
                            <a href="{{ route('login') }}" class="btn btn-sm  btn-success" type="button"><i class="fa fa-arrow-right"></i> Sign In</a>
                        </li>
                    @endauth

                    @endif

                </ul>

            </div>
        </div>

      </nav>

      <section class="banner">
          <section class="slide_section">

          </section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <h2 class="text-white font-weight-bold font-italic d-none d-lg-block" style="font-size: 70px; text-shadow: 5px 5px 3px #000; margin-top: -34%; margin-left: 13%;"><span style="color:yellow;">Happy</span> <br>
                        <span style="margin-left: 160px; color: red;">Buy</span>
                    </h2>
                </div>
            </div>
        </div>
      </section>

    <section class="shop">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-5 mt-5">
                    <h3 class="text-center text-uppercase font-weight-bold mb-3">Offer Products</h3>
                </div>
                @php
                    $offers = DB::table('products')->where('type', 'Offer')->limit('4')->get();
                @endphp
                @foreach ($offers as $products)
                    <div class="col-md-3 col-sm-12 float-left mt-3 mb-5">
                        <div class="card" style="border: 1px solid black;" id="myTable">
                            <span>
                                <img src="{{ asset('product/'.$products->banner ) }}" class="card-img-top" style="height: 200px; width: 100%;">
                                <div class="card-body">
                                    <p class="text-center font-weight-bold">{{ $products->product_name }}</p>
                                    <p class="text-center font-weight-bold">{{ number_format($products->special_price,2) }}</p>
                                </div>
                                <div class="card-footer">
                                    <form action="{{ route('product.add.cart',$products->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-outline-primary btn-block"><i class="fa fa-shopping-basket"></i> Add To Cart</button>
                                    </form>
                                    <br/>
                                    <a href="{{ route('product.details',$products->id) }}" class="btn  btn-dark btn-block"> View Details</a>
                                </div>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4 mx-auto mb-5 mt-2">
                <a href="{{ route('offer.product') }}" class="btn btn-info rounded">View More</a>
            </div>
        </div>
    </section>


    <section class="shop" style="background-color: whitesmoke">
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
             <div class="col-md-4 mx-auto mb-2 mt-2">
                <a href="{{ route('allshop.shop') }}" class="btn btn-info rounded">View More</a>
            </div>
        </div>
    </section>

    <section class="footer" style="background-color: black">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p class="text-center text-white pt-2">This Site is <i class="fa fa-copyright"></i> by HappyBuy</p>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('template/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('template/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
