@extends('layouts.app')
@section('content')
<table class="table table-bordered table-hover">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>

    @foreach ($orders as $order)
       <tr>
        <td> <a href="{{route('orders.show',$order->id)}}">{{ $order->name}}</a></td>
        {{-- <td> <a href="/products/{{$product->id)}}">{{ $product->name}}</a></td>   --}}
        
        <td>{{ $order->description }}</td>  
        <td>{{ $order->price }}</td> 
        <td>{{ $order->image }}</td>  
        
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