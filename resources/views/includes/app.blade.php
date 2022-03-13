
@include('includes.header')

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        @include('includes.side')
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            @include('includes.nav')
        </header><!-- /header -->
        <!-- Header-->

        <div class="main-content">
            @yield('content')
        </div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

  @include('includes.script')

  @yield('script')
</body>

</html>



