<li class="nav-item p-4 t-2 {{$custom ?? null}}" {{!empty($modal) ? ' data-toggle=modal data-target=#' . $modal . '-modal' : null}}>

	<a class="nav-link animated-fast t-2 {{!empty($icon) && $icon == 'shopping-cart' ? 'cart-icon' : null}}" href="{{$url ?? 'javascript:void(0)'}}">
	
	@if(!empty($label))
		<span class="text-uppercase" style="font-size: .8em; letter-spacing: 2.92px; font-weight: 500;">{{$label}}</span>
	@elseif(!empty($icon))
	<div class="position-relative">
		<i class="fas fa-{{$icon}}"></i>
		@if($icon == 'shopping-cart')
		<div class="cart-badge" style="display: {{auth()->check() ? 'block' : 'none'}}">
			<span class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle position-absolute" 
				style="font-size: .6em; width: 15px; height: 15px; top: -4px; right: -8px;">
				<strong class="cart-quantity">0</strong>
			</span>
		</div>
		@endif
	</div>
	@endif
	</a>
	
</li>