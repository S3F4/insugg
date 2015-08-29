@extends('skelet.user')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('profile')
    <div style="text-align: center;">
        {{$user->useremail}}
        <br/>
        {{$user->username}}
    </div>

    <br/>
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation"><a href="/user/{{$user->userid}}/insuggs">Insuggs</a></li>
        <li role="presentation"><a href="/user/{{$user->userid}}/suggestions">Suggestions</a></li>
        <li role="presentation"><a href="#">Messages</a></li>
    </ul>
@endsection
@section('content')
    @if(isset($insuggs))
        @foreach($insuggs as $insugg)
            <a href="/insugg/{{$insugg->insuggid}}" class="list-group-item">
                <p class="list-group-item-text">{{$insugg->insugg}}</p>
            </a>
        @endforeach
        {!! $insuggs->render() !!}
    @endif
    @if(isset($suggestions))
        @foreach($suggestions as $suggestion)
            <a href="/suggestion/{{$suggestion->suggestionid}}" class="list-group-item">
                <p class="list-group-item-text">{{$suggestion->suggestion}}</p>
            </a>
        @endforeach
        {!! $suggestions->render() !!}
    @endif
@endsection

@section('footer','buraya insuggs footer geldi.')