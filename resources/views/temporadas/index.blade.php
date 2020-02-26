@extends('layout')
@section('cabecalho')
    temporadas de {{$serie->nome}}
@endsection
@section('conteudo')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
            <li class="list-group-item">temporada {{$temporada->numero}}</li>
        @endforeach
    </ul>
@endsection

