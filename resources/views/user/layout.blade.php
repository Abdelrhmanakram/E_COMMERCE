@include('user.head')

  <body>

    {{-- <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> --}}
    <!-- ***** Preloader End ***** -->

  @include('user.navbar')

   {{-- @include('user.body') --}}
   {{-- @yield('body') --}}

   @include('user.banner')

   @include('user.latest')


@include('user.footer')
