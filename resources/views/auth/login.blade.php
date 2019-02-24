@extends('layouts.special', ['return' => true])

@section('content-left')
<div class="d-flex flex-center h-100">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <img src="{{asset('images/brand/logo3.svg')}}" style="width: 180px" class="mb-3">

            <h1 class="display-4 mb-0" style="font-size: 1.8em">Log into your account</h1>
        </div>

        <div class="col-lg-8 col-10 mx-auto">
                <p class="text-center">
                    Don't have an account yet? <span class="text-blue"><a href="{{route('register')}}" class="link-primary">Sign up now</a></span>
                </p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" aria-describedby="email" placeholder="My e-mail" value="{{old('email')}}">

                    @include('components/form/error', ['bag' => 'default', 'field' => 'email'])
                </div>

                <div class="form-group mb-4">
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" aria-describedby="password" placeholder="Password">

                    @include('components/form/error', ['bag' => 'default', 'field' => 'password'])
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-wide mb-4">LOGIN</button>
            </form>
            <div class="mb-4">
                <a href="" class="btn btn-facebook btn-block text-left mb-2"><i class="fab fa-facebook fa-lg border-right mr-3" style="width: 34px"></i>Login with Facebook</a>
                <a href="" class="btn btn-google btn-block text-left mb-2"><i class="fab fa-google border-right mr-3" style="width: 34px"></i>Login with Google</a>
            </div>
            <div>
                <p class="mb-0">
                    <small>Forgot your password? <span class="text-blue"><a href="/" class="link-primary">Click here</a></span></small>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content-right')
<div class="w-100 h-100 bg-align-center" style="background-image: url({{asset("images/backgrounds/worker.jpg")}})">
    <div class="overlay-darkest"></div>
    <div class="position-relative h-100 d-flex justify-content-center flex-column w-50 mx-auto text-white">
        <div class="text t-2">
            <h1 class="serif mb-4">Fair to Manufacturers & Producers</h1>
            <p class="m-0 lead">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        </div>
    </div>
</div>
@endsection