<nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="{{ route('admin.index') }}">{{ Auth::user()->name }}</a>
        <a class="navbar-brand hidden" href="./"><img src="{{ asset('template/images/logo2.png') }}" alt="Logo"></a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">

        <ul class="nav navbar-nav">
            @if (Auth::user()->role_id == '1')
                <li class="active">
                    <a href="{{ route('admin.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                </li>
                    <li class="menu-item-has-children">
                    <a href="{{ url('/') }}"> <i class="menu-icon fa fa-bars"></i>Home </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Categories</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('category.create') }}">Add Ctegory</a></li>
                        <li><i class="fa fa-edit"></i><a href="{{ route('category.index') }}">Manage Ctegory</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Shop</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('shop.create') }}">Add Shop</a></li>
                        <li><i class="fa fa-edit"></i><a href="{{ route('shop.index') }}">Manage Shop</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Product</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('product.create') }}">Add Product</a></li>
                        <li><i class="fa fa-edit"></i><a href="{{ route('product.index') }}">Manage Prodcut</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Add category In Shop</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('shop-category.create') }}">Add category</a></li>
                        <li><i class="fa fa-edit"></i><a href="{{ route('shop-category.index') }}">Manage category</a></li>
                    </ul>
                </li>
                </li>
                    <li class="menu-item-has-children">
                    <a href="{{ route('customer.list') }}"> <i class="menu-icon fa fa-bars"></i>Customers </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Delivary Man</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('delivery-man.create') }}">Add Delivery Boy</a></li>
                        <li><i class="fa fa-edit"></i><a href="{{ route('delivery-man.index') }}">Manage Delivery Boy</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Order List</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('orders.index') }}">Order List</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route('report.index') }}" class="dropdown-toggle"> <i class="menu-icon fa fa-bars"></i>Report</a>
                </li>
                 <li class="menu-item-has-children">
                    <a href="{{ route('contact.index') }}" class="dropdown-toggle"> <i class="menu-icon fa fa-bars"></i>Public Message</a>
                </li>
            @elseif (Auth::user()->role_id == '2')

                <li class="active">
                    <a href="{{ route('user.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                </li>
                    <li class="menu-item-has-children">
                    <a href="{{ url('/') }}"> <i class="menu-icon fa fa-bars"></i>Home </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Profile</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('user.profile-update') }}">Update Profile</a></li>
                        <li><i class="fa fa-edit"></i><a href="{{ route('user.changepass') }}">Change Password</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="{{ route('order-lists.index') }}"> <i class="menu-icon fa fa-bars"></i></i>Order List </a>
                </li>

            @elseif (Auth::user()->role_id == '3')
                <li class="active">
                    <a href="{{ route('delivery.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                    <li class="menu-item-has-children">
                    <a href="{{ url('/') }}"> <i class="menu-icon fa fa-bars"></i>Home </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Profile</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i><a href="{{ route('delivery.profile-update') }}">Update Profile</a></li>
                        <li><i class="fa fa-edit"></i><a href="{{ route('delivery.changepass') }}">Change Password</a></li>
                    </ul>
                </li>
                 <li class="menu-item-has-children">
                    <a href="{{ route('delivery-orders.index') }}"> <i class="menu-icon fa fa-bars"></i>Order List </a>
                </li>
                 <li class="menu-item-has-children">
                    <a href="{{ route('deliver-chat.index') }}"> <i class="menu-icon fa fa-bars"></i>Message List </a>
                </li>
            @endif

        </ul>

    </div><!-- /.navbar-collapse -->
</nav>
