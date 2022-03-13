<nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="./"><img src="{{ asset('template/images/logo.png') }}" alt="Logo"></a>
        <a class="navbar-brand hidden" href="./"><img src="{{ asset('template/images/logo2.png') }}" alt="Logo"></a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">

        <ul class="nav navbar-nav">
            @if (Auth::user()->role_id == '1')
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Categories</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('category.create') }}">Add Ctegory</a></li>
                        <li><i class="fa fa-edit"></i><a href="{{ route('category.index') }}">Manage Ctegory</a></li>
                    </ul>
                </li>


            @elseif (Auth::user()->role_id == '2')

            @elseif (Auth::user()->role_id == '3')

            @endif

        </ul>

    </div><!-- /.navbar-collapse -->
</nav>
