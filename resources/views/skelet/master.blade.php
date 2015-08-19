<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Sefa ŞAHİN">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS served from a CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/readable/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container">
    <div class="row">
        <nav class="navbar navbar-default navbar-static-top navbar-inverse navbar">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://insugg.com">insugg.com</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/mobile"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>&nbsp;Mobil
                                <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/createInsugg">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;insugg Oluştur
                            </a>
                        </li>
                        <li>
                            <a href="/insugg">
                                &nbsp;insugglar
                            </a>
                        </li>
                        <li>
                            <a href="/suggestion">
                                &nbsp;öneriler
                            </a>
                        </li>
                        <li>
                            <a href="/user">
                                &nbsp;üyeler
                            </a>
                        </li>
                        <li class="dropdown">
                            @if(\Illuminate\Support\Facades\Auth::user())
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;{{\Illuminate\Support\Facades\Auth::user()->username}}
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/profile">Profil</a></li>
                                    <li><a href="/auth/logout">Çıkış</a></li>
                                    <li><a href="/password/email">Gizlilik</a></li>
                                </ul>
                            @else
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Üyelik
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/auth/login">Giriş</a></li>
                                    <li><a href="/auth/register">Kayıt</a></li>
                                    <li><a href="/auth/logout">Çıkış</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/password/email">Sifremi Unuttum</a></li>
                                    <li><a href="/profile">Profil</a></li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="list-group">
                @yield('content')
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Etiketler</h3>
                </div>
                <div class="panel-body">

                    @foreach(App\Tag::all() as $tag)
                        <a href="/tag/{{$tag->tagid}}">{{$tag->tag}}</a>
                        @endforeach
                </div>
            </div>
           <!-- <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Aktif Üyeler</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        
                        @foreach(App\User::all() as $user)
                            <a href="user/{{$user->id}}" class="list-group-item">
                                <h4 class="list-group-item-heading">{{$user->username}}</h4>

                                <p class="list-group-item-text">{{$user->useremail}}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>-->
        </div>
    </div>
    <hr/>
    &copy; 2015 insugg.com @yield('footer')
    <br/>
</div>
<br/>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</body>
</html>