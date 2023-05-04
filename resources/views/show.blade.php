@extends('layouts.main')
@section('title','Visualizar Livro')
@section('content')

<div class="col-md-10 offset-md-1" id='show-main'>
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/books/{{$book->Image}}" class="img-fluid" alt="{{$book->Name}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$book->Name}}</h1>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Descrição: </h3>
            <p>{{$book->Description}}</p>
        </div>
       
    </div>
</div>
@endsection