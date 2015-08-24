@extends('skelet.user')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('profile')
    {{
    $user->useremail
    }}
    <br />
    {{
    $user->username
    }}
    <br />

@endsection
@section('content')
    @if(isset($insuggs))
        @foreach($insuggs as $insugg)
            <a href="/insugg/{{$insugg->insuggid}}" class="list-group-item">
                <h4 class="list-group-item-heading">{{$insugg->insuggtitle}}</h4>

                <p class="list-group-item-text">{{$insugg->insuggcontent}}</p>
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