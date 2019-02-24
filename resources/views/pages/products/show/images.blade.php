<div class="col-8">
	<div id="product-view" class="row no-gutters mb-5">
		<div class="col-lg-2 col-md-3 pr-2">
			@foreach($images as $image)
			<img src="{{asset($image['path'])}}" class="w-100 mb-1 preview-image cursor-pointer {{$loop->first ? 'border border-1x' : null}} p-1">
			@endforeach
		</div>
		<div class="col-lg-10 col-md-9 col-12 zoom-image" style="overflow: hidden; cursor: zoom-in;">
			<img src="{{asset($images[0]['path'])}}" class="w-100">
			<img src="{{asset($images[0]['path'])}}" 
				 style="position: absolute; top: 0; left: 0; margin-left: -50%; margin-top: -50%; width: 200%; display: none;">
		</div>
	</div>
</div>