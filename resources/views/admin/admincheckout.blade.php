@extends('layouts.adminmaster')

@section('title')
<title>Checkout Table</title>
@endsection

@section('content')

@include('admin.header')
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-12">
				<div style="margin-bottom: 10px;">
				<a href="{{route('allpdf')}}" class="btn btn-danger"><i class="fa fa-download"></i>Export PDF</a>
			<a class="btn btn-success" href="{{route('downloadexcel')}}"><i class="fa fa-download"></i>Export Excel</a>
			</div>
			<div class="table-responsive-sm">
				<table class="table table-hover">
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
			</div>
			</div>
			
			
			
		</div>

	</div>
	@include("admin.footer")
</div>



@endsection