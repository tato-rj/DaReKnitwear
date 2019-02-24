@extends('layouts.app')

@section('content')

<div class="container no-lead mb-7">
	@include('components.breadcrumbs', ['pages' => [
		['name' => 'Home', 'url' => route('home')],
		['name' => 'Shop', 'url' => route('products.index')],
		['name' => $product->name]
	]])

	<div class="row mb-6">
		@include('pages.products.show.images')

		@include('pages.products.show.information')
	</div>
	<div class="row mb-6">
		@include('pages.products.show.details')
	</div>
	<div class="row mb-6">
		@include('pages.products.show.features')
	</div>
	<div class="row mb-6">
		@include('components.product.carousel.layout', ['title' => 'You may also like'])
	</div>
</div>

@include('pages.products.show.sections.reviews')

{{-- @include('components.bars.origin') --}}

@include('components.modals.size-guide')

@include('components.modals.sold-out')

@include('components.modals.review')

@endsection

@push('js')
<script type="text/javascript">
$('#reviews-collapse').on('shown.bs.collapse', function () {
  $('#reviews-container button.toggle-collapse').text('Show less');
});	

$('#reviews-collapse').on('hidden.bs.collapse', function () {
  $('#reviews-container button.toggle-collapse').text('Show all');
});	
</script>

<script type="text/javascript">
$('.zoom-image').on('click', function() {
	let $image = $(this);
	let cursor = $image.css('cursor');

	$image.toggleClass('zoomed-in');
	$image.children().last().fadeToggle('fast');
	cursor == 'zoom-in' ? $image.css('cursor', 'zoom-out') : $image.css('cursor', 'zoom-in');
});

$('.zoom-image').on('mousemove click', function(event) {
	let $image = $(this);
	let ratio = $image.height()/$image.width();

	let xPos = (event.pageX - ($image.offset().left + $image.width() / 2)) * -1;
	let yPos = (event.pageY - ($image.offset().top + $image.height() / 2)) * -1;

	$image.children().last().css({'top': yPos/ratio, 'left': xPos/ratio});
});

$('.preview-image').on('click', function() {
	$preview = $(this);
	$('.zoom-image').children('img').attr('src', $preview.attr('src'));
	$preview.siblings().removeClass('border');
	$preview.addClass('border');
});
 
let $addButton = $('.cart-add-container').children().first();
let $notifyButton = $('.cart-add-container').children().last();

$('.product-size label:not(.sold-out)').on('click', function() {
	let $element = $(this);	
	let size = $element.attr('data-value');
	let count = $element.attr('data-count');

	updateAddButton(size);

	lowStockAlert(count);

	toggleButtons(this);

	$addButton.removeClass('force-hide btn-disabled').addClass('btn-primary').attr('data-size', size).show();
	$notifyButton.removeClass('force-show').hide();

	$addButton.children().first().hide();
	$addButton.children().last().show();
});

$('.product-size label.sold-out').on({
	mouseenter: function() {
		$addButton.not('.force-hide').hide();
		$notifyButton.not('.force-show').show();
	},
	mouseleave: function() {
		$addButton.not('.force-hide').show();
		$notifyButton.not('.force-show').hide();
	},
	click: function() {
		$('input.notify-size').val($(this).attr('data-value'));
		$('span.notify-size').text($(this).attr('data-value'));
		toggleButtons(this);
		$addButton.hide().addClass('force-hide');
		$notifyButton.show().addClass('force-show');
		$('#size-count').hide();
	}
});

function toggleButtons(button) {
	$(button).siblings().removeClass('selected');
	$(button).addClass('selected');	
}

function lowStockAlert(count) {
	if (count <= 2) {
		$('#size-count span').text(count);
		$('#size-count').show();
	} else {
		$('#size-count').hide();		
	}
}

function updateAddButton(size) {
	let $addButton = $('button.cart-add');
	let url = $addButton.attr('data-url');
	
	$addButton.attr('data-url', url + '&size=' + size);
}

$('#new-review .stars .fa-star').on('click', function(){
	$star = $(this);

	$star.parent().children().removeClass('text-grey').addClass('text-warning');
	$star.removeClass('far').addClass('fas');
	$star.prevAll().removeClass('far').addClass('fas');
	$star.nextAll().addClass('far').removeClass('fas');

	$('input[name="rating"]').val($star.index() + 1);
});

</script>
@endpush