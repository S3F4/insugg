@extends('skelet.master')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('content')
    @foreach($insuggs as $insugg)
    <a href="insugg/{{$insugg->insuggid}}" class="list-group-item">
        <h4 class="list-group-item-heading">{{$insugg->insuggid}}</h4>
        <p class="list-group-item-text">{{$insugg->insugg}}</p>
    </a>
    @endforeach
@endsection
@section('footer','buraya insuggs footer geldi.')