@extends('layouts.app')

@section('content')
<form action="/updatepizza" method="POST">
    @csrf 
<div class="panel panel-defualt">
    <div class="panel-heading">
    <h1> UPDATE User information  </h1> 
</div>
<div class="panel-body"> 
    <input name="id" value="{{$pizza->id}}" hidden>
        <h5 class="text-left">Name :</h5>
        <input class="form-control" type="text" name="name" value="{{$pizza->name}}" > 
        <h5 class="text-left">Description :</h5>
        <input class="form-control" type="text" name="description" value="{{$pizza->description}}" >
        <h5 class="text-left">Size :</h5>
        <input class="form-control" type="text" name="size" value="{{$pizza->size}}" >
        <h5 class="text-left">Image:</h5>
        <input class="form-control" type="file" name="image" value="{{$pizza->image}}"  >
        <h5 class="text-left">Price :</h5>
        <input class="form-control" type="text" name="price" value="{{$pizza->price}}"  >
        <input class="btn btn-success" type="submit" value="UPDATE" >
        
    
    </div>
      
    <br>
    <br>
    <br>
    <div class= "panel-footer">
     All Right Reserved 
    </div> 
</div>



</form>   

@endsection