@extends('layouts.auth')

@section('content')
<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Full name" name="name">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>

            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        {{-- <input type="checkbox" id="agreeTerms" name="is_admin" value="0">
                        <label for="agreeTerms">
                            Is Admin<a href="#"></a>
                        </label> --}}
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_admin" id="exampleRadios1" value="1">
                            <label class="form-check-label" for="exampleRadios1">
                                admin
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_admin" id="exampleRadios2" value="0">
                            <label class="form-check-label" for="exampleRadios2">
                                vendor
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i>
                Sign up using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i>
                Sign up using Google+
            </a>
        </div>
        <div class="text-center">
            <a href="{{route('login')}}" class="btn btn-primary">I already have account</a>
        </div>
    </div>
</div>

@endsection
