<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'QuartosController@index')->name('home');


Route::group(['middleware' => 'auth','prefix'=> '/quartos'], function() {
	Route::get('/', 'QuartosController@index');

	Route::get('mostra/{id}', 'QuartosController@show')->where('id','[0-9]+');

	Route::get('salvar', 'QuartosController@iniciarSalvar');	

	Route::post('salvar', 'QuartosController@salvar');

	Route::get('delete/{id}', 'QuartosController@delete')->where('id', '[0-9]+');

	Route::get('update/{id}', 'QuartosController@prepareUpdate')->where('id', '[0-9]+');

	Route::post('update', 'QuartosController@update');

});

Route::group(['middleware' => 'auth', 'prefix'=>'/disponibilidade'], function(){
	Route::get('/', 'DisponibilidadeController@index');
	Route::get('/add/{id}', 'DisponibilidadeController@criar');
});
