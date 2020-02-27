<?php

Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')->name('form_criar_serie');
Route::post('/series/criar', 'SeriesController@store');
Route::delete('/series/{id}', 'SeriesController@destroi');
Route::get('/series/{serieId}/temporadas','TemporadasController@index');
Route::post('/series/{id}/editaNome','SeriesController@editaNome');
Route::get('/temporadas/{temporada}/episodios','EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir','EpisodiosController@assistir');
Route::get('/entrar','EntrarController@index');
Route::post('/entrar','EntrarController@entrar');
Route::get('/registrar','RegistroController@create');
Route::post('/registrar','RegistroController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
