@extends('layouts.app')
@section('content')  


<section class="ftco-section">
  <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section ftco-animate text-center">
      <h2 class="mb-4">YOUR DashBord</h2>
      <p>All Users , pizzas and orders In Your Website here.</p>
    </div>
  </div>
  </div>
  <div class="container-wrap">
  <h3 class="mb-4">All User In Your Website</h3>
      <div class="row no-gutters d-flex">
          <div class="col-lg-4 d-flex ftco-animate">
          @foreach ($allusers as $alluser )
              <div class="services-wrap d-flex">
                  
                  <div class="text p-4">
                      <h4>{{$alluser->name}} </h4> 
                     
                      <h5>{{$alluser->email}}</h5>
                      <td><a class="btn btn-danger" href="/deleteuser/{{ $alluser->id}}"> DELETE</a> <a class="btn btn-primary" href="/showupdate/{{$alluser->id}}">EDIT </a> </td>
                  </div>
              </div>
              @endforeach 
              
</div>
</div>
</div>
<center>
<a class="btn btn-primary" href="/showadduser">ADD NEW USER</a>
</center>
</section>
<section >
 
  <div class="container-wrap">
  <h3 class="mb-4">All Pizzas In Your Website</h3>
      <div class="row no-gutters d-flex">
          <div class="col-lg-4 d-flex ftco-animate">
          @foreach ($pizzas as $pizza)
              <div class="services-wrap d-flex">
              <div>{{$pizza->image}}</div>
                  
                  <div class="text p-4">
       <h4>{{$pizza->name}} </h4>
      
        <h6>{{$pizza->price}}  </h6>
        
        <a class="btn btn-danger" href="/deletepizza/{{ $pizza->id}}"> DELETE</a> <a class="btn btn-primary" href="/showupdatepizza/{{$pizza->id}}">EDIT </a>  
                      
             </div>
              </div>
              @endforeach 
              
</div>
</div>
</div>
<center>
<a class="btn btn-primary" href="/showaddpizza">ADD NEW Pizza</a>
</center>
</section>

 <br>
 <br>
 <br>

<div class="container-wrap">
  <h3 class="mb-4">All Orders In Your Website</h3>
  <br>
  
<table class="table table-bordered table-hover">
    <tr> 
        
        <th><h5>Name</h5> </th>
        <th><h5>Size </h5></th>
        <th><h5>Description</h5></th>
        <th><h5>price</h5></th>
        <th><h5>image </h5></th>
        <th><h5>Action </h5> </th> 
       
    </tr>
    @foreach ($orders as $order) 
    <tr>
        <td><h5>{{$order->name}} </h5></td>
        <td><h5>{{$order->size}} </h5> </td>
        <td><h5>{{$order->description}}</h5> </td>
        <td><h5>{{$order->price}}  </h5></td>
        <td><h5>{{$order->image}} </h5></td> 
        <td><h5><a class="btn btn-primary" href="/accept/{{ $order->id}}">Accept</a> <a class="btn btn-danger" href="/deleteorder/{{ $order->id}}"> DELETE</a>
    </tr>
        
    @endforeach
</div>
</table>
@endsection