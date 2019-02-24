<div class="{{! $loop->last ? 'border-bottom' : null}} mb-4 pb-4 cart-item"
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
<div class="row position-relative">

	<div class="col d-flex">

		@include('components.cart.item.image')

		<div>
			<a href="{{route('products.show', ['type' => classToType($item->product_type), 'product' => $item->product->slug, 'color' => $item->color])}}" class="link-none">
				<h5>{{$item->product->name}}</h5>
			</a>
				@include('components.cart.item.size', ['fontSize' => 'normal'])
				@include('components.cart.item.color', ['fontSize' => 'normal'])
		</div>
	</div>
	<div class="col-3 h-100">
		<label class="text-muted"><strong>QUANTITY</strong></label>
		<div class="d-flex align-items-center noselect">
			@include('pages.cart.button', ['type' => 'decrease', 'icon' => 'minus'])
			<h5 class="font-weight-bold m-0 mx-2 item-quantity">{{$quantity ?? 1}}</h5>
			@include('pages.cart.button', ['type' => 'increase', 'icon' => 'plus'])
		</div>
	</div>
	<div class="col-3 h-100">
		<label class="text-muted"><strong>PRICE</strong></label>
		<div class="position-relative">
			@include('components.cart.item.price', ['fontSize' => 'normal'])
		</div>
	</div>
	
	@include('components.cart.item.out-of-stock')

	@include('components.cart.item.loading')
	
	@include('components.cart.item.remove', ['position' => 'absolute-top-right'])

</div>
</div>