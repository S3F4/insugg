@extends('skelet.master')
@section('title','Baslik')
@section('description','Description')
@section('keywords','Keywords')
@section('content')
    <div class="row">
        <form role="form" method="post" action="createInsugg">
            <div>
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="InputMessage">Insugg :</label>
                    <div class="input-group">
                        <textarea name="insugg" id="InputMessage" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Etiketler</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="InputEmailFirst" name="tags" placeholder="etiketler" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>
@endsection
@section('footer','buraya insuggs footer geldi.')