<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@yield('title')
	<link rel="shortcut icon" href="{{{ asset('images/logo.png') }}}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fontawsome.css') }}">
	<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
	<link rel="stylesheet" href="{{ asset('css/animate.min.css') }} ">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-dropdownhover.css') }} ">
	<link rel="stylesheet" href="{{ asset ('css/product/product.css') }}">
	<link rel="stylesheet" href="{{ asset ('css/customer/ekko-lightbox.css') }}">



</head>
<body class="bg-dark">
	
	@yield('content')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
	<script src="{{ asset('js/bootstrap-dropdownhover.js') }}"></script>
	<script src=" {{ asset('js/jquery-3.3.1.slim.min.js') }} "></script>
	<script src="{{ asset('js/navbar.js') }}"></script>
	<script src=" {{ asset('js/bootstrap.min.js')}} "></script>
	<script src=" {{ asset('js/popper.min.js') }} "></script>
	<script src=" {{ asset('js/fontawsome.js') }} "></script>
	<script src=" {{ asset('js/lightbox/ekko-lightbox.js') }} "></script>
	<script src=" {{ asset('js/lightbox/ekko-lightbox.min.js') }} "></script>
	<script src=" {{ asset('js/lightbox/ekko-lightbox.js.map') }} "></script>
	<script src=" {{ asset('js/lightbox/ekko-lightbox.min.js.map') }} "></script>



</body>
</html>