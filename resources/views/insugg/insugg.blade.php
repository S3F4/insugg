@extends('skelet.master')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('content')
    <div class="list-group-item">
        <h4 class="list-group-item-heading">
            {{$insugg->insuggtitle}}
        </h4>
        <p class="list-group-item-text">{{$insugg->insuggcontent}}</p>
    </div>
    @foreach($suggestions as $suggestion)
        <a href="insugg/{{$suggestion->suggestionid}}" class="list-group-item">
            <h4 class="list-group-item-heading">{{$suggestion->suggestion}}</h4>
        </a>
    @endforeach
@endsection
@section('footer','buraya insuggs footer geldi.')