<div class="modal fade" id="sold-out" tabindex="-1" role="dialog">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Let me know when it's back</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('products.notify')}}">
          @csrf
          <input type="hidden" name="product_name" value="{{$product->name}}">
          <input type="hidden" name="product_color" value="{{slug_str($color)}}">
          <input type="hidden" name="product_size" class="nofity-size">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Your name">
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Your email">
          </div>
          <div class="bg-light border py-3 px-4 my-4">
            <div class="d-flex flex-wrap">
              <div class="mr-4">
                <div><small><strong>Name</strong></small></div>
                <div>{{$product->name}}</div>
              </div>
              <div class="mr-4">
                <div><small><strong>Color</strong></small></div>
                <div>{{slug_str($color)}}</div>
              </div>
              <div">
                <div><small><strong>Size</strong></small></div>
                <div><span class="notify-size text-uppercase"></span></div>
              </div>
            </div>
          <button type="submit" class="btn btn-block btn-outline-dark">KEEP ME IN THE LOOP</button>
        </form>
      </div>
    </div>
  </div>
</div>