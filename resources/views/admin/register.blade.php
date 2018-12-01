@extends('layouts.adminmaster')

@section('title')
<title>Admin-register Form</title>
@endsection

@section('content')
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
      <div class="row w-100">
        <div class="col-lg-4 mx-auto">
          <h2 class="text-center mb-4">Admin Registeration</h2>
          <div class="auto-form-wrapper">
            <form method="POST" action="{{ route('adminregister') }}" aria-label="{{ __('Register') }}">
              @csrf
              <div class="form-group">
                
                <input style="border: solid black 1px;" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Username" name="name" value="{{ old('name') }}" required autofocus>
                
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
                
              </div>
              <div class="form-group">
                
                {{-- <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail"  name="email" value="{{ old('email') }}" required autofocus> --}}
                
                <input style="border: solid black 1px;" name="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" aria-describedby="textHelp" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                
              </div>

              <div class="form-group">
                <input style="border: solid black 1px;" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>
                
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group">
               
                <input style="border: solid black 1px;" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password-confirm">
              </div>
              <div class="form-group">
                <div class="input-group">
                  <select style="border: solid black 1px;" class="form-control" name="role" id="" style="border-right:solid #e5e5e5 1px;">
                    <option value="admin">Admin</option>
                  </select>


                </div>
              </div>
              <div class="form-group">
                
                <input style="border: solid black 1px;" type="text" class="form-control {{ $errors->has('c_name') ? ' is-invalid' : '' }}" placeholder="Company name" name="c_name" value="{{ old('c_name') }}" required autofocus>
                
                @if ($errors->has('c_name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('c_name') }}</strong>
                </span>
                @endif
                
              </div>
              <div class="form-group">
                <div class="input-group">
                  <select style="border: solid black 1px;" class="form-control" name="category_id" style="border-right:solid #e5e5e5 1px;">

                    @foreach($categorys as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                    @endforeach
                  </select>


                </div>
              </div>


              <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block">Register</button>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
@endsection
