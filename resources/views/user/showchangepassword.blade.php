@extends('layouts.app')

@section('content')
<form action="/changepassword" method="POST">
    @csrf 
<div class=" panel panel-defualt">
    <div class="panel-heading">
    <h1> Change your password  </h1>
    </div> 
    <div class="panel-body">
    <h5 class="text-left"> Old Password : <h5> 
        <input class="form-control" type="password" name="OldPassword" > 
     <h5 class="text-left"> New Password: <h5> <br> 
            <input class="form-control" type="password" name="NewPassword" > 
            <br>
            <br>
            <br>
          <input class="btn btn-success" type="submit" value="Change" > 
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