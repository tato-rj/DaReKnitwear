<a href="{{route('products.show', ['type' => classToType($item->product_type), 'product' => $item->product->slug, 'color' => $item->color])}}">
	<img src="{{asset($item->product->mainImage($item->color))}}" class="pr-3" style="max-width: 120px; width: 100%;">
</a>