<!-- Modal -->
<div class="modal fade {{$errors->hasBag('store_review') ? 'modal-with-errors' : null}}" id="new-review" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Submit a new review</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="">
			<div class="text-center">
				<p class="text-muted m-0"><small>Choose your rating</small></p>
				<div class="d-flex flex-center stars form-control border-0 {{ validate($errors->store_review, 'rating') }}">
					<i class="{{old('rating') > 0 ? 'fas' : 'far'}} fa-star {{old('rating') ? 'text-warning' : 'text-grey'}} cursor-pointer mr-1"></i>
					<i class="{{old('rating') > 1 ? 'fas' : 'far'}} fa-star {{old('rating') ? 'text-warning' : 'text-grey'}} cursor-pointer mr-1"></i>
					<i class="{{old('rating') > 2 ? 'fas' : 'far'}} fa-star {{old('rating') ? 'text-warning' : 'text-grey'}} cursor-pointer mr-1"></i>
					<i class="{{old('rating') > 3 ? 'fas' : 'far'}} fa-star {{old('rating') ? 'text-warning' : 'text-grey'}} cursor-pointer mr-1"></i>
					<i class="{{old('rating') > 4 ? 'fas' : 'far'}} fa-star {{old('rating') ? 'text-warning' : 'text-grey'}} cursor-pointer mr-1"></i>
				</div>
				@include('components/form/error', ['bag' => 'store_review', 'field' => 'rating'])				
			</div>
			<form method="POST" action="{{route('products.reviews.store')}}" class="px-4">
				@csrf
				<input type="hidden" name="rating">
				<input type="hidden" name="reviewable_type" value="{{get_class($product)}}">
				<input type="hidden" name="reviewable_id" value="{{$product->id}}">

				@include('components.form.input', ['bag' => 'store_review', 'name' => 'name'])
				@include('components.form.input', ['bag' => 'store_review', 'name' => 'email'])
				@include('components.form.input', ['bag' => 'store_review', 'name' => 'title'])
				@include('components.form.textarea', ['bag' => 'store_review', 'name' => 'comment', 'limit' => 144])

		        <div class="my-4 text-center">
		        	<button type="submit" class="btn btn-outline-dark">SUBMIT MY REVIEW</button>
		        </div>
			</form>
		</div>
      </div>
    </div>
  </div>
</div>
