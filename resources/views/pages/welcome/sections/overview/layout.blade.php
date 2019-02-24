<section class="container mb-8">
	<div class="row text-center mb-4">
		<div class="col-default">
			@include('components.page-title', ['title' => 'Store Overview'])
			<div class="d-flex flex-wrap justify-content-center my-3" id="overview-menu">
				@include('components.product.menu', ['sections' => ['Best seller', 'Featured', 'New arrivals', 'Sale']])
			</div>
		</div>
	</div>

	<div id="overview-items" class="mb-5">
		@include('pages.products.display')
        {{-- @include('pages.welcome.sections.overview.best-seller') --}}
        {{-- @include('pages.welcome.sections.overview.featured') --}}
        {{-- @include('pages.welcome.sections.overview.new-arrivals') --}}
        {{-- @include('pages.welcome.sections.overview.sale') --}}
    </div>

    <div class="text-center">
		<a href="{{route('products.index')}}" class="btn btn-outline-dark btn-wide mx-3">VISIT OUR SHOP FOR MORE</a>
    </div>
</section>