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

Route::get('/', 'Site\HomeController@home')->name('site');

Route::get('/cursos', 'Site\CursoController@curso');
Route::get('/faculdade/id_curso', 'Site\CursoController@faculdade');
Route::get('/student', 'Admin\StudentController@index');
Route::get('/teste', function () {
    return view('teste');
});

//Categories
//Route::resource('categories', 'CategoryController');
Route::get('admin', 'Admin\AdminController@index');







Auth::routes();

Route::get('/home', 'Site\HomeController@index')->name('home');

//Layout Modelo
Route::get('/painel', 'Admin\AdminController@index')->name('admin');
Route::get('/forms', 'Admin\AdminController@forms')->name('forms');
Route::get('/charts', 'Admin\AdminController@charts')->name('charts');
Route::get('/tables', 'Admin\AdminController@tables')->name('tables');
Route::get('/ingresar', 'Admin\AdminController@ingresar')->name('ingresar');
Route::get('/cadastrar', 'Admin\AdminController@cadastrar')->name('cadastrar');

//Rotas
Route::middleware(['auth'])->group(function(){

	//Permissions
	Route::post('permissions/store', 'Admin\PermissionController@store')->name('permissions.store')
		->middleware('permission:permissions.create');

	Route::get('permissions', 'Admin\PermissionController@index')->name('permissions.index')
		->middleware('permission:permissions.index');

	Route::get('permissions/create', 'Admin\PermissionController@create')->name('permissions.create')
		->middleware('permission:permissions.create');

	Route::put('permissions/{permission}', 'Admin\PermissionController@update')->name('permissions.update')
		->middleware('permission:permissions.edit');

	Route::get('permissions/{permission}', 'Admin\PermissionController@show')->name('permissions.show')
		->middleware('permission:permissions.show');

	Route::delete('permissions/{permission}', 'Admin\PermissionController@destroy')->name('permissions.destroy')
		->middleware('permission:permissions.destroy');

	Route::get('permissions/{permission}/edit', 'Admin\PermissionController@edit')->name('permissions.edit')
		->middleware('permission:permissions.edit');

	//Roles
	Route::post('roles/store', 'Admin\RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles', 'Admin\RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create', 'Admin\RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::put('roles/{role}', 'Admin\RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'Admin\RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'Admin\RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit', 'Admin\RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');

	//Users

	Route::get('users', 'Admin\UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::put('users/{user}', 'Admin\UserController@update')->name('users.update')
		->middleware('permission:users.edit');

	Route::get('users/{user}', 'Admin\UserController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::delete('users/{user}', 'Admin\UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');

	Route::get('users/{user}/edit', 'Admin\UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');

	//Categories
<<<<<<< HEAD
	//Route::resource('categories', 'CategoryController');
	Route::post('categories/store', 'CategoryController@store')->name('categories.store')
		->middleware('permission:categories.create');

	Route::get('categories', 'CategoryController@index')->name('categories.index')
		->middleware('permission:categories.index');

	Route::get('categories/create', 'CategoryController@create')->name('categories.create')
		->middleware('permission:categories.create');

	Route::put('categories/{category}', 'CategoryController@update')->name('categories.update')
		->middleware('permission:categories.edit');

	Route::get('categories/{category}', 'CategoryController@show')->name('categories.show')
		->middleware('permission:categories.show');

	Route::delete('categories/{category}', 'CategoryController@destroy')->name('categories.destroy')
		->middleware('permission:categories.destroy');

	Route::get('categories/{category}/edit', 'CategoryController@edit')->name('categories.edit')
		->middleware('permission:categories.edit');
=======
	Route::resource('categories', 'Admin\CategoryController');
>>>>>>> edfc167c181128153d954445df15efb0fb1cf5f4

	//Products
	// Route::post('products/store', 'ProductController@store')->name('products.store')
	// 	->middleware('permission:products.create');

	// Route::get('products', 'ProductController@index')->name('products.index')
	// 	->middleware('permission:products.index');

	// Route::get('products/create', 'ProductController@create')->name('products.create')
	// 	->middleware('permission:products.create');

	// Route::put('products/{product}', 'ProductController@update')->name('products.update')
	// 	->middleware('permission:products.edit');

	// Route::get('products/{product}', 'ProductController@show')->name('products.show')
	// 	->middleware('permission:products.show');

	// Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
	// 	->middleware('permission:products.destroy');

	// Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
	// 	->middleware('permission:products.edit');

});
