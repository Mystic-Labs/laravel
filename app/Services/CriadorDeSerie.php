<?php


namespace App\Services;


use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $EpPorTemporada): Serie
    {
        $serie = null;

            DB::transaction(function () use(&$serie, $nomeSerie, $qtdTemporadas, $EpPorTemporada){
            $serie = Serie::create(['nome' => $nomeSerie]);
            $this->criaTemporadas($qtdTemporadas, $serie, $EpPorTemporada);
        });


        return $serie;
    }

    /**
     * @param int $qtdTemporadas
     * @param $serie
     * @param int $EpPorTemporada
     */
    private function criaTemporadas(int $qtdTemporadas, $serie, int $EpPorTemporada): void
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criaEpisodios($EpPorTemporada, $temporada);
        }
    }

    /**
     * @param int $EpPorTemporada
     * @param $temporada
     */
    private function criaEpisodios(int $EpPorTemporada, $temporada): void
    {
        for ($j = 1; $j <= $EpPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
