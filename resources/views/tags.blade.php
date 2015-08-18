@extends('skelet.master')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('content')
    @foreach($tags as $tag)
        <a href="tag/{{$tag->tagid}}" class="list-group-item">
            <h4 class="list-group-item-heading">{{$tag->tagid}}</h4>
            <p class="list-group-item-text">{{$tag->tag}}</p>
        </a>
    @endforeach
    {!! $tags->render() !!}
@endsection
@section('footer','buraya insuggs footer geldi.')