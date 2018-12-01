@extends ('layouts.master')


@section ('content')
@include('layouts.navbar.navbar')
@include('session')


<div id='app'class="row">

	<hh></hh>



</div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
  

@endpush
