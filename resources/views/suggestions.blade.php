@extends('skelet.master')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('content')
	@foreach($suggestions as $suggestion)
		<a href="suggestion/{{$suggestion->suggestionid}}" class="list-group-item">
			<h4 class="list-group-item-heading">{{$suggestion->suggestionid}}</h4>
			<p class="list-group-item-text">{{$suggestion->suggestion}}</p>
		</a>
	@endforeach
@endsection
@section('footer','buraya insuggs footer geldi.')