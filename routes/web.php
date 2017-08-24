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

Route::group(['prefix' => '/'], function(){
	Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => '/home'], function(){
	Route::get('/quarto/{id}', 'HomeController@mostrar');
	Route::post('/quarto/salvar', 'HomeController@reservar');
});

Route::get('/admin', 'AdminController@index');
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('storage/photos/{filename}', function ($filename)
{
    $path = storage_path('app/photos/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
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
	Route::get('/deletar/{id}', 'DisponibilidadeController@deletar');
	Route::get('/editar/{idQuarto}/{idDisponibilidade}', 'DisponibilidadeController@iniciarEditar');

	Route::post('/salvar', 'DisponibilidadeController@salvar');
	Route::post('/editar', 'DisponibilidadeController@editar');

});
