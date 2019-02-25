<div class="carousel-item {{$active ? 'active' : null}} w-100 h-100">
  <div class="bg-align-center w-100 h-100" style="background-image: url('{{asset("images/backgrounds/main-0{$background}.jpg")}}'); background-position-y:120px ">
    <div class="row align-items-center h-100">
      <div class="col-9 mx-auto">
        <div class="text-center text-white" style="margin-top: 146px">
          <p class="display-4 serif" style="font-size: 3em">{{$title}}</p>
          {{-- <p class="display-4 serif mb-0">{{$subtitle}}</p> --}}
        </div>
        {{-- <a href="{{route('products.index')}}" class="btn btn-primary btn-wide btn-lg">SHOP NOW</a> --}}
      </div>
    </div>
  </div>
</div>