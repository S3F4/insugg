@extends('skelet.master')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('rightHead')
<ul class="nav navbar-nav navbar-right">
	<li>
		<a href="#">
			<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;insugg Oluştur
		</a>
	</li>
	<li>
		<a href="insugg">
			&nbsp;insugglar
		</a>
	</li>
	<li>
		<a href="suggestion">
			&nbsp;öneriler
		</a>
	</li>
	<li>
		<a href="user">
			&nbsp;üyeler
		</a>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
		   aria-expanded="false">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Üyelik
			<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="#">Action</a></li>
			<li><a href="#">Another action</a></li>
			<li><a href="#">Something else here</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="#">Separated link</a></li>
		</ul>
	</li>
</ul>
@endsection
@section('content')
<a href="#" class="list-group-item">
	<h4 class="list-group-item-heading">insugg</h4>

	<p class="list-group-item-text">insugg</p>
</a>
@endsection
@section('tags')
tag content
@endsection
@section('users')
<a href="#" class="list-group-item">
	<h4 class="list-group-item-heading">List group item heading</h4>

	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
		varius blandit.</p>
</a>
<a href="#" class="list-group-item">
	<h4 class="list-group-item-heading">List group item heading</h4>

	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
		varius blandit.</p>
</a>
@endsection
@section('footer','buraya insuggs footer geldi.')