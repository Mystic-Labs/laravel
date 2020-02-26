@extends('layout')
@section('cabecalho')
    series
@endsection
@section('conteudo')
    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{$mensagem}}
        </div>
    @endif
    <a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-2"> add</a>
    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="nome-serie-{{ $serie->nome  }}"> {{ $serie->nome  }}</span>
                <div class="input-group w-50" hidden id="input-nome-serie-{{$serie->nome}}">
                    <input type="text" class="form-control" value="{{ $serie->nome  }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSerie({{ $serie->nome  }})">
                        <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                <span class="d-flex">
                        <a href="/series/{{ $serie->id  }}/temporadas" class="btn btn-info btn-sm mr-1">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        <form method="post" action="/series/{{ $serie->id  }}" onsubmit="return confirm('Tem certeza?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                        </form>
                </span>
            </li>

        @endforeach
    </ul>
@endsection
