		<div class="position-absolute w-100 px-2 pb-2 add-container" style="bottom: 0; left: 0; display: none;">
			<div class="w-100 bg-white text-dark text-center">
				<div class="py-3 original">
					<span class="text-muted"><small><i class="fas fa-cart-plus mr-2"></i>ADD TO CART</small></span>
				</div>
				<div class="py-3 adding" style="display: none;">
					<span class="text-muted"><small>We're working on it...</small></span>
				</div>
				<div class="py-3 success" style="display: none;">
					<span class="text-muted"><small>Cart updated</small></span>
				</div>
				<div class="py-3 fail" style="display: none;">
					<span class="text-danger"><small>Sorry, we're out of stock</small></span>
				</div>
				<div class="py-3 error" style="display: none;">
					<span class="text-danger"><small>Ops, something went wrong...</small></span>
				</div>
				<div class="text-center py-3 sizes" style="display: none; cursor: default">
					@include('components.product.control-item', ['size' => 's'])
					@include('components.product.control-item', ['size' => 'm'])
					@include('components.product.control-item', ['size' => 'l'])
				</div>
			</div>
		</div>