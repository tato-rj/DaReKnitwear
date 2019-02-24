<div class="item mb-4 pb-4 ">
<div class="row cart-item position-relative" 
	data-url="{{route('cart.check', ['item_id' => $item_id])}}" 
	data-unit-price="{{$price}}"
	data-quantity="{{$quantity ?? 1}}"
	data-product-id="{{$product_id}}">

	<div class="col d-flex">
		<a href="{{route('products.show', str_slug($name))}}">
			<img src="{{$image}}" class="h-100 mr-4">
		</a>
		<div>
			<a href="{{route('products.show', str_slug($name))}}" class="link-none">
				<h5>{{$name}}</h5>
			</a>
			<div class="">Size: <strong class="text-uppercase">{{$size}}</strong></div>
			<div class=" product-color">Color: <strong>{{$color}}</strong></div>
		</div>
	</div>
	<div class="col-3 h-100">
		<label class="text-secondary"><strong>QUANTITY</strong></label>
		<div class="d-flex align-items-center noselect">
			@include('pages.cart.button', ['type' => 'decrease', 'icon' => 'minus'])
			<h5 class="font-weight-bold m-0 mx-2 item-quantity">{{$quantity}}</h5>
			@include('pages.cart.button', ['type' => 'increase', 'icon' => 'plus'])
		</div>
	</div>
	<div class="col-3 h-100">
		<label class="text-secondary"><strong>PRICE</strong></label>
		<div class="position-relative">
			<div class=" t-2 animated-fast" style="font-size: 1.2em"><strong class="item-price">{{$price}}</strong></div>
		</div>
	</div>
	<div class="absolute-center w-100 h-100 out-of-stock" style="display: none;">
		<div class="overlay overlay-light" style="opacity: .8"></div>
		<span class="text-danger w-100 text-center absolute-center font-weight-bold"></span>
	</div>
	<div class="absolute-center w-100 h-100 loading" style="display: none;">
		<div class="overlay overlay-light" style="opacity: .8"></div>
		<span class="w-100 text-center absolute-center">
			@include('components.spinners.bars')
		</span>
	</div>
	<div class="ti-close cursor-pointer remove absolute-top-right" style="font-size: .8em"></div>
</div>
</div>