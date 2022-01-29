@extends('layouts.app')
@section('content')



<form action="/CheckPassword" method="post">
    @csrf
    

<h3 class="text-left">email:</h3>
<input class="text-primary border border-left form-control mr-2" type="text" name="email" id="">
{{-- <h3 class="text-left">Password</h3>
<input class="text-primary border border-left form-control mr-2" type="password" name="password" id=""> --}}

<input  class="btn btn-success" type="submit" value="send">

</form>
@endsection