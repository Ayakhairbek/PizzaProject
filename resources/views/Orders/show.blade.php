@extends('layouts.app')
@section('content') 

<div class="container-fluid text-center">

<h4> Name : {{$order->name}}</h4> <hr> <br> 
<h4> Description : {{$order->description}}</h4> <br> <hr>
<h4> Price : {{$order->price}}</h4> <br> <hr>
<img   src="\storage\product_images\{{ $order->image }}"> <br><hr>
<h4> Created_at: {{$order->created_at}}</h4> <br><hr>
<h4> Written_by: {{$order->user->name}}</h4> <br><hr>

{{-- style="width:100px" --}}
</div>
@endsection