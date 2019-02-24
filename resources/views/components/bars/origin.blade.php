<section class="container-fluid bg-align-center h-100vh d-flex flex-center flex-column text-white" style="background-image: url({{asset('images/backgrounds/wide.jpg')}});">
	<p><strong>OUR FACTORIES ARE IN</strong></p>
	<h1 class="serif">VENETO, ITALY</h1>
	<img src="{{asset('images/vectors/italy.svg')}}" style="width: 140px">
	@if(request()->route()->getName() != 'about')
	<a href="{{route('about')}}" class="btn btn-outline-white btn-wide mt-5">LEARN MORE</a>
	@endif
</section>