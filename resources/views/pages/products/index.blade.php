@extends('layouts.app')

@section('content')

<div class="container no-lead">

	@include('components.breadcrumbs', ['pages' => [
		['name' => 'Home', 'url' => route('home')],
		['name' => 'Shop']
	]])

	@include('components.page-title', [
	'title' => 'The Shop',
	'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
	'divider' => false])

	<div class="d-apart mb-3">
		
		<div class="d-flex flex-wrap" id="overview-menu">
			@include('components.product.menu', ['sections' => ['All products', 'New Arrivals', 'Women', 'Men']])
		</div>

		<div class="d-flex align-items-center">
			<span class="mr-3">SWITCH DISPLAY</span>
			<div class="mr-3 cursor-pointer switch-display text-muted opacity-4" data-grid="grid-2">
				<i class="fas fa-th-large fa-2x"></i>
			</div>
			<div class="cursor-pointer switch-display text-primary" data-grid="grid-3">
				<i class="fas fa-th fa-2x"></i>
			</div>
		</div>
	</div>

	<div class="mb-5">
        @include('pages.products.display')
	</div>
</div>

{{-- @include('components.bars.banners') --}}

@include('components.bars.origin')
@endsection

@push('js')
<script type="text/javascript">
$('.switch-display').on('click', function() {
	let $icon = $(this);
	let grid = $icon.attr('data-grid');

	$icon.removeClass('text-muted opacity-4').addClass('text-primary');
	$icon.siblings('.switch-display').addClass('text-muted opacity-4').removeClass('text-primary');
	$('.product').removeClass('grid-3 grid-2').addClass(grid);
});
</script>
@endpush