<nav class="navbar navbar-fixed navbar-expand-lg navbar-dark">
  {{-- <a href="{{ url ('/product') }}"><img src="{{ asset('images/logo.png') }}" width="50" height="50" alt=""></a> --}}
  <a href="{{ url ('/') }}" class="navbar-brand"><h3 class="text-white">Symphony</h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>



  <div class="collapse navbar-collapse justify-content-end px-5" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link px-5" href="{{ url ('/product') }}">Products</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @foreach($category1 as $c)
          <a class="dropdown-item" href="{{route('all',['id'=>$c->id])}}">{{$c->name}}</a>
          @endforeach
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link px-5" href="/cart"><i class="fas fa-shopping-cart"></i></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-tie"></i> 
          {{-- {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} --}}
          &nbsp;
          {{ Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
        </div>

      </li>
      <li class="pl-2">
        <form action="{{route('search')}}" method="get">
          <div class="input-group">
            <input type="text" name="search" class="form-control typeahead" placeholder="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="Submit">Search</button>
            </div>
          </div>
        </form>
      </li>
    </ul>

  </div>


</nav>
