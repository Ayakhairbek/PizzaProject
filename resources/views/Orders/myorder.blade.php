@extends('layouts.app')
@section('content') 


<section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

<div class="slider-item" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
  <div class="container">
    <div class="row slider-text justify-content-center align-items-center">

      <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Your Orders</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="/hello">Home</a></span> <span>your order</span></p>
      </div>

    </div>
  </div>
</div>
</section>

  <section class="ftco-section">
  <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section ftco-animate text-center">
      <h2 class="mb-4">Your Orders</h2>
  </div>
  </div>
  <div class="container-wrap">
      <div class="row no-gutters d-flex">
          <div class="col-lg-4 d-flex ftco-animate">
         
          @foreach ($orders as $order)
              <div class="services-wrap d-flex">
                  <div>{{$order->image}}</div>
                  <div class="text p-4">
                      <h3>{{$order->name}} </h3>
                      <p>{{$order->description}}</p>
                      <p class="price"><span>{{$order->price}}</span> 
                      <form action="{{ route ('orders.destroy',$order->id)}}" method="POST"> 
                         @csrf
                      @method('DELETE')
                     <input class="btn btn-danger" type="submit" value="DELETE" > <br>
                     </form>
                  </div>
                  
              </div>
              @endforeach
</div>
</div>
</div>
</section>
@endsection

