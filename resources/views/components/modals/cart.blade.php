<div class="modal right fade" data-url="{{route('cart.show')}}" id="cart-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content border-0">
      <div class="modal-header px-5 pt-5 border-0" style="display: block">
        <h5 class="modal-title"><strong>YOUR CART</strong></h5>
      </div>

      <div class="cart-empty p-5" style="display: {{auth()->check() ? 'none' : 'block'}}">
        <p class="lead text-center text-muted"><i>Your car is empty.</i></p>  
      </div>

      <div class="modal-body px-5 pt-3 cart" style="overflow-y: scroll; display: {{auth()->check() ? 'block' : 'none'}}">

      </div>
      <div class="cart-checkout py-4 px-5" style="display: {{auth()->check() ? 'block' : 'none'}}">
          <div class="w-100 mb-4">
            <div class="d-flex justify-content-between mb-2 align-items-center">
              <div><h5 class="m-0">TOTAL</h5></div>
              <div><h5 class="m-0"><strong class="cart-price"></strong></h5></div>
            </div>
            <div class="text-center" style="line-height: 1.2">
              <small>Free shipping on all domestic orders.<br>Shipping internationally? <a href="#" class="link-secondary">Learn more</a></small>
            </div>
          </div>
          <a href="{{route('cart.checkout.step1')}}" id="checkout-link" class="btn btn-primary btn-block mx-0 mb-2"><i class="fas fa-lock mr-2"></i>CHECKOUT</a>
          <a href="{{route('cart')}}" id="cart-link" class="btn btn-outline-dark btn-block m-0"><i class="fas fa-shopping-cart mr-2"></i>GO TO CART</a>
      </div>
    </div>
  </div>
</div>