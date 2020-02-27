@extends('layout')
@section('cabecalho')
    add series
@endsection
@section('conteudo')
    @include('mensagem',['mensagem'=>$mensagem])
    @include('erros',['errors'=>$errors])
    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
            <div class="col col-2">
                <label for="qtd_temporadas">nu temp</label>
                <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
            </div>
            <div class="col col-2">
                <label for="ep_por_temporada ">nu ep por temp</label>
                <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
            </div>
        </div>
        <button class="btn btn-primary">salvar</button>
    </form>
@endsection
