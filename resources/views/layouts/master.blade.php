<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Symphony Shopping</title>
  <link rel="shortcut icon" href="{{{ asset('images/logo.png') }}}">
  <!-- plugins:css -->

  <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawsome.css') }}">


  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/all.css') }}">
  <!-- endinject -->
  <!-- parallax:css -->
  <link rel="stylesheet" href="{{ asset('css/parallax.css') }}">
  <!-- endparallax -->
  <link rel="stylesheet" href="{{ asset('css/customer/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/customer/cart.css') }}">
</head>

<body>

  @yield("content")

  <!-- Jquery -->
  <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
  <!-- end Jquery -->

  <!-- parallax js -->
  <script src="{{ asset('js/parallax.js') }}"></script>
  <script src="{{ asset('js/parallax.min.js') }}"></script>
  <!-- end parallax -->
  <!-- plugins:js -->
  <script src="{{ asset('js/plugins.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('js/all.js') }}"></script>
  <!-- endinject -->
  @yield("script")
  @stack('scripts')

</body>

</html>