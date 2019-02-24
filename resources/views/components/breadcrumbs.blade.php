<div class="row mb-4">
	<div class="col-12">
	  <ol class="breadcrumb bg-white p-0">
	  	@foreach($pages as $page)
	    <li class="breadcrumb-item {{$loop->last ? 'active' : null}}">
	    	@if($loop->last)
	    	{{$page['name']}}
	    	@else
	    	<a href="{{$page['url']}}" class="link-none"><strong>{{$page['name']}}</strong></a>
	    	@endif
	    </li>
	  	@endforeach
	  </ol>
	</div>
</div>