@extends('layouts.app')

@section('content')
<form action="/updateinfo" method="POST">
    @csrf 
<div class=" panel panel-defualt">
    <div class="panel-heading">
    <h1> UPDATE your information  </h1>
    </div> 
    <div class="panel-body">
    <h5 class="text-left"> Name : <h5> 
        <input class="form-control" type="text" name=" name" value="{{$user->name}}"  > 
     <h5 class="text-left"> E-mail: <h5> <br> 
            <input class="form-control" type="email" name="email" value=" {{$user->email}}"> 
            <br>
            <br>
            <br>
          <input class="btn btn-success" type="submit" value="UPDATE" > <a class=" btn btn-primary" href="/showchangepassword"> Chang password </a>
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