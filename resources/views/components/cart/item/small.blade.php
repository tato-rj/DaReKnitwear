<div class="mb-3 cart-item"
	data-add-url="{{route('cart.add', [
		'product_type' => $item->product_type,
		'product_id' => $item->product_id,
		'color' => $item->color,
		'size' => $item->size])}}" 
	data-delete-url="{{route('cart.delete', [
		'product_type' => $item->product_type,
		'product_id' => $item->product_id,
		'color' => $item->color,
		'size' => $item->size])}}"
	data-delete-all-url="{{route('cart.delete-all', [
		'product_type' => $item->product_type,
		'product_id' => $item->product_id,
		'color' => $item->color,
		'size' => $item->size])}}"
	data-unit-price="{{centsToCurrency($item->product->price)}}"
	data-quantity="{{$quantity ?? 1}}"
	data-item-id="{{$item->item_id}}"
	data-product-slug="{{$item->product->slug}}"
	data-product-id="{{$item->product_id}}"
	data-color="{{$item->color}}"
	data-size="{{$item->size}}">
	
	<div class="row no-gutters align-items-center position-relative">

		<div class="col-4">
			@include('components.cart.item.image')
		</div>
		
		<div class="flex-grow d-flex flex-column justify-content-between h-100 col-8">
			<div class="d-flex justify-content-between mb-1">

				<a href="{{route('products.show', ['type' => classToType($item->product_type), 'product' => $item->product->slug, 'color' => $item->color])}}" class="link-none elipsis mr-2">
					{{$item->product->name}}
				</a>
				
				@include('components.cart.item.remove')
			
			</div>
			<div>

				@include('components.cart.item.size', ['fontSize' => 'small'])

				@include('components.cart.item.color', ['fontSize' => 'small'])
				
				<div class="d-flex justify-content-between">
					
					@include('components.cart.item.quantity')

					<div class="position-relative">

						@include('components.cart.item.price', ['fontSize' => 'small'])
						
					</div>
				</div>
			</div>
		</div>

		@include('components.cart.item.out-of-stock')

		@include('components.cart.item.loading')

	</div>
</div>