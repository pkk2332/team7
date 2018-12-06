 @extends('layouts.customermaster')

 @section('title')
 <title> Product detail </title>
 @endsection

 @section('content')

 @include('customer.navbar',['category'=>$category1])
 

 @include('session')
 <div class="container-fluid text-white">
 	<div class="row pt-5">
 		<div class="col-lg-4 col-md-4 col-sm-12 col-12 p-0 ">
 			<div class="row p-0">
 				<div class="col-12 d-flex justify-content-center p-0 pl-4">
 					<div class="detail-window p-0 bg-white d-flex align-items-center">
 						<img src="{{$product->media[0]->getUrl()}}" class="detailimage" alt="Responsive image">
 					</div>
 				</div>
 			</div>
 			
 			
 			
 			{{-- <div class="row py-3 px-5 d-flex justify-content-center text-center">
 				<div class="col-3">
 					asdf
 				</div>
 				<div class="col-3">
 					asfd
 				</div>
 				<div class="col-3">
 					asdf
 				</div>
 				<div class="col-3">
 					asf
 				</div>
 			</div> --}}

 			<div class="row py-3 px-5 d-flex">
 				<div class="col-12">

 					Tags : 

 					@foreach($product->subcategories as $sub)

 					
 					<a href="{{route('sub',['id'=>$sub->id])}}"><kbd class="bg-light text-dark">{{ $sub->name }}</kbd></a>

 					@endforeach
 				</div>
 			</div>

 			<div class="row px-5">
 				<div class="col-12 p-3">
 					<form action=" {{route('cart.store')}} " method="POST">
 						@csrf
 						<input type="hidden" name="id" value=" {{$product->id}} ">
 						<input type="hidden" name="name" value=" {{$product->name}} ">
 						<input type="hidden" name="price" value=" {{$product->price}} ">
 						<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-shopping-cart"></i></button>
 					</form>
 				</div>
 			</div>
 			


 		</div>
 		<div class="col-lg-8 col-md-8 col-sm-12 col-12 p-0 px-5">
 			<div class="pb-1">
 				<h1 class="display-4">{{ ucfirst($product->name) }}</h1>
 				<p>Price : {{ $product->price }} Ks</p>
 			</div>
 			<hr class="bg-secondary">
 			<div class="pt-2">
 				<h4 class="pb-2"><u>Description</u></h4>
 				<p>
 					{{ $product->description }}
 				</p>
 			</div>
 			
 			
 		</div>
 	</div>

 	<hr class="bg-secondary">

 	<h4>Things you might be interested</h4>

 	<div class="row">

 		@foreach($interested as $p)
 		<div class="col-lg-4 col-md-4 col-sm-6 col-12 p-4">
 			<a href="{{route('product.show',['id'=>$p->id])}}">
 				<div class="card productcard pt-1">
 					<div class="window">
 						<img class=" productimage rounded mx-auto d-block" src="{{$p->media[0]->getUrl()}}">
 					</div>

 					<div class="card-body pb-2">
 						<h5 class="card-title text-center">{{ $p->name}}</h5>
 						<p class="text-center">Price : {{$p->price}} Ks</p>


 						<div class="text-center p-2">
 							<form action=" {{route('cart.store')}} " method="POST">
 								@csrf
 								<input type="hidden" name="id" value=" {{$p->id}} ">
 								<input type="hidden" name="name" value=" {{$p->name}} ">
 								<input type="hidden" name="price" value=" {{$p->price}} ">
 								<button type="submit" class="button button-plain btn btn-primary btn-block text-center"><i class="fa fa-shopping-cart"></i></button>
 							</form>
 						</div>

 					</div>
 				</div>
 			</a>
 		</div>
 		@endforeach

 	</div>


 </div>




