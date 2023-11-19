  <!-- Header -->
  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="{{url('redirect')}}"><h2>{{__('message.E')}}<em>{{__('message.COMMERCE')}}</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item active">
              <a class="nav-link" href="{{url('redirect')}}">{{__('message.HOME')}}
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="change/en">English</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="change/ar">العربيه</a>
            </li>
            <li class="nav-item">
                @auth()

        <form action="{{url('logout')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

        @endauth
              {{-- <a class="nav-link" href="{{route("logout")}}">LogOut</a> --}}
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
