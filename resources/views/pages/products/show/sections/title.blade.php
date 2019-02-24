<div class="pb-4 mb-4 border-bottom">
	@include('components.product.share')
	<div class="mb-2">
		<h3 class="m-0"><strong>{{$product->name}}</strong></h3>
		<p class="m-0">100% Cashmere - Made in Italy</p>
	</div>
	<h4 class="m-0">{{$product->price('usd')}} USD</h4>
	@include('components.product.free-shipping')
	<p>{{$product->description}}</p>
	<div class="d-flex">
		@include('components.product.stars', ['rating' => $product->rating])
		<a href="#reviews-container" class="text-muted cursor-pointer link-none"><small>{{$product->reviews_count > 0 ? 'View all reviews' : 'Write a review'}}</small></a>
	</div>
</div>