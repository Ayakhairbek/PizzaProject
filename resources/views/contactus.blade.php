@extends('layouts.app')
@section('content')


<section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

<div class="slider-item" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
  <div class="container">
    <div class="row slider-text justify-content-center align-items-center">

      <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Contact Us</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="/hello">Home</a></span> <span>Contact</span></p>
      </div>

    </div>
  </div>
</div>
</section>

<form action="/send" method="POST">
    @csrf
<h3 class="text-left">name:</h3>
<input class="text-primary border border-left form-control mr-2" type="text" name="name" id="">
<h3 class="text-left">email:</h3>
<input class="text-primary border border-left form-control mr-2" type="text" name="email" id="">
<h3 class="text-left">message:</h3>
<textarea class="text-primary border border-left form-control mr-2" name="messege" id="" cols="30" rows="10"></textarea><br>

<input  class="btn btn-success" type="submit" value="send">

</form>
@endsection