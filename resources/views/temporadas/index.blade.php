@extends('layout')
@section('cabecalho')
    temporadas de {{$serie->nome}}
@endsection
@section('conteudo')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between">
                <a href="/temporadas/{{$temporada->id}}/episodios">
                temporada {{$temporada->numero}}
                </a>
                <span class="badge badge-secondary">
                    0/{{$temporada->episodios->count()}}
                </span>
            </li>
        @endforeach
    </ul>
@endsection

