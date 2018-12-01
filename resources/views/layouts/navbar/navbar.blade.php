<nav class="navbar bg-dark navbar-dark justify-content-between  py-3">
  <a class="navbar-brand text-white" href="{{ url ('/') }}"><h3>Symphony</h3></a>
  <div class="">
    @if (Route::has('login'))
    <div class="top-right links">
      <ul class="nav justify-content-end">
        @auth
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url ('/product') }}"><h5>Store</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route ('logout') }}"><h5>Logout</h5></a>
        </li>

        @else
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route ('login') }}"><h5>Login</h5></a>
        </li>

        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route ('register') }}"><h5>Register</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url ('/product') }}"><h5>Store</h5></a>
        </li>
        @endif
        @endauth
      </div>
      @endif
    </ul>
  </div>
</nav>


