<header class="absolute-top p-0">
	<div class="bg-black text-light text-center p-1" id="shipping-banner">
		<a href="#" class="text-white"><small><u>Free shipping & returns on all orders!</u></small></a>
	</div>

	<nav class="navbar navbar-expand-lg navbar-light bg-white p-2">

		@include('layouts.header.menu.hamburger')		

		<div class="collapse navbar-collapse justify-content-between position-relative">
			<ul class="navbar-nav mx-2">
				{{-- @include('layouts.header.menu-dropdown', ['label' => 'Shop', 'dropdown' => 'shop']) --}}

				@include('layouts.header.menu.simple', ['url' => route('products.index'), 'label' => 'Shop'])

				@include('layouts.header.menu.simple', ['url' => route('about'), 'label' => 'About'])

				@include('layouts.header.menu.simple', ['url' => '#', 'label' => 'Blog'])

			</ul>

			<div class="logo t-2 text-center absolute-center h-100 p-1">
				<a class="link-inherit text-dark" href="{{route('home')}}">
					<img src="{{asset('images/brand/logo4.svg')}}" class="t-2 h-100">
				</a>
			</div>
			
			<ul class="navbar-nav mx-2">
				{{-- @include('layouts.header.menu.simple', ['url' => '#', 'icon' => 'search']) --}}
				{{-- @include('layouts.header.menu.dropdown', ['icon' => 'search', 'dropdown' => 'search']) --}}
				@if(url()->current() != route('cart'))
				@include('layouts.header.menu.simple', ['icon' => 'shopping-cart', 'modal' => 'cart'])
				@endif

				@include('layouts.header.menu.simple', ['url' => route('login'), 'icon' => 'user'])
			</ul>
		</div>
	</nav>
</header>

@if(url()->current() != route('cart'))
@include('components.modals.cart')
@endif