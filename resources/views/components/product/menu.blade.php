@foreach($sections as $section)
<span class="{{$loop->last ? null : 'mr-3'}} cursor-pointer {{$loop->first ? 'border-bottom border-dark' : 'text-muted'}}" data-target="#overview-{{str_slug($section)}}">{{$section}}</span>
@endforeach