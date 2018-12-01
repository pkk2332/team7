@extends ('layouts.master')


@section ('content')

@include('layouts.navbar.navbar')

<div class="container-fluid">
    <div class="row">
        <div class="col p-0">
            <div class="parallax-window d-flex align-items-center justify-content-center pt-5" data-parallax="scroll" data-image-src="{{ asset('images/parallax/test.jpg') }}">
                <div class=text-white">
                    <h1 class="text-white font-weight-light">Henlo, Welcome to Symphony</h1>
                </div>
            </div>
            <div class="bg-dark window pt-5">
                <div class="pt-4">
                    Henlo
                </div>
            </div>

            <div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/parallax/test.jpg') }}">
            </div>

            <div class="bg-dark window p-0">
                <h1>This is the home screen</h1>
            </div>

            <div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/parallax/test2.jpg') }}">
            </div>
            <div>
            </div>
            <div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/parallax/test3.jpg') }}">
            </div>

        </div>
    </div>
</div>


@stop