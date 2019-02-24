<div class="dropdown-menu w-100 rounded-0 border-0 shadow-sm">
	<div class="container py-4">
		<div class="row animated-fast fadeInUpNav">
			@foreach($sections as $section)
			<div class="col-2 mb-4">
			  	<h6 class="dropdown-header p-2 lead">{{$section['label']}}</h6>
			  	@foreach($section['items'] as $item)
				<a class="dropdown-item p-2" href="{{$item['url']}}">{{$item['label']}}</a>
				@endforeach
			</div>
			@endforeach

			@if(!empty($images))
			<div class="col-6 flex-grow">
			  	<h6 class="dropdown-header p-2 lead">HIGHLIGHTS</h6>
			  	<div class=" d-flex align-items-center p-2">
					@foreach($images as $image)
					<a href="#" class="w-50">
						<img src="{{asset("images/menu/dropdown-{$image}.jpg")}}" class="w-100 p-1">
					</a>
					@endforeach
				</div>
			</div>
			@endif

		</div>
	</div>
</div>