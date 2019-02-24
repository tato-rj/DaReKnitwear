<div class="accordion" id="product-details">
  <div class="card border-0 border-bottom">
    <div class="card-header bg-white px-0 d-apart cursor-pointer" data-toggle="collapse" data-target="#description" style="border: 0">
		<p class="mb-0"><strong>Description</strong></p>
		<div><i class="fas fa-caret-down"></i></div>
    </div>

    <div id="description" class="collapse" data-parent="#product-details">
      <div class="card-body px-2 py-0 mb-4">
      	<div class="text-muted"><small><i class="fas fa-tshirt mr-1"></i>100% Cashmere</small></div>
      	<div class="text-muted"><small><i class="fas fa-pencil-ruler mr-2"></i>Manufactured in Treviso, IT <a href="#" class="link-secondary">(visit the factory)</a></small></div>
      	<div class="text-muted"><small><i class="fas fa-dog mr-2"></i>Wool from Lucca, IT <a href="#" class="link-secondary">(visit the farm)</a></small></div>
      	<div class="text-muted"><small><i class="fas fa-envelope mr-2"></i>Questions? <a href="mailto:email@email.com" class="link-secondary">Let us know</a></small></div>
      </div>
    </div>
  </div>

  <div class="card border-0 border-bottom">
    <div class="card-header cursor-pointer bg-white px-0 border-top d-apart" data-toggle="collapse" data-target="#details" style="border: 0">
		<p class="mb-0"><strong>Specifications</strong></p>
		<div><i class="fas fa-caret-down"></i></div>
    </div>
    <div id="details" class="collapse" data-parent="#product-details">
      <div class="card-body px-2 py-0 mb-4"><small>{{loremText(6,8)}}</small>
      </div>
    </div>
  </div>  

  <div class="card border-0">
    <div class="card-header cursor-pointer bg-white px-0 border-top d-apart" data-toggle="collapse" data-target="#care" style="border: 0">
    <p class="mb-0"><strong>Care & Maintenance</strong></p>
    <div><i class="fas fa-caret-down"></i></div>
    </div>
    <div id="care" class="collapse" data-parent="#product-details">
      <div class="card-body px-2 py-0 mb-4"><small>{{loremText(2,5)}}</small>
      </div>
    </div>
  </div>
</div>