@extends('skelet.master')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('content')
    @foreach($users as $user)
    <a href="user/{{$user->id}}" class="list-group-item">
        <h4 class="list-group-item-heading">{{$user->email}}</h4>

        <p class="list-group-item-text">{{$user->name}}</p>
    </a>
    @endforeach
@endsection

@section('footer','buraya insuggs footer geldi.')