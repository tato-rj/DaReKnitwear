<h1 class="serif text-center ">{{$title}}</h1>

@if(!empty($subtitle))
<div class="row">
	<div class="col-8 mx-auto mb-5">
		<p class="lead text-center m-0">{{$subtitle}}</p>
	</div>

	@if(!empty($divider))
	@include('components.divider')
	@endif
</div>
@endif