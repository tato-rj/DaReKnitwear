<div class="carousel-item {{$active ? 'active' : null}} w-100 h-100">
  <div class="bg-align-center w-100 h-100" style="background-image: url('{{asset("images/backgrounds/main-0{$background}.jpg")}}');">
    <div class="container h-100">
      <div class="row align-items-center h-100">
        <div class="col-6">
          <div class="mb-4" style="margin-top: 88px">
            <h1 class="serif" style="font-size: 62px">{{$title}}</h1>
            {{-- <p class="lead mb-0">{{$subtitle}}</p> --}}
          </div>
          <a href="{{route('products.index')}}" class="btn btn-primary btn-wide" style="padding: 14px 28px !important">SHOP NOW</a>
        </div>
      </div>
    </div>
  </div>
</div>