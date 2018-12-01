@extends("layouts.adminmaster")

@section("title")
<title>Admin Panel</title>
@endsection

@section("content")

@include('admin.header')
<!-- partial -->

<div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><b><i>Product Entry form</i></b></h4>
      <form method="post" action = "{{ route('subcategory.store') }}"  >
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Sub-Category Name</label>
          @if($errors->has("name"))
          <input type="text" class="form-control is-invalid" name="name" placeholder="Enter the sub-category name" value="{{ old('name')}} ">
          <div class="invalid-feedback">
            {{ $errors->first("name") }}
          </div>
          @else
          <input type="text" class="form-control" name="name" placeholder="Enter the product name" value="{{ old('name')}} ">
          @endif
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" name="category_id" value="{{ $ca_id }}">

        </div>
        <button type="submit" class="btn btn-success mr-2">Submit</button>

      </div>


    </form>
  </div>
</div>
</div>

<div class="col-md-3"></div>
</div>
</div>
</div>
@include('admin.footer')
<!-- page-body-wrapper ends -->
</div>

@endsection

@section("script")
<script>
  $(document).ready(function() {
    $('#product_categories').select2();
  });
</script>
@endsection