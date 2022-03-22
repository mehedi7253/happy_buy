<div class="container">
    <a class="navbar-brand" href="{{ url('/') }}"><span style="color: yellow; font-weight: bold">Happy</span><span style="color: red;font-weight: bold">Buy</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
          <a class="nav-link" href="#">Shop</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
      </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item p-2">
                <a href="" class="btn btn-sm  btn-danger"><i class="fa fa-shopping-basket"></i><sup>1</sup> 1000.00 T.K</a>
            </li>
            <li class="nav-item p-2">
                <a href="{{ route('register') }}" class="btn btn-sm  btn-success" type="button"><i class="fa fa-arrow-right"></i> Sign Up</a>
            </li>
            <li class="nav-item p-2">
                <a href="{{ route('login') }}" class="btn btn-sm  btn-success" type="button"><i class="fa fa-arrow-right"></i> Sign In</a>
            </li>
        </ul>

    </div>
</div>
