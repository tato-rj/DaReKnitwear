@if($direction == 'horizontal')
<div class="d-flex align-items-center justify-content-center">
	<img src="{{asset('images/brand/logo4.svg')}}" style="width: 140px" class="mx-2 align-bottom t-2">
</div>
@elseif($direction == 'vertical')
<div class="d-flex align-items-center flex-column justify-content-center">
	<img src="{{asset('images/brand/logo4.svg')}}" width="85">
	<div class="serif" style="font-size: {{$size}};">DA<span class="opacity-6">RE</span></div>
</div>
@endif