@extends('layouts.adminmaster')

@section('content')
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
      <div class="row w-100">
        <div class="col-lg-4 mx-auto">
          <h2 class="text-center mb-4">Register</h2>
          <div class="auto-form-wrapper">
            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
              @csrf
              <div class="form-group">
               
                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Username" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif

              </div>
              <div class="form-group">
               
                <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail"  name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif

              </div>

              <div class="form-group">

                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

              </div>
              <div class="form-group">

                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password-confirm">
                {{-- <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="mdi mdi-check-circle-outline"></i>
                  </span>
                </div> --}}
              </div>
              <div class="form-group d-flex justify-content-center">
                <div class="form-check form-check-flat mt-0">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked> I agree to the terms
                  </label>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block">Register</button>
              </div>
              <div class="text-block text-center my-3">
                <span class="text-small font-weight-semibold">Already have and account ?</span>
                <a href="{{ route('login')}}" class="text-black text-small">Login</a>
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
