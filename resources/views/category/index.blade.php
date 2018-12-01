@extends('layouts.adminmaster')

@section('content')

<div class="container">
	<div class="row">
		<div class="col">
			<table class="table">
				<thead class="bg-success">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>
						<td>{{$category->name}}</td>
						<td>
							<button class="btn btn-primary">Edit</button>
						</td>
						<td>
							<form action="{{ route('category.destroy', $category->id) }}" method = "post">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="delete">
								<button class="btn btn-danger" type="submit">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $categories->links() }}
		</div>
	</div>
</div>

@stop