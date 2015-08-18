@extends('skelet.master')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('content')
    @foreach($users as $user)
    <a href="user/{{$user->userid}}" class="list-group-item">
        <h4 class="list-group-item-heading">{{$user->useremail}}</h4>

        <p class="list-group-item-text">{{$user->username}}</p>
    </a>
    @endforeach
    {!! $users->render() !!}
@endsection

@section('footer','buraya insuggs footer geldi.')