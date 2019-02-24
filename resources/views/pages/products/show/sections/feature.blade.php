<div class="row no-gutters">

	<div class="col-6 order-{{$image['order']}} d-flex flex-center">
		<img src="{{asset($image['path'])}}" class="w-100">
	</div>

	<div class="col-6 order-{{$description['order']}} d-flex flex-center p-5 bg-light">
		<p class="lead m-0">{{$description['text']}}</p>
	</div>

</div>
