@extends('layouts.adminmaster')

@section('content')

<div class="container-scroller">
  <div class="page-body-wrapper full-page-wrapper auth-page">

    <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
     <div class="container-fluid">
      <div class="row w-100">
        <div class="col-lg-4 mx-auto">
          <h1 class="login-header text-center text-white">{{ __('Login Form') }}</h1>
          <br>
          <div class="auto-form-wrapper">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">

              @csrf

              <div class="form-group">

                <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                <input style="border: solid 1px; id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif



              </div>
              <div class="form-group">
                <label for="password" class="label">{{ __('Password') }}</label>
                <input style="border: solid 1px; id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">


                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary submit-btn btn-block">
                  {{ __('Login') }}
                </button>
              </div>
              <div class="form-group d-flex justify-content-between">
                <div class="form-check form-check-flat mt-0">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked> Keep me signed in
                  </label>
                </div>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
              </div>

              <div class="text-block text-center my-3">
                <span class="text-small font-weight-semibold">Not a member ?</span>
                <a href="register.html" class="text-black text-small">Create new account</a>
              </div>
            </form>
          </div>
          <br>
          <ul class="auth-footer">
            <li>
              <a href="#">Conditions</a>
            </li>
            <li>
              <a href="#">Help</a>
            </li>
            <li>
              <a href="#">Terms</a>
            </li>
          </ul>
          <p class="footer-text text-center">Copyright © 2018 Symphony. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->
</div>