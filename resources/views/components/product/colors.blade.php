<div class="d-flex flex-wrap product-color">
	@foreach($colors as $name => $count)
		<a href="{{route('products.show', ['type' => classToType(get_class($product)), 'product' => $product, 'color' => str_slug($name)])}}">
			<label 
				data-value="{{str_slug($name)}}" 
				title="{{$name}}"
				class="m-1 {{str_slug($name)}} {{$color == str_slug($name) ? 'selected' : null}}"></label>
		</a>
	@endforeach
</div>