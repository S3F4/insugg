@extends('skelet.master')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('content')
<div class="col-md-5">
    <form class="form-signin" method="POST" action="/auth/login">
        {!! csrf_field() !!}
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="useremail" value="{{ old('useremail') }}">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password" id="password">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me" name="remember"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>


@endsection
@section('footer','buraya insuggs footer geldi.')

