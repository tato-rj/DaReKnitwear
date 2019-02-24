<div class="container p-8">
	<div class="text-right">
		<p><strong>Need a hand? <a href="#" class="link-primary">We're here to help</a></strong></p>
	</div>
	<div class="bg-light p-4 mb-4">
		@include('pages.cart.checkout.components.display')
	</div>
	<div class="row no-gutters bg-light p-4 mb-4">
		<div class="col-12 mb-4">
			<div class="form-row w-100 m-0">
				<div class="flex-grow">
					<div class="form-group">
						<input type="text" name="coupon" class="form-control mr-2" placeholder="Have a coupon?">
					</div>
				</div>
				<div class="ml-2">
					<button class="btn btn-outline-dark">APPLY</button>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="d-flex d-apart px-3">
				<label><small><strong>Subtotal</strong></small></label>
				<label><small class="item-price">${{centsToCurrency($totalPrice)}}</small></label>
			</div>
			<div class="d-flex d-apart px-3">
				<label class="pr-4"><small><strong>Shipping</strong></small></label>
				<label><small>FREE</small></label>
			</div>
			<div class="d-flex d-apart px-3">
				<label class="pr-4"><small><strong>Discount</strong></small></label>
				<label><small></small></label>
			</div>
			<div class="d-flex d-apart px-3 py-2 mb-2" style="background-color: rgba(0,0,0,0.06)">
				<label class="m-0"><strong>Total</strong></label>
				<label class="m-0"><strong class="item-price">${{centsToCurrency($totalPrice)}}</strong></label>
			</div>
		</div>
	</div>
	<div class="row no-gutters border border-muted p-4 mb-4">
		<div class="col-12">
			<div class="mb-4">
				<p class="mb-0 text-muted mb-1"><small>ESTIMATED ARRIVAL</small></p>
				<span>5 - 10 working days</span>
			</div>
			<div class="mb-4">
				<p class="mb-0 text-muted mb-1"><small>RETURN POLICY</small></p>
				<span>We offer free shipping and returns on all US orders</span>
			</div>
			<div>
				<p class="mb-0 text-muted mb-1"><small>TAXES & DUTIES</small></p>
				<span>All taxes and fees included</span>
			</div>
		</div>
	</div>
</div>