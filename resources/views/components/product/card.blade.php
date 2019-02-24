<div class="p-2 product grid-3">
	<a href="{{route('products.show', ['type' => classToType(get_class($product)), 'product' => $product->slug, 'color' => $item->color])}}" class="link-none">
		<div class="bg-align-center mb-2 w-100 image position-relative" style="background-image: url('{{asset($images[0]['path'])}}');">
			<div class="absolute-center bg-align-center w-100 h-100 show-on-hover" style="background-image: url('{{asset($images[1]['path'])}}');"></div>
			<div class="absolute-top-right" style="top: .85em">
				@include('components.product.heart')
			</div>
			@include('components.product.controls')
			@if($product->unsold($item->color)->count() <= 6)
			<div class="absolute-bottom-left border text-dark px-3 py-2 text-uppercase note" style="border-color: #6c757d!important">
				{{$product->unsold($item->color)->count() == 0 ? 'SOLD OUT' : 'ALMOST GONE'}}
			</div>
			@endif
		</div>
	</a>

	<div>
		<a href="{{route('products.show', ['type' => classToType(get_class($product)), 'product' => $product->slug, 'color' => $item->color])}}" class="link-inherit text-dark">
			@include('components.product.info')
		</a>
	</div>
</div>