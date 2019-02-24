<div class="p-2 product h-100" style="min-width: 240px;">
	<div class="bg-align-center mb-2 w-100 image position-relative" 
		 style="background-image: url('{{asset("images/overview/product-{$image}a.jpg")}}'); height: 262px">
		@if(!empty($note))
		<div class="absolute-bottom-left border boder-white boder-1x text-white px-3 py-2 text-uppercase">
			{{$note}}
		</div>
		@endif
		</div>

	<div>
		<a href="{{route('products.show', str_slug($name))}}" class="link-inherit text-dark">
			@include('components.product.info')
		</a>
	</div>
</div>