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

Route::get('/', 'HomeController@home')->name('site');

Route::get('/cursos', 'CursoController@curso');
Route::get('/faculdade/id_curso', 'CursoController@faculdade');
Route::get('/student', 'StudentController@index');
Route::get('/teste', function () {
    return view('teste');
});

//Categories
Route::resource('categories', 'CategoryController');
Route::get('admin', 'Backend\AdminController@index');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Layout Modelo
Route::get('/painel', 'Backend\PainelController@index')->name('painel');
Route::get('/forms', 'Backend\PainelController@forms')->name('forms');
Route::get('/charts', 'Backend\PainelController@charts')->name('charts');
Route::get('/tables', 'Backend\PainelController@tables')->name('tables');
Route::get('/ingresar', 'Backend\PainelController@ingresar')->name('ingresar');
Route::get('/cadastrar', 'Backend\PainelController@cadastrar')->name('cadastrar');
