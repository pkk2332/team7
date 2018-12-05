@extends ('layouts.master')


@section ('content')

@include('layouts.navbar.navbar')

<div class="container-fluid">
    <div class="row">
        <div class="col p-0">
            <div class="parallax-window d-flex align-items-center justify-content-center pt-5" data-parallax="scroll" data-image-src="{{ asset('images/main/symphony.jpg') }}">
                <div class=text-white">
                    <h1 class="text-white font-weight-light">Henlo, Welcome to Symphony</h1>
                </div>
            </div>
            <div class="bg-dark window pt-5">
                <div class="">
                    <h5 class="text-white font-weight-light p-5" style="line-height: 1.8;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium a accusamus eos omnis repellat tenetur molestiae, explicabo veritatis quam consectetur. Harum porro quis aut laborum odit, mollitia fuga ex qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium a accusamus eos omnis repellat tenetur molestiae, explicabo veritatis quam consectetur. Harum porro quis aut laborum odit, mollitia fuga ex qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium a accusamus eos omnis repellat tenetur molestiae, explicabo veritatis quam consectetur. Harum porro quis aut laborum odit, mollitia fuga ex qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium a accusamus eos omnis repellat tenetur molestiae, explicabo veritatis quam consectetur. Harum porro quis aut laborum odit, mollitia fuga ex qui.</h5>
                </div>
            </div>

            <div class="parallax-window d-flex align-items-center justify-content-end" data-parallax="scroll" data-image-src="{{ asset('images/main/online.jpg') }}">
                <div></div>
                <div class="p-5">
                    <div class="bg-dark p-5">
                        <h1 class="text-white text-right">No.1 Shopping site in Myanmar</h1>
                        <br>
                        <p class="text-white text-left">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            <br>
                            Ipsam, quis temporibus repudiandae incidunt voluptatibus 
                            <br>
                            blanditiis, vitae ea. Rem aliquid molestias deserunt quo 
                            <br>
                            perspiciatis, repudiandae repellat perferendis temporibus, 
                            <br>
                            architecto debitis vero.
                        </p>

                    </div>
                </div>
            </div>

            <div class="bg-dark window pt-5">
                <div class="">
                    <h5 class="text-white font-weight-light p-5" style="line-height: 1.8;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium a accusamus eos omnis repellat tenetur molestiae, explicabo veritatis quam consectetur. Harum porro quis aut laborum odit, mollitia fuga ex qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium a accusamus eos omnis repellat tenetur molestiae, explicabo veritatis quam consectetur. Harum porro quis aut laborum odit, mollitia fuga ex qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium a accusamus eos omnis repellat tenetur molestiae, explicabo veritatis quam consectetur. Harum porro quis aut laborum odit, mollitia fuga ex qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium a accusamus eos omnis repellat tenetur molestiae, explicabo veritatis quam consectetur. Harum porro quis aut laborum odit, mollitia fuga ex qui.</h5>
                </div>
            </div>

            <div class="parallax-window d-flex align-items-center justify-content-start" data-parallax="scroll" data-image-src="{{ asset('images/main/brands.jpg') }}">
                <div class="p-5">
                    <div class="bg-dark p-5">
                        <h1 class="text-white text-left">More than 100 Brands</h1>
                        <br>
                        <p class="text-white text-left">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            <br>
                            Ipsam, quis temporibus repudiandae incidunt voluptatibus 
                            <br>
                            blanditiis, vitae ea. Rem aliquid molestias deserunt quo 
                            <br>
                            perspiciatis, repudiandae repellat perferendis temporibus, 
                            <br>
                            architecto debitis vero.
                        </p>

                    </div>
                </div>
            </div>

            <div class="bg-dark p-5 d-flex align-items-center justify-content-center">
                <div>
                    <h5 class="text-white font-weight-light">2018 Copyright &copy; Symphony</h5>
                </div>
            </div>

        </div>
    </div>
</div>


@stop