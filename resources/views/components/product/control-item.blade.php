@if($product->itemsLeft($item->color, $size))
<span class="p-3 size t-2 cart-add cursor-pointer" 
	data-size="{{$size}}"
	data-url="{{route('cart.add', [
		'product_type' => $item->product_type,
		'product_id' => $item->product_id,
		'color' => $item->color,
		'size' => $size])}}">{{strtoupper($size)}}</span>
@else
	<span class="p-3 size t-2 empty">{{strtoupper($size)}}</span>
@endif