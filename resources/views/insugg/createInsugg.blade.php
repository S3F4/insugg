@extends('skelet.master')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('content')
    <form method="post" action="createInsugg">
        Insugg <textarea></textarea><br />
        <input type="submit" value="Gönder" />
    </form>
@endsection
@section('footer','buraya insuggs footer geldi.')