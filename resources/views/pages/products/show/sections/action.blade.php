<div class="mb-4">
	<div class="cart-add-container mb-2">
		<button data-url="{{route('cart.add', [
				'product_type' => get_class($product),
				'product_id' => $product->id,
				'color' => $color])}}"
				data-size=""
				class="btn btn-disabled btn-block m-0 cart-add">
				<span>CHOOSE A SIZE</span>
				<span style="display: none;"><i class="fas fa-shopping-cart mr-2"></i>ADD TO CART</span>
		</button>
		<button class="btn btn-secondary btn-block m-0 notify" data-toggle="modal" data-target="#sold-out" style="display: none;"><i class="fas fa-bell mr-2"></i>NOTIFY ME</button>
	</div>
	@auth
	<button class="btn btn-outline-dark btn-block m-0"><i class="far fa-heart mr-2"></i>ADD TO WISHLIST</button>
	@else
	<a href="{{route('login')}}" class="btn btn-outline-dark btn-block m-0"><i class="far fa-heart mr-2"></i>ADD TO WISHLIST</a>
	@endauth
</div>