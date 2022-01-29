@extends('layouts.app')

@section('content')
<form action="/order" method="POST">
    @csrf 
<div class="panel panel-defualt">

    <div class="panel-heading"> 
  
    <h1>Enter the type again to confirm : </h1>
    </div> 
    <div class="panel-body"> 
        <input name="pizz_id" value="{{$pizz->id}}" hidden>
         <select class= "form-control" name="user_id" required>
         <option> </option> 
         @foreach ($pizzas as $pizza )
         <option value="{{$pizza->id}}"> {{$pizza->name}} </option>
             
         @endforeach 
         
         
             
         
         </select> 
         <br>
         <br>
         <br>
         <center>
          <input class="btn btn-success" type="submit" value="Order" > 
         </center>
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