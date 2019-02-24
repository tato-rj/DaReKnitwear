<div class="mb-4">
	<p class="m-1 mb-2">{{ucfirst(slug_str($color))}}</p>
	@include('components.product.colors', ['colors' => $product->colors()])
</div>