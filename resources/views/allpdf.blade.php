<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table class="table table-dark">
	<thead>
		<tr>
			<td>Name</td>
			<td>Quantity</td>
			<td>Price</td>
		</tr>
	</thead>
	<tbody>
		@foreach($gg as $product)
		<tr>
			<td>{{$product->name}}</td>
			<td>{{$product->quantity}}</td>
			<td>{{$product->price}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>