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

			@include('pages.cart.checkout.components.timeline', ['stage' => 3])

			<table class="table table-bordered mb-4">
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
					<tr>
						<th scope="row">Method</th>
						<td colspan="2">Fastest Shipping</td>
						<td class="text-center"><span class="text-success">{{ucfirst(request('shipping_method'))}}</span></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-12">
			<form method="POST" action="{{route('cart.checkout.purchase')}}">
				@csrf
				@foreach(['cart_id', 'email', 'first_name', 'last_name', 'address', 'complement', 'city', 'zip', 'country', 'state', 'shipping_method'] as $input)
				<input type="hidden" name="{{$input}}" value="{{request($input)}}">
				@endforeach
				<div class="mb-4">
					<h5><strong>Payment Method</strong></h5>
					<p class="m-0">All transactions are secured and encrypted.</p>
				</div>
				<div class="mb-4">
					@include('pages.cart.checkout.forms.card')
				</div>

				<div class="mb-4">
					<h5><strong>Billing Address</strong></h5>
					<p class="m-0">All transactions are secured and encrypted.</p>
				</div>
				<div class="mb-5">
					<div>
						<div class="custom-control custom-radio mb-3 pb-3 border-bottom same-billing">
						  <input type="radio" id="same-billing" name="billing-option" checked class="custom-control-input">
						  <label class="custom-control-label pl-1" for="same-billing">Same as shipping address</label>
						</div>
						<div class="custom-control custom-radio different-billing">
						  <input type="radio" id="different-billing" name="billing-option" class="custom-control-input">
						  <label class="custom-control-label pl-1" for="different-billing">Use a different billing address</label>
						</div>
					</div>
					<div class="collapse mt-4" id="new-address">
						@include('pages.cart.checkout.forms.address')
					</div>
				</div>

				<div class="d-flex d-apart">
					<a href="{{route('cart.checkout.step2', ['cart_id' => request('cart_id')])}}" class="text-secondary m-0 cursor-pointer"><i class="fas fa-caret-left mr-1"></i>return to shipping method</a>
					<button type="submit" class="btn btn-primary"><strong>Complete Order</strong></button>
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

@push('js')
<script type="text/javascript">
$('.same-billing').on('click', function() {
	$('#new-address').collapse('hide');
});
$('.different-billing').on('click', function() {
	$('#new-address').collapse('show');
});
</script>
@endpush