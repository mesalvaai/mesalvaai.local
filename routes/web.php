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
Route::get('/student', 'StudentController@index');
Route::get('/teste', function () {
    return view('teste');
});

//Categories
Route::resource('categories', 'CategoryController');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
