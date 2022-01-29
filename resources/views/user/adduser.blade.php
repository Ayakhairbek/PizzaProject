@extends('layouts.app')
@section('content')
<form action="/adduser" method="POST" enctype="multipart/form-data">
@csrf
<div class="panel panel-defualt">
    <div class="panel-heading">
        <h1> Add User</h1>
    </div>
    <div class="panel-body">
        <h5 class="text-left">Name :</h5>
        <input class="form-control" type="text" name="name" > 
        <h5 class="text-left">Email :</h5>
        <input class="form-control" type="email" name="email" >
        <h5 class="text-left">Password :</h5>
        <input class="form-control" type="password" name="password" >
        <h5 class="text-left">Role:</h5>
        <input class="form-control" type="text" name="role" >
        
        <input class="btn btn-success" type="submit" value="ADD" > 
    </div>
    <div class="panel-footer">
        All Rights Reserved
    </div>
</div>
</form>
@endsection