<li class="nav-item p-4 t-2 {{$custom ?? null}} dropdown position-static">
	<a class="nav-link {{empty($icon) ? 'dropdown-toggle' : null}}" href="#" data-toggle="dropdown" data-hover="dropdown">
		@if(!empty($label))
			<span class="text-uppercase" style="font-size: .8em; letter-spacing: 2.92px; font-weight: 500;">{{$label}}</span>
		@elseif(!empty($icon))
			<i class="fas fa-{{$icon}}"></i>
		@endif
	</a>
	@include('layouts.header.menu.dropdowns.' . $dropdown)
</li>