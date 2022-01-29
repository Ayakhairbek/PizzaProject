@extends('layouts.app')
@section('content')
<form action="/addpizza" method="POST" enctype="multipart/form-data">
@csrf
<div class="panel panel-defualt">
    <div class="panel-heading">
        <h1> Add Pizza</h1>
    </div>
    <div class="panel-body">
        <h5 class="text-left">Name :</h5>
        <input class="form-control" type="text" name="name" > 
        <h5 class="text-left">Description :</h5>
        <input class="form-control" type="text" name="description" >
        <h5 class="text-left">Size :</h5>
        <input class="form-control" type="text" name="size" >
        <h5 class="text-left">Image:</h5>
        <input class="form-control" type="file" name="image" >
        <h5 class="text-left">Price :</h5>
        <input class="form-control" type="text" name="price" >
        
        <input class="btn btn-success" type="submit" value="ADD" > 
    </div>
    <div class="panel-footer">
        All Rights Reserved
    </div>
</div>
</form>
@endsection