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
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><b><i>Product Editing form</i></b></h4>
            <form id='my' method="post" action = "{{ route('admin.update',$product->id) }}" enctype='multipart/form-data' >
              {{ method_field("put") }}
              @csrf
              <div class="form-group">
                <label for="name">Product Name</label>
                @if($errors->has("name"))
                <input type="text" class="form-control is-invalid" name="name" id="name"  placeholder="Enter the product name" value="{{ old('name')}} ">
                <div class="invalid-feedback">
                  {{ $errors->first("name") }}
                </div>
                @else
                <input type="text" class="form-control" name="name" placeholder="Enter the product name" value="{{ $product->name }} ">
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
                <input type="text" class="form-control" name="quantity" placeholder="Enter the product quantity" value="{{ $product->quantity }} ">
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
                <input type="text" class="form-control" name="price" placeholder="Enter Product Price" value="{{ $product->price }} ">
                @endif
              </div>
      {{-- image start --}}

      {{-- image end --}}
            <div class="form-group">
              <label for="descritption">Description</label>
              @if($errors->has('quantity'))
                <textarea class="form-control" name="description" id="description" rows="5" value=" {{ old('description') }}"></textarea>
                <div class="invalid-feedback">
                  {{ $errors->first("quantity") }}
                </div>
                @else
                <textarea class="form-control" name="description" id="description" rows="5" value=" {{ $product->description }}"></textarea>
                @endif
              
            </div>
            <div>
              <button type="submit" id='submit-all'class="btn btn-success mr-2">Submit</button>
            </div>


          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6 ">
      <div id="app">
         <mm></mm>
      </div>
    </div>
  </div>
</div>
@include('admin.footer')
<!-- page-body-wrapper ends -->
</div>

@endsection

@section("script")

@endsection