<div style="min-width: 110px; max-width: 130px" class="pr-4">
	<a href="{{route('products.show', ['type' => classToType($item->product_type), 'product' => $item->product->slug, 'color' => $item->color])}}">
		<img src="{{asset($item->product->mainImage($item->color))}}" class="w-100 border">
	</a>
</div>

<div class="d-flex justify-content-between w-100" style="overflow-x: hidden;">
	<div>
		<a href="{{route('products.show', ['type' => classToType($item->product_type), 'product' => $item->product->slug, 'color' => $item->color])}}" class="link-none">
			<h6 class="elipsis"><strong>{{$item->product->name}}</strong></h6>
		</a>
		<div class="item-price mb-1">
			@if(!empty($quantity))
			{{$item->product->price('usd', $quantity)}}
			@else
			{{$item->product->price('usd')}}
			@endif
		</div>
		<div>
			<div style="line-height: 1.2"><small>Size: <span class="text-uppercase"><strong>{{$item->size}}</strong></span></small></div>
			<div style="line-height: 1.2"><small>Color: <strong>{{slug_str($item->color)}}</strong></small></div>
		</div>
	</div>
	<div class="">
		<h3 class="text-grey font-weight-bold">x{{$quantity}}</h3>
	</div>
</div>