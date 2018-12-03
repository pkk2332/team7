<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
@yield("title")
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  
  <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/datatables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}"> 
  <link rel="stylesheet" href=" {{ asset('css/select2.min.css') }} ">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/fontawsome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />


   
</head>

<body>

@yield("content")
  <!-- plugins:js -->

  <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
        <script src=" {{ asset('js/bootstrap.min.js')}} "></script>
    

{{--   <script src=" {{ asset('js/jquery-3.3.1.slim.min.js') }} "></script> --}}
  <script src=" {{ asset('js/popper.min.js') }} "></script>
  <script src="{{ asset('js/jquery.datatables.min.js') }}"></script>
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{ asset('js/plugins.js') }}"></script>

  <script src="{{ asset('js/all.js') }}"></script>

  <script src="{{ asset('js/select2.full.min.js') }} "></script>
  <!-- endinject -->
  
{{--     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script> --}}
@yield("script")
@stack('scripts')

</body>

</html>