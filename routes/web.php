<?php

use Illuminate\Support\Facades\Auth;
Route::get('/','SeriesController@index');
Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')->name('form_criar_serie')->middleware('autenticador');
Route::post('/series/criar', 'SeriesController@store')->middleware('autenticador');
Route::delete('/series/{id}', 'SeriesController@destroi')->middleware('autenticador');
Route::get('/series/{serieId}/temporadas','TemporadasController@index');
Route::post('/series/{id}/editaNome','SeriesController@editaNome')->middleware('autenticador');
Route::get('/temporadas/{temporada}/episodios','EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir','EpisodiosController@assistir')->middleware('autenticador');
Route::get('/entrar','EntrarController@index')->name('entrar');
Route::post('/entrar','EntrarController@entrar');
Route::get('/registrar','RegistroController@create');
Route::post('/registrar','RegistroController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sair',function ()
{
    Auth::logout();
    return redirect('/entrar');
});
