<div class="d-flex align-items-center">
	@for($i=0; $i<$rating; $i++)
	<i class="fas fa-{{$size ?? null}} fa-star text-warning mr-1"></i>
	@endfor

	@for($i=0; $i<(5 - $rating); $i++)
	<i class="far fa-{{$size ?? null}} fa-star text-warning mr-1"></i>
	@endfor

	<div class="ml-2 text-muted">{{$label ?? null}}</div>
</div>