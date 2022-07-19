@extends('layouts.app')
@section('content') 
<center>
<h1> Your Profile Information </h1> <hr> <br>
<h4> Name : {{$user->name}} </h4>   <br> 
<h4> Email : {{$user->email}} </h4> 
<br>
<br>
<a class="btn btn-primary" href="{{ url('/showupdateinfo') }}">UPDATE Your info </a>
</center> 
<br>
<br> 
<hr>
<center>
<h1> Your Order </h1> <hr> <br> 
</center>
<b>
<table class="table table-bordered table-hover">
    <tr>
        <th><h5>Name</h5></th>
        <th><h5>Description</h5></th>
        <th><h5>Price</h5></th>
        <th><h5>Image</h5></th>
        <th><h5>Actions</h5></th>
    </tr>

    @foreach ($orders as $order)
       <tr>
        <td><h5> <a href="{{route('orders.show',$order->id)}}">{{ $order->name}}</a></td>
       
        
        <td><h5>{{ $order->description }}</h5></td>  
        <td><h5>{{ $order->price }}</h5></td> 
        <td><h5>{{ $order->image }}</h5></td>  
        
        <td> 
            <form action="{{ route ('orders.destroy',$order->id)}}" method="POST"> 
                @csrf
                @method('DELETE')
            <input class="btn btn-danger" type="submit" value="DELETE" > <br>
            </form>
            {{-- <a class="btn btn-primary" href="/orders/{{$order->id}}/edit">UPDATE </a>  --}}
         </td>
    </tr> 
    @endforeach
</table>
@endsection 