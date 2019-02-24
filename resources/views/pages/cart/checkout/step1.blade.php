@extends('layouts.special', ['return' => true])

@section('content-left')
<div class="container py-8 pl-8">
	<div class="row">
		<div class="col-12 mb-5">
			@include('components.breadcrumbs', ['pages' => [
				['name' => 'Home', 'url' => route('home')],
				['name' => 'Shopping cart', 'url' => route('cart', ['cart_id' => request('cart_id')])],
				['name' => 'Checkout']
			]])

			@include('pages.cart.checkout.components.timeline', ['stage' => 1])

			<div class="mb-4">
				<h1><strong>Checkout</strong></h1>
				@include('components.product.free-shipping')
			</div>
			<div class="py-3 border text-center">
				<p class="m-0">Do you have an account? <a href="{{route('login')}}" class="link-primary">Click here</a> for faster checkout</p>
			</div>
		</div>
		<div class="col-12">
			<form method="GET" action="{{route('cart.checkout.step2')}}">
				@foreach(['cart_id'] as $input)
				<input type="hidden" name="{{$input}}" value="{{request($input)}}">
				@endforeach
				<div class="mb-5">
					<label class="mb-4"><strong>Contact information</strong></label>
					<div class="form-group">
						<input type="email" class="form-control" name="email" placeholder="Email">
						<small class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group form-check m-0">
						<input type="checkbox" class="form-check-input" name="subscribe" id="subscribe">
						<label class="form-check-label m-0" for="subscribe">Keep me up to date on news and exclusive offerst</label>
					</div>
				</div>

				<div class="mb-5">
					<label class="mb-4"><strong>Shipping address</strong></label>
					@include('pages.cart.checkout.forms.address')
				</div>

				<div class="d-flex d-apart">
					<a href="{{route('cart', ['cart_id' => request('cart_id')])}}" class="link-secondary m-0"><i class="fas fa-caret-left mr-1"></i>return to cart</a>
					<button type="submit" class="btn btn-primary">
						<strong>Continue to shipping method<i class="fas fa-angle-right ml-2"></i></strong>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

@include('pages.cart.checkout.components.footer')

@endsection

@section('content-right')
	@include('pages.cart.checkout.components.preview')
@endsection