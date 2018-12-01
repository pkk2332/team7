@extends("layouts.adminmaster")

@section("title")
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/basic.css" rel="stylesheet" type="text/css" />

<title>Admin Panel</title>
<style type="text/css">
.dropzone {
  border:2px dashed #999999;
  border-radius: 10px;
}
.dropzone .dz-default.dz-message {
  height: 171px;
  background-size: 132px 132px;
  margin-top: -101.5px;
  background-position-x:center;
}
.dropzone .dz-default.dz-message span {
  display: block;
  margin-top: 145px;
  font-size: 20px;
  text-align: center;
}
</style>
@endsection

@section("content")

@include('admin.header')
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">


      <div class="col-md-2">
        <h5>Category list</h5>
        @foreach($subcategories as $key => $value)
        <ul>
          <li>{{$value}}</li>
        </ul>


        @endforeach
      </div>



      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><b><i>Product Entry form</i></b></h4>
            <form id='my' method="post" action = "{{ route('admin.store') }}" enctype='multipart/form-data' >
              @csrf
              <div class="form-group">
                <label for="name">Product Name</label>
                @if($errors->has("name"))
                <input type="text" class="form-control is-invalid" name="name" id="name"  placeholder="Enter the product name" value="{{ old('name')}} ">
                <div class="invalid-feedback">
                  {{ $errors->first("name") }}
                </div>
                @else
                <input type="text" class="form-control" name="name" placeholder="Enter the product name" value="{{ old('name')}} ">
                @endif
              </div>
              <div class="form-group">
                <label for="quantity">Quantity</label>
                @if($errors->has('quantity'))
                <input type="text" class="form-control is-invalid" name="quantity" id="quantity" placeholder="Enter quantity of product" value="{{ old('quantity')}}">
                <div class="invalid-feedback">
                  {{ $errors->first("quantity") }}
                </div>
                @else
                <input type="text" class="form-control" name="quantity" placeholder="Enter the product quantity" value="{{ old('quantity')}} ">
                @endif
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                @if($errors->has('price'))
                <input type="text" class="form-control is-invalid" name="price" id="price" placeholder="Enter Product price" value="{{ old('price')}}">
                <div class="invalid-feedback">
                  {{ $errors->first("price") }}
                </div>
                @else
                <input type="text" class="form-control" name="price" placeholder="Enter Product Price" value="{{ old('price')}} ">
                @endif
              </div>









              <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  ADD PHOTO
                </button>
              </div>
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Media Manager</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <div class="dropzone" id="myDropzone"></div>
                   </div>
                   <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                  </div>
                </div>
              </div>
            </div>









            <div class="form-group">
              <label for="count">Sub-Categories</label>
              <select id="product_categories" class="simple-select2 w-100" name="sub_categories[]" multiple="multiple">

                @foreach($subcategories as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="descritption">Description</label>
              <textarea class="form-control" name="description" id="description" rows="5"></textarea>
            </div>
            <div>
              <button type="submit" id='submit-all'class="btn btn-success mr-2">Submit</button>
            </div>


          </form>
        </div>
      </div>
    </div>

    <div class="col-md-4 ">
      <div id="errors">

      </div>
    </div>
  </div>
</div>
@include('admin.footer')
<!-- page-body-wrapper ends -->
</div>

@endsection

@section("script")
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script src="{{ asset('js/dropzone1.js') }}"></script>

<script> 

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax().done(function(response){
    //check if response has errors object
    if(response.errors){
      toastr.error(response.errors, 'Inconceivable!')
      

    }
  });
  $(document).ready(function() {
    $('#product_categories').select2();
  });
  
</script>

@endsection