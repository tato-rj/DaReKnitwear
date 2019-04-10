@extends('layouts.special', ['return' => true])

@section('content-left')
<div class="d-flex flex-center h-100">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <img src="{{asset('images/brand/logo.svg')}}" style="width: 180px" class="mb-3">

            <h1 class="display-4 mb-0" style="font-size: 1.8em">Create your account</h1>
        </div>
        <div class="col-lg-8 col-10 mx-auto">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="First name" value="{{old('first_name')}}">

                    @include('components/form/error', ['bag' => 'default', 'field' => 'first_name'])
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Last name" value="{{old('last_name')}}">

                    @include('components/form/error', ['bag' => 'default', 'field' => 'last_name'])
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{old('email')}}">

                    @include('components/form/error', ['bag' => 'default', 'field' => 'email'])
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" aria-describedby="password" placeholder="Password">
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group mb-4">
                    <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" aria-describedby="password-confirm" placeholder="Confirm your password">
                </div>

                <button type="submit" class="btn btn-primary btn-wide btn-block mb-4">CONTINUE</button>
            </form>
            <div class="mb-4">
                <a href="" class="btn btn-facebook btn-block text-left"><i class="fab fa-facebook fa-lg border-right mr-3" style="width: 34px"></i>Continue with Facebook</a>
                <a href="" class="btn btn-google btn-block text-left"><i class="fab fa-google border-right mr-3" style="width: 34px"></i>Continue with Google</a>
            </div>
            <div>
                <p class="m-0">
                    <small>Already have an account? <span class="text-blue"><a href="{{route('login')}}" class="link-primary">Login here</a></span></small>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content-right')
@section('content-right')
<div class="w-100 h-100 bg-align-center" style="background-image: url({{asset("images/backgrounds/wool.jpg")}})">
    <div class="overlay-darkest"></div>
    <div class="position-relative h-100 d-flex justify-content-center flex-column w-50 mx-auto text-white">
        <div class="text t-2">
            <h1 class="serif mb-4">Made With Care and Love in Italy</h1>
            <p class="m-0 lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
</div>
@endsection
@endsection