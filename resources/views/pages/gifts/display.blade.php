<section class="py-4 position-relative" style="background-color: {{$background}}">
	<div class="container">
		<div class="row py-4">
			<div class="col-6 {{$inverted ? 'order-last' : null}} d-flex justify-content-center flex-column">
				<div class="mb-4">
					@include('components.product.share')
					<h3><strong>{{$product}}</strong></h3>
					<h4>${{$price}} USD</h4>
					<p class="lead">{{loremText(rand(2,3))}}</p>
				</div>
				<div class="text-left">
				    <a href="#" class="btn btn-wide btn-outline-dark">ORDER NOW</a>
				</div>
			</div>
			<div class="col-6 {{$inverted ? 'order-first' : null}} ">
				<img src="{{asset('images/gifts/' . str_slug($product) . '.jpg')}}" class="w-100">
			</div>
		</div>
	</div>
</section>