<section id="reviews-container">
	<div class="container mb-5">
		<h2 class="serif text-center">Reviews</h2>
		<div class="d-apart mb-4">
			<div>
				@if($product->reviews_count > 0)
				@include('components.product.stars', [
					'rating' => $product->rating, 
					'label' => 'Total of ' . $product->reviews_count . ' ' . str_plural('review', $product->reviews_count)])
				@else
				<p class="m-0 text-muted">No reviews yet</p>
				@endif
			</div>
			<button data-toggle="modal" data-target="#new-review" class="btn btn-outline-dark btn-sm">
				<i class="fas fa-pen-alt mr-2"></i>Write {{$product->reviews_count > 0 ? 'a review' : 'the first review'}}
			</button>
		</div>
		<div>
			@forelse($product->reviews as $review)
				@if($loop->count >= 5 && $loop->iteration == 3)
				<div class="collapse" id="reviews-collapse">
				@endif
					<div class="py-2 my-2 {{! $loop->last ? 'border-bottom' : null}}">
						<div class="d-apart">
							<h6 class="m-0"><strong>{{$review->title}}</strong></h6>
							@include('components.product.stars', ['rating' => $review->rating, 'size' => 'xs'])
						</div>
						<p class="text-muted"><small>by <strong>{{$review->name}}</strong> on {{$review->created_at->toFormattedDateString()}}</small></p>
						<p>{{$review->comment}}</p>
					</div>
				@if($loop->count >= 5 && $loop->last)
				</div>
				@endif
			@empty
			<div class="text-center">
				<p class="lead">Be the first one to tell us about this item!</p>
			</div>
			@endforelse
			@if($product->reviews_count >=5)
				<div class="text-center">
					<button class="toggle-collapse btn btn-outline-dark mt-4" data-toggle="collapse" data-target="#reviews-collapse">Show all</button>
				</div>
			@endif
		</div>
	</div>
</section>