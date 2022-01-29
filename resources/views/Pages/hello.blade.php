@extends('layouts.app')
@section('content')  

<table class="table table-bordered table-hover">
    <tr>
        <th>Name </th>
        <th>Size</th>
        <th>Price</th>
        <th>Description</th>
        <th>image</th>
    </tr>
    @foreach ($types as $type ) 
    <tr>
        <td>{{$type->name}} </td>
        <td>{{$type->size}} </td>
        <td>{{$type->price}} </td>
        <td>{{$type->description}} </td>
        <td>{{$type->image}} </td>
        
        <td><a class="btn btn-danger" href="/deleteuser/{{ $type->id}}"> DELETE</a> </td>
    </tr>
        
    @endforeach
</table>
@endsection