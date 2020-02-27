<?php


namespace App\Http\Controllers;


use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\services\CriadorDeSerie;
use App\services\RemovedorDeSerie;
use App\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()
            ->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        //$request->session()->remove('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');

    }

    public function store(
        SeriesFormRequest $request,
        CriadorDeSerie $criadorDeSerie
    )
    {
        $serie = $criadorDeSerie->criaSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $request->session()->flash('mensagem',
            "Serie {$serie->id} criada com sucesso {$serie->nome} e temporadas e episodios");

        return redirect()->route('listar_series');
    }

    public function destroi(Request $request,RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie=$removedorDeSerie->removerSerie($request->id);

        $request->session()->flash('mensagem', "Serie $nomeSerie removida com sucesso ");
        return redirect()->route('listar_series');
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
