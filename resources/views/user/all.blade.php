@extends('layouts.app')
@section('content')  

<table class="table table-bordered table-hover">
    <tr>
        <th>Name </th>
        <th>Email </th>
        <th>Actions</th>
    </tr>
    @foreach ($allusers as $alluser ) 
    <tr>
        <td>{{$alluser->name}} </td>
        <td>{{$alluser->email}}  </td>
         <td><a class="btn btn-danger" href="/deleteuser/{{ $alluser->id}}"> DELETE</a> <a class="btn btn-primary" href="/showupdate/{{$alluser->id}}">EDIT </a> </td>
    </tr>
        
    @endforeach 
</table> 
<br>
<br> 
<center>
<a class="btn btn-primary" href="/showadduser">ADD USER</a>
</center>
<br>
<br> 
 

 

<table class="table table-bordered table-hover">
    <tr>
        <th>Name </th>
        <th>Size </th>
        <th>Description</th>
        <th>price</th>
        <th>image </th>
    </tr>
    @foreach ($pizzas as $pizza) 
    <tr>
        <td>{{$pizza->name}} </td>
        <td>{{$pizza->size}}  </td>
        <td>{{$pizza->description}} </td>
        <td>{{$pizza->price}}  </td>
        <td>{{$pizza->image}} </td> 
        <td><a class="btn btn-danger" href="/deletepizza/{{ $pizza->id}}"> DELETE</a> <a class="btn btn-primary" href="/showupdatepizza/{{$pizza->id}}">EDIT </a> </td>
    </tr>
        
    @endforeach
</table>
<br>
<br> 
<center>
<a class="btn btn-primary" href="/showaddpizza">ADD PIZZA</a>
</center>
<br>
<br> 
<table class="table table-bordered table-hover">
    <tr> 
        
        <th>Name </th>
        <th>Size </th>
        <th>Description</th>
        <th>price</th>
        <th>image </th>
        <th>Action </th> 
       
    </tr>
    @foreach ($orders as $order) 
    <tr>
        <td>{{$order->name}} </td>
        <td>{{$order->size}}  </td>
        <td>{{$order->description}} </td>
        <td>{{$order->price}}  </td>
        <td>{{$order->image}} </td> 
        <td><a class="btn btn-primary" href="/accept/{{ $order->id}}">Accept</a> <td><a class="btn btn-danger" href="/deleteorder/{{ $order->id}}"> DELETE</a>
    </tr>
        
    @endforeach
</table>
@endsection