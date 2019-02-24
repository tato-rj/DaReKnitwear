<div class="d-flex justify-content-between">
	<div>
		<div style="line-height: 1.2" class="mr-1">{{$product->name}}</div>
		<div class="text-muted"><small>{{slug_str($item->color)}}</small></div>
	</div>
	<div class="text-right">
		<span class="d-block {{$product->discount ? 'text-primary' : null}}" style="line-height: 1.2"><strong>{{$product->discount ?? $product->price('usd')}}</strong></span>
		@if($product->discount)
		<span class="d-block" style="text-decoration: line-through; line-height: 1.2"><strong>{{$product->discount}}</strong></span>
		@endif
	</div>
</div>