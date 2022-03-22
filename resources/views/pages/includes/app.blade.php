@include('pages.includes.header')
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       @include('pages.includes.nav')
    </nav>

    {{-- <div class="container">
        <div class="row"> --}}
            @yield('content')
        {{-- </div>
    </div> --}}

    <section class="footer" style="background-color: black">
        @include('pages.includes.footer')
    </section>

   @include('pages.includes.script')
   @yield('script')

</body>
</html>
