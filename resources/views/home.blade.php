@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="links">
                <ul>
                    <li>
                        <a href="{{ url('/product') }}">Products</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
