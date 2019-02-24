@extends('layouts.app')

@section('content')

<div class="container no-lead mb-4">
	@include('components.breadcrumbs', ['pages' => [
		['name' => 'Home', 'url' => route('home')],
		['name' => 'Shopping cart']
	]])

	<div class="d-apart mb-5">
		<div>
      <h1><strong>Shopping Cart</strong></h1>
			@include('components.product.free-shipping')
		</div>
    @if(! empty($cart))
		<div class="cart-checkout">
      @include('pages.cart.checkout.components.button', ['target' => 'customer', 'style' => ''])
		</div>
    @endif
	</div>

  @if(! empty($cart))
	<div class="cart">
    @foreach($cart as $items)
    @include('components.cart.item.large', ['item' => $items->first(), 'quantity' => $items->count()])
    @endforeach
  </div>

  <div id="special-requests" class="mb-5 cart-checkout">
  	<div class="form-group border">
  		<label class="bg-light text-muted px-3 py-2 w-100"><strong><i class="fas fa-bell mr-2"></i>Got any special requests?</strong></label>
  		<div class="px-2 py-1">
	  		<textarea class="form-control border-0" rows="4" placeholder="You can let us know here..."></textarea>
	  	</div>
  	</div>
  </div>

  <div class="row mb-5 cart-checkout">
  	<div class=" col-4 mx-auto text-center">
  		<div class="mb-4">
  			<div class="mb-2 d-flex d-apart">
  				<div><h3 class="">TOTAL</h3></div>
  				<div><h3 class="m-0"><strong class="cart-price">${{centsToCurrency($totalPrice)}}</strong></h3></div>
  			</div>
  			<div class="" style="line-height: 1.2">
  				<small>Free shipping on all domestic orders.<br>Shipping internationally? <a href="#" class="link-secondary">Learn more</a></small>
  			</div>
  		</div>
  		@include('pages.cart.checkout.components.button', ['target' => 'customer', 'style' => 'btn-block'])
  	</div>
  </div>
  @endif

  <div class="cart-empty mb-8 text-center" style="display: {{empty($cart) ? 'block' : 'none'}};">
    <p class="lead text-muted mb-4"><i>Your car is empty.</i></p>
    <a href="{{route('products.index')}}" class="btn btn-outline-dark btn-wide">VISIT OUR STORE</a>
  </div>
</div>

@endsection

@push('js')

@endpush