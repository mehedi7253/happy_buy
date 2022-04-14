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
                <a href="{{ route('cart.index') }}" class="btn btn-sm  btn-danger"><i class="fa fa-shopping-basket"></i>
                <sup>
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
                </sup> {{ number_format($subtoal,2) }} T.K </a>
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
