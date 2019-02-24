@extends('layouts.special', ['return' => true])

@section('content-left')
<div class="container py-8 pl-8">
	<div class="row">
		<div class="col-12 mb-4">
			@include('components.breadcrumbs', ['pages' => [
				['name' => 'Home', 'url' => route('home')],
				['name' => 'Shopping cart', 'url' => route('cart', ['cart_id' => request('cart_id')])],
				['name' => 'Checkout']
			]])

			@include('pages.cart.checkout.components.timeline', ['stage' => 2])

			<table class="table table-bordered">
				<tbody>
					<tr>
						<th scope="row">Contact</th>
						<td colspan="2">arthurvillar@gmail.com</td>
						<td class="text-center"><a class="link-primary" href="{{route('cart.checkout.step1', ['cart_id' => request('cart_id')])}}"><small>change</small></a></td>
					</tr>
					<tr>
						<th scope="row">Ship to</th>
						<td colspan="2">2 Park Place 18D, Hartford CT 06106, United States</td>
						<td class="text-center"><a class="link-primary" href="{{route('cart.checkout.step1', ['cart_id' => request('cart_id')])}}"><small>change</small></a></td>
					</tr>
				</tbody>
			</table>

		</div>
		<div class="col-12">
			<form method="GET" action="{{route('cart.checkout.step3')}}">
				@foreach(['cart_id', 'email', 'first_name', 'last_name', 'address', 'complement', 'city', 'zip', 'country', 'state'] as $input)
				<input type="hidden" name="{{$input}}" value="{{request($input)}}">
				@endforeach
				<input type="hidden" name="id" value="{{request('cart_id')}}">
				<div class="mb-4">
					<h5><strong>Shipping Method</strong></h5>
					<p class="m-0"><small>Free shipping & returns on any domestic orders!</small></p>
				</div>

				<div class="mb-5">
					<div class="d-flex d-apart">
						<div class="custom-control custom-radio">
						  <input required type="radio" id="free" name="shipping_method" value="free" class="custom-control-input">
						  <label class="custom-control-label pl-1" for="free">Fastest Shipping (3 to 5 business days)</label>
						</div>
						<div class="text-success"><strong>FREE</strong></div>
					</div>
				</div>

				<div class="d-flex d-apart">
					<a href="{{route('cart.checkout.step1', ['cart_id' => request('cart_id')])}}" class="text-secondary m-0 cursor-pointer"><i class="fas fa-caret-left mr-1"></i>return to customer information</a>
					<button type="submit" class="btn btn-primary">
						<strong>Continue to payment method<i class="fas fa-angle-right ml-2"></i></strong>
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