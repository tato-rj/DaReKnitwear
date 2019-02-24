@extends('layouts.special', ['return' => false])

@section('content-left')
<div class="d-flex flex-center h-100">
	<div class="col-8 mx-auto">
		<div class="pb-2">
			@include('components.animations.success-icon')
		</div>
		<div class="text-center">
			<h4 class="mb-3"><strong>Great! Your order has been received.</strong></h4>
			<p>Thank you for shopping with us. You will receive a confirmation email shortly. Please don't hesitate to get in touch if you have any questions or concerns regarding your purchase.</p>
			<div class="mb-4">
				<p class="mb-0 text-muted"><small>ORDER ID #</small></p>
				<h4 class="m-0 text-center" style="letter-spacing: 1.5px"><strong>2458-1304</strong></h4>
			</div>

			<a href="{{route('products.index')}}" class="btn btn-primary"><strong>SHOP MORE</strong></a>
		</div>
	</div>
</div>
@endsection

@section('content-right')
<div class="w-100 h-100 bg-align-center" style="background-image: url({{asset('images/backgrounds/checkout.jpg')}})"></div>
{{-- <div id="purchased-items" class="carousel slide h-100" data-ride="carousel">
  <div class="carousel-inner h-100">
  	@foreach($cart as $items)
    <div class="carousel-item h-100 {{$loop->first ? 'active' : null}}">
		<div class="w-100 h-100 bg-align-center" style="background-image: url({{asset($items->first()->product->mainImage($items->first()->color))}})"></div>
    </div>
    @endforeach
  </div>
  @if($cart->count() > 1)
  <a class="carousel-control-prev" href="#purchased-items" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" style="width: 4rem; height: 4rem;"></span>
  </a>
  <a class="carousel-control-next" href="#purchased-items" role="button" data-slide="next">
    <span class="carousel-control-next-icon" style="width: 4rem; height: 4rem;"></span>
  </a>
  @endif
</div> --}}
@endsection