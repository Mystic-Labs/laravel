<?php


namespace App\Http\Controllers;


use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\services\CriadorDeSerie;
use Illuminate\Http\Request;

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

    public function destroi(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Serie removida com sucesso ");
        return redirect()->route('listar_series');
    }
}
