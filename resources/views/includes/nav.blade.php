<div class="header-menu">

    <div class="col-sm-7">
        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        <div class="header-left">
            
            @if (Auth::user()->role_id == '3')
            <div class="dropdown for-notification">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="count bg-danger">
                        @php
                            $id = Auth::user()->id;
                            $notification = DB::select(DB::raw("SELECT COUNT(delivery_boy_id) as Notify from orders WHERE delivery_boy_id = '$id'"));
                        @endphp
                        @foreach ($notification as $notifications)
                            {{ $notifications->Notify }}
                        @endforeach
                    </span>
                </button>
                <div class="dropdown-menu" aria-labelledby="notification">
                    <p class="red">You have
                        @foreach ($notification as $notifications)
                            {{ $notifications->Notify }}
                        @endforeach Notification</p>
                </div>
            </div>
            @endif



        </div>
    </div>

    <div class="col-sm-5">
        <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src="{{ asset('user/images/'.Auth::user()->image) }}">
            </a>

            <div class="user-menu dropdown-menu">
                <a class="nav-link" href="{{ route('delivery.index') }}"><i class="fa fa-user"></i> My Profile</a>
                <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>


    </div>
</div>
