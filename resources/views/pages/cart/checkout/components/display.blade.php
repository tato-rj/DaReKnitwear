@foreach($cart as $items)
<div class="item cart-item d-flex {{! $loop->last ? 'border-bottom mb-3 pb-3' : null}}">
	@include('pages.cart.checkout.components.item', ['item' => $items->first(), 'quantity' => $items->count()])
</div>
@endforeach