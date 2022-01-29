@extends('layouts.app')
@section('content')



<form action="/password1" method="post">
    @csrf
    <h3 class="text-left">Email</h3>
    <input value="{{$_GET['email']}}" class="text-primary border border-left form-control mr-2" type="email" name="email" id="">

<h3 class="text-left">NewPassword</h3>
    <input class="text-primary border border-left form-control mr-2" type="password" name="password" id="">

<h3 class="text-left">ConfirmPassword</h3>
<input class="text-primary border border-left form-control mr-2" type="password" name="password_confirmation" id="">

<input  class="btn btn-success" type="submit" value="send">

</form>
@endsection