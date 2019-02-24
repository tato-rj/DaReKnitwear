<div class="d-flex flex-wrap product-size product-specification mb-2">
{{-- 	<label 
		title="Extra small" 
		data-count="{{$product->itemsLeft($color, 'xs')}}"
		data-value="xs" class="bg-light d-flex flex-center m-1 
			{{request('size') == 'xs' ? 'selected' : 'border-transparent'}} 
			{{$product->itemsLeft($color, 'xs') ? null : 'sold-out'}}" style="width: 50px; height: 50px;"><small>XS</small></label> --}}
	<label 
		title="Small" 
		data-count="{{$product->itemsLeft($color, 's')}}"
		data-value="s" class="bg-light d-flex flex-center m-1 
			{{request('size') == 's' ? 'selected' : 'border-transparent'}} 
			{{$product->itemsLeft($color, 's') ? null : 'sold-out'}}" style="width: 50px; height: 50px;"><small>S</small></label>
	<label 
		title="Medium" 
		data-count="{{$product->itemsLeft($color, 'm')}}"
		data-value="m" class="bg-light d-flex flex-center m-1 
			{{request('size') == 'm' ? 'selected' : 'border-transparent'}} 
			{{$product->itemsLeft($color, 'm') ? null : 'sold-out'}}" style="width: 50px; height: 50px;"><small>M</small></label>
	<label 
		title="Large" 
		data-count="{{$product->itemsLeft($color, 'l')}}"
		data-value="l" class="bg-light d-flex flex-center m-1 
			{{request('size') == 'l' ? 'selected' : 'border-transparent'}} 
			{{$product->itemsLeft($color, 'l') ? null : 'sold-out'}}" style="width: 50px; height: 50px;"><small>L</small></label>
{{-- 	<label 
		title="Extra large" 
		data-count="{{$product->itemsLeft($color, 'xl')}}"
		data-value="xl" class="bg-light d-flex flex-center m-1 
			{{request('size') == 'xl' ? 'selected' : 'border-transparent'}} 
			{{$product->itemsLeft($color, 'xl') ? null : 'sold-out'}}" style="width: 50px; height: 50px;"><small>XL</small></label> --}}
</div>
<div id="size-count" class="m-2 text-danger font-italic" style="display: none;"><small>Only <span></span> left in stock!</small></div>
<div class="ml-2">
	<label class="cursor-pointer" data-toggle="modal" data-target="#size-guide"><i class="fas fa-ruler mr-2"></i>View size guide</label>
</div>