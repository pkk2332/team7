@extends('layouts.customermaster')

@section('title')
<title>Symphony Shopping</title>
@endsection

@section('bdhead')
<body class="bg-dark">
	@endsection

	@section('content')
	@include('customer.navbar',['category'=>$category1])


	<div class="container-fluid py-5">
		@include('session')
		

		@foreach($category as $c)

		<div class="row">
			<div class="col-md-12">
				
				<a href="{{route('all',['id'=>$c->id])}}" ><h2 class="pl-3 text-white">{{ $c->name }}</h2></a>
			</div>
		</div>


		<div class="row">
			
			@foreach($product as $q)
			@foreach($q as $p)
			@if($p->category_id == $c->id)
			<div class="col-lg-3 col-md-4 col-sm-6 col-12 p-4">
				<a href="{{route('product.show',['id'=>$p->id])}}">
					<div class="card productcard pt-1">
						<div class="window">
							<img class=" productimage rounded mx-auto d-block" src="{{$p->media[0]->getUrl()}}">
						</div>

						<div class="card-body pb-2">
							<h5 class="card-title text-center">{{ $p->name}}</h5>
							<p class="text-center">Price : {{$p->price}} Ks</p>
							{{-- <div class="p-2">
								<a href="{{route('product.vote',['id'=>$p->id])}}" class="btn btn-success">Vote</a>
							</div> --}}
							
							<div class="text-center p-2">
								<form action=" {{route('cart.store')}} " method="POST">
									@csrf
									<input type="hidden" name="id" value=" {{$p->id}} ">
									<input type="hidden" name="name" value=" {{$p->name}} ">
									<input type="hidden" name="price" value=" {{$p->price}} ">
									<button type="submit" class="button button-plain btn btn-primary btn-block text-center"><i class="fa fa-shopping-cart"></i></button>
								</form>

								{{-- <a href="{{route('product.show',['id'=>$p->id])}} " class="btn btn-primary btn-block text-center">Add to cart</a> --}}
							</div>

						</div>
					</div>
				</a>
			</div>
			@endif
			@endforeach
			@endforeach

			

		</div>

		<a href="{{route('all',['id'=>$c->id])}}"><h6 class="px-3"><u>See more</u> </h6></a>

		<hr class="bg-secondary">



		@endforeach

		

	</div>



	{{ $category->links() }}
	@endsection

