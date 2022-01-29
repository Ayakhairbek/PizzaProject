@extends('layouts.app')
@section('content')  

<table class="table table-bordered table-hover">
    <tr>
        <th>Name </th>
        <th>Email </th>
        
    </tr>
    @foreach ($allusers as $alluser ) 
    <tr>
        <td>{{$alluser->name}} </td>
        <td>{{$alluser->email}}  </td>
       
    </tr>
        
    @endforeach
</table> 
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