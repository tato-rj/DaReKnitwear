<div class="item-price t-2 animated-fast font-weight-bold" style="font-size: {{$fontSize == 'normal' ? '1.2em' : null}}">
	@if(!empty($quantity))
	{{$item->product->price('usd', $quantity)}}
	@else
	{{$item->product->price('usd')}}
	@endif
	
</div>