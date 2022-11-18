@extends('auth.auth_master')
@section('auth_title')
    Login | User Panel
@endsection
@section('auth-content')
{{--login details begins here--}}
<div class="login-area">
<div class="login-box ptb- -100">
  <form method="POST" action="{{route('login.submit')}}">
<div class="login-form-head">
    <h4>Sign In</h4>
    <p>Welcome, you are now good to go!</p>
    <div class="login-form-body">
      @include('layouts.message')
    </div>
    <div class="form-gp">
        <label for="exampleInputEmail1">Email address or Username</label>
         <input type="text" id="exampleInputEmail1" name="email">
        <i class="ti-email"></i>
        <div class="text-danger"></div>
        @error('email')
        <span class="invalid-feedback" role=""alert>
            <strong{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="form-gp">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" id="exampleInputPassword1" name="password">
        <i class="ti-lock"></i>
        <div class="text-danger"></div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="row mb-4 rmber-area">
        <div class="col-6">
            <div class="custom-control custom-checkbox mr-sm-2">
                <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
                <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
            </div>
        </div>
        {{-- <div class="col-6 text-right">
            <a href="#">Forgot Password?</a>
        </div> --}}
    </div>
    <div class="submit-btn-area">
        <button id="form_submit" type="submit">Sign In <i class="ti-arrow-right"></i></button>
    </div>

</div>

  </form>
</div>
</div>
@endsection
