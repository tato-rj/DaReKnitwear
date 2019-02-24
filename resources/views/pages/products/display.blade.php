<div class="row products-container" style="opacity: 0;">

    @foreach($products as $item)        
        @include('components.product.card', [
            'product' => $item->product,
            'images' => $item->product->imagesByColor($item->color)])
    @endforeach
    
</div>