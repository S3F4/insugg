@extends('skelet.master')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('content')
    @foreach($insuggs as $insugg)
    <a href="/insugg/{{$insugg->insuggid}}" class="list-group-item">
        <p class="list-group-item-text">{{$insugg->insugg}}</p>
    </a>
    @endforeach
    {!! $insuggs->render() !!}
@endsection
@section('footer','buraya insuggs footer geldi.')