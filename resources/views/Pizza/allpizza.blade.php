@extends('layouts.app')
@section('content')  


<section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

<div class="slider-item" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
  <div class="container">
    <div class="row slider-text justify-content-center align-items-center">

      <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Our Menu</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="/hello">Home</a></span> <span>Menu</span></p>
      </div>

    </div>
  </div>
</div>
</section>

  <section class="ftco-section">
  <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section ftco-animate text-center">
      <h2 class="mb-4">Our Menu</h2>
      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    </div>
  </div>
  </div>
  <div class="container-wrap">
      <div class="row no-gutters d-flex">
          <div class="col-lg-4 d-flex ftco-animate">
          @foreach ($types as $type) 
              <div class="services-wrap d-flex">
              <span>{{$type->image}}</span>
                  <div class="text p-4">
                      <h3>{{$type->name}} </h3>
                      <p>{{$type->description}}</p>
                      <p class="price"><span>{{$type->price}}</span> <a href="orderto/{{$type->id}}" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
                  </div>
              </div>
              @endforeach
</div>
</div>
</div>
</section>
@endsection