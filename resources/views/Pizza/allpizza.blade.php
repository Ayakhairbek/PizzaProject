@extends('layouts.app')
@section('content')  

<table class="table table-bordered table-hover">
    <tr>
        <th>Name </th>
        <th>Size </th>
        <th>Description</th>
        <th>price</th>
        <th>image </th>
    </tr>
    @foreach ($types as $type) 
    <tr>
        <td>{{$type->name}} </td>
        <td>{{$type->size}}  </td>
        <td>{{$type->description}} </td>
        <td>{{$type->price}}  </td>
        <td>{{$type->image}} </td> 
        
    </tr>
        
    @endforeach
</table> 
<center>
<a class="btn btn-primary" href="orderto/{{$type->id}}">ORDER</a> 
</center>
@endsection