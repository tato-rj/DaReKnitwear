<div class="col-12 border-top pt-5">
	<h2 class="text-center serif mb-4">{{$title}}</h2>
	<div class="d-flex custom-scroll" style="overflow: auto">
    @foreach($suggestions as $item)        
        @include('components.product.card', [
            'inventory' => $item,
            'product' => $item->product,
            'images' => $item->product->imagesByColor($item->color)])
    @endforeach
    </div>
</div>