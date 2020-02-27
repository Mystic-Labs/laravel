@extends('layout')
@section('cabecalho')
    Episodios
@endsection
@section('conteudo')
    <form action="" class="">
    <ul class="list-group">
        @foreach($episodios as $episodio)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                episodio {{$episodio->numero}}
                <input type="checkbox">
            </li>
        @endforeach
    </ul>
    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
@endsection
