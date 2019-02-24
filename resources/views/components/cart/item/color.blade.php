<div class="product-color d-flex align-items-center {{$fontSize == 'small' ? 'text-muted' : null}}" style="font-size: {{$fontSize == 'small' ? '80%' : '100%'}}">
	Color: <label class="m-1 {{$item->color}} mx-2" title="{{slug_str($item->color)}}"></label>
</div>