<?php

Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')->name('form_criar_serie');
Route::post('/series/criar', 'SeriesController@store');
Route::delete('/series/{id}', 'SeriesController@destroi');
Route::get('/series/{serieId}/temporadas','TemporadasController@index');
Route::post('/series/{id}/editaNome','SeriesController@editaNome');
Route::get('/temporadas/{temporada}/episodios','EpisodiosController@index');
