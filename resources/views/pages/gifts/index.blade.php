@extends('layouts.app')

@section('content')

<div class="container no-lead mb-4">
	@include('components.breadcrumbs', ['pages' => [
		['name' => 'Home', 'url' => route('home')],
		['name' => 'Gifts']
	]])

	<div class="text-center mb-4">
	@include('components.page-title', ['title' => 'Gifts'])
	</div>

	<div class="row">
		<div class="col-8 mx-auto">
			<p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
		</div>
	</div>
</div>

@include('pages.gifts.display', ['background' => 'white', 'product' => 'Bambini Gift Set', 'price' => '180', 'inverted' => true])

@include('pages.gifts.display', ['background' => '#eeedeb', 'product' => 'Sleepy Set', 'price' => '120', 'inverted' => false])

@include('pages.gifts.display', ['background' => 'white', 'product' => 'Cashmere Water Bottles', 'price' => '90', 'inverted' => true])

@include('components.bars.origin')
@endsection

@push('js')

@endpush