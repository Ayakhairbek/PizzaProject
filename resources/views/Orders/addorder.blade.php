@extends('layouts.app')
@section('content')
<form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="panel panel-defualt">
    <div class="panel-heading">
        <h1> Add Order</h1>
    </div>
    <div class="panel-body">
        <h5 class="text-left">Name :</h5>
        <input class="form-control" type="text" name="name" >
        
        <input class="btn btn-success" type="submit" value="ADD" > 
    </div>
    <div class="panel-footer">
        All Rights Reserved
    </div>
</div>
</form>
@endsection