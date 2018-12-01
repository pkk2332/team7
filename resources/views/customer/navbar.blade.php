<nav class="navbar navbar-fixed fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a href="{{ url ('/product') }}"><img src="{{ asset('images/logo.png') }}" width="50" height="50" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  

  <div class="collapse navbar-collapse justify-content-end px-5" id="navbarNavDropdown">
    <ul class="navbar-nav">

      <li class="nav-item dropdown px-5">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        
        <ul class="dropdown-menu p-2" aria-labelledby="navbarDropdownMenuLink">
          @foreach($category1 as $c)
          <li><a class="dropdown-item" href="{{route('all',['id'=>$c->id])}}">{{$c->name}}</a></li>
          @endforeach
        </ul>
        
      </li>

      
      <li class="nav-item">
        <a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i></a>
      </li>
      <li class="nav-item dropdown px-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-tie"></i> 
          {{-- {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} --}}
          &nbsp;
          {{ Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
        </div>
        
      </li>
      <li>
        <form action="{{route('search')}}" method="get">
          <div class="input-group mb-3">
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



<div class="pt-5"></div>