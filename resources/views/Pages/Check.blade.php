@extends('layouts.app')
@section('content')



<form action="/password1" method="POST">
    @csrf
<h3 class="text-left">NewPassword</h3>
    <input class="text-primary border border-left form-control mr-2" type="password" name="password" id="">

<h3 class="text-left">ConfirmPassword</h3>
<input class="text-primary border border-left form-control mr-2" type="confirmpassword" name="password" id="">

<input  class="btn btn-success" type="submit" value="send">

</form>
@endsection