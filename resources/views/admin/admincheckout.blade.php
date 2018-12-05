@extends('layouts.adminmaster')

@section('title')
<title>Checkout Table</title>
@endsection

@section('content')

@include('admin.header')
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<a href="{{route('allpdf')}}" class="btn btn-danger"><i class="fa fa-download"></i>Export PDF</a>
			<a class="btn btn-success" href="{{route('downloadexcel')}}"><i class="fa fa-download"></i>Export Excel</a>
			<table class="table table-dark">
				<thead>
					<tr>
						<td>Name</td>
						<td>Quantity</td>
						<td>Price</td>
						<td>PDF</td>
					</tr>
				</thead>
				<tbody>
					@foreach($allproduct as $product)
					<tr>
						<td>{{$product->name}}</td>
						<td>{{$product->quantity}}</td>
						<td>{{$product->price}}</td>
						<td><a href="{{route('downloadsinglepdf',['id'=>$product->id])}}" class="btn btn-danger"><i class="fa fa-file-pdf"></i>PDF</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@include("admin.footer")
		</div>
	</div>
</div>



@endsection