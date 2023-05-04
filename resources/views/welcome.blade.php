@extends('layouts.main')
@section('title','Pedro e Livros')
@section('content')

    <h1>Livros Adicionados</h1>

    @foreach ($books as $book)
        <div class="card col-md-3">
            <img class="img-fluid" src="/img/books/{{ $book->Image }}" alt="{{ $book->Name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $book->Name }}</h5>
                
                <a href="{{route('book.show',['book'=>$book->id])}}" class="btn btn-primary">Saiba Mais...</a>
                <a href="{{route('book.edit',['book'=>$book->id])}}" class="btn btn-primary">Editar Livro</a>
                <form action="{{route('book.destroy',['book'=>$book->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                </form>
            </div>
        </div>
    @endforeach
    @if(count($books)==0)
        <h3>Nenhum livro foi adicionado</h3>
    @endif
    <p>Cadastrar um <a href="{{route('book.create')}}">LIVRO</a></p>
@endsection