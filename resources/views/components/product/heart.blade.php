@auth
<h5 class="far fa-heart m-0 cursor-pointer text-muted heart animated-fast" 
	data-url="{{route('wishlist.update')}}"
	data-product-id="{{generateProductId($product->name . 'xl')}}"></h5>
@else
<a href="{{route('login')}}" class="link-none">
	<h5 class="far fa-heart m-0 cursor-pointer text-muted heart animated-fast"></h5>
</a>
@endauth