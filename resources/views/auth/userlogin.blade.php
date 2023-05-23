@extends('layouts.app')

@push('.css')
 
  <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  
@endpush

@section('content')
<div class="row hold-transition login-page justify-content-center bg-white h-100" >
<div class="col-md-6 login-box my-5">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary shadow">
    <div class="card-header text-center">
      <a href=" " class="h1"><b>User</b>Login</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your sessions</p>
 
      <form action="{{route('userslogin')}}" method="POST">
         @csrf
         

        <div class="input-group mb-3">

          <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
          value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
          </div>
          
           @error('email')
            <span class="invalid-feedback" role="alert">
                <strong style="color:red">{{ $message }}</strong>
            </span>
            @enderror
                               

        </div>



        <div class="input-group mb-3">
          <input type="password" name="password"  id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror"
              required autocomplete="current-password">


          <div class="input-group-append">
            <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
          </div>
              @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                         </span>
                          @enderror
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary mx-4">
                <input class="form-check-input" type="checkbox" name="remember"
                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>



            </div>
          </div>

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
      <p class="mb-1">
          @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
               {{ __('Forgot Your Password?') }}
            </a>
          @endif
           </p>

          @if (Route::has('register'))
                    
                         <a href="{{ route('register') }}" class="btn btn-link">Register</a>
                      
          @endif
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
</div>
@endsection
 