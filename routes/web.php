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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@home');

Route::get('/cursos', 'CursoController@curso');

Route::get('/faculdade/id_curso', 'CursoController@faculdade');

Route::get('/lista', 'FrutasController@getSaveFruta');

Route::get('/teste', function () {
    return view('teste');
});

Route::get('test', function(){
    return view('tinymce');
});

Route::get('/hola-mundo', function () {
    return 'Hola sou desde o route';
});

Route::post('/hola-mundo', function () {
    return 'Hola sou desde o route';
});

Route::get('/contato/{nombre?}/{edad?}', function ($nombre = "Eber Ortiz", $edad=20) {
    return view('contato', array(
    	"nombre" => $nombre,
    	"edad" => $edad
    ));
})->where([
	'nombre' => '[A-Za-z]+',
	'edad' => '[0-9]+'
]);

Route::get('/url_post', 'TestController@index');

// Route::get('/fruta', 'FrutasController@index');
// Route::get('/naranja', 'FrutasController@naranja');
// Route::get('/pera', 'FrutasController@pera');

Route::post('/receber', 'FrutasController@receberForm');

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//      \UniSharp\LaravelFilemanager\Lfm::routes();
// });

Route::group(['prefix' => 'frutaria'], function(){
    Route::get('/fruta', 'FrutasController@index');
    Route::get('/naranja/{admin?}', ['middleware' => 'EsAdmin', 'uses' => 'FrutasController@naranja', 'as' => 'naranjitas']);
    Route::get('/pera', 'FrutasController@pera');
});



