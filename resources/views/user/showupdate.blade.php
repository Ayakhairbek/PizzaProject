@extends('layouts.app')

@section('content')
<form action="/update" method="POST">
    @csrf 
<div class="panel panel-defualt">
    <div class="panel-heading">
    <h1> UPDATE User information  </h1>
    </div> 
    <div class="panel-body"> 
        <input name="id" value="{{$userinfo->id}}" hidden>
    <h5 class="text-left"> Name : </h5> 
        <input class="form-control" type="text" name="name" value="{{$userinfo->name}}"  > 
    
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