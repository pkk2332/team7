@extends('layouts.adminmaster')

@section('content')

<div class="container">
	<div class="row">
		<div class="col">
			<div class="card-body">
				<form method="post" action="{{ route('category.store') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Category Name</label>

						@if($errors->has("name"))
						<input name="name" type="text" class="form-control is-invalid" id="product_name" aria-describedby="textHelp" placeholder="Category Name" value="{{ old('name') }}">
						<div class="invalid-feedback">
							{{ $errors->first("name") }}
						</div>
						@else
						<input name="name" type="text" class="form-control" id="product_name" aria-describedby="textHelp" placeholder="Category Name" value="{{ old('name') }}">

						@endif

					</div>

					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop