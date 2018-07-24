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

Route::get('get-cidades/{idEstado}', 'Admin\StudentController@getCidades');

Route::get('/', 'Site\HomeController@home')->name('site');
Route::get('/campanhas/{idCamping}', 'Site\HomeController@campanha')->name('show.campanha');

Route::get('/financiamento', 'Site\FinancingController@index')->name('financing.index');
Route::get('/financiamento/criar-campanha', 'Site\FinancingController@createCamping')->name('create.project');





Route::get('/mimos', 'Site\HomeController@mimos')->name('mimos');

Route::get('/test', 'Site\HomeController@test')->name('test');

Route::get('/cursos', 'Site\CursoController@curso');
Route::get('/faculdade/id_curso', 'Site\CursoController@faculdade');
Route::get('/student', 'Admin\StudentController@index');


//Categories
//Route::resource('categories', 'CategoryController');
//Route::get('admin', 'Admin\AdminController@index');

Auth::routes();

//Route::get('/home', 'Site\HomeController@index')->name('home');



//Layout Painel
//Route::get('/painel', 'Admin\PainelController@index')->name('painel');
Route::get('/formss', 'Admin\PainelController@forms')->name('forms');
Route::get('/chartss', 'Admin\PainelController@charts')->name('charts');
Route::get('/tabless', 'Admin\PainelController@tables')->name('tables');
Route::get('/ingresarr', 'Admin\PainelController@ingresar')->name('ingresar');
Route::get('/cadastrarr', 'Admin\PainelController@cadastrar')->name('cadastrar');

//Layout Modelo Admin
Route::get('/admin', 'Admin\AdminController@index')->name('admin');
Route::get('/forms', 'Admin\AdminController@forms')->name('forms');
Route::get('/charts', 'Admin\AdminController@charts')->name('charts');
Route::get('/tables', 'Admin\AdminController@tables')->name('tables');
Route::get('/ingresar', 'Admin\AdminController@ingresar')->name('ingresar');
Route::get('/cadastrar', 'Admin\AdminController@cadastrar')->name('cadastrar');

// Authentication Routes...
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');

//Painel para cadastrados no financiamento Colectivo
Route::get('/miniatura/{filename}', array(
		'as' => 'imageVideo',
		'uses' => 'Financing\AdminController@getFile'
	));
Route::middleware(['auth', 'IsRoleAluno:role_fc'])->group(function(){
	
	Route::get('/financing', 'Financing\AdminController@index')->name('financiamento.index');
	
	Route::get('/financing/student', 'Financing\AdminController@listStudent')->name('list.student');
	Route::get('/financing/create', 'Financing\AdminController@createStudent')->name('create.student');
	Route::post('/financing/store', 'Financing\AdminController@storeStudent')->name('store.student');
	Route::get('/financing/edit-student/{idStudent}', 'Financing\AdminController@editStudent')->name('edit.student');
	Route::put('/financing/update-student/{idStudent}', 'Financing\AdminController@updateStudent')->name('update.student');

	Route::get('/financing/campanha', 'Financing\AdminController@createCamping')->name('create.camping');
	Route::post('/financing/store-camping', 'Financing\AdminController@storeCamping')->name('store.camping');
	Route::get('/financing/show-camping/{idCamping}', 'Financing\AdminController@showCamping')->name('show.camping');
	Route::get('/financing/{idCamping}/edit', 'Financing\AdminController@editCamping')->name('edit.camping');
	Route::put('/financing/update/{idCamping}', 'Financing\AdminController@updateCamping')->name('update.camping');

	Route::get('/financing/rewards', 'Financing\AdminController@listRewards')->name('list.rewards');
	Route::get('/financing/rewards/{campingId?}', 'Financing\AdminController@createRewards')->name('create.rewards');
	Route::post('/financing/store-rewards', 'Financing\AdminController@storeRewards')->name('store.rewards');
	Route::get('/financing/show-redwards/{idReward}', 'Financing\AdminController@showReward')->name('show.reward');
	Route::get('/financing/edit-redwards/{idReward}/edit', 'Financing\AdminController@editReward')->name('edit.reward');
	Route::put('/financing/update-redwards/{idReward}', 'Financing\AdminController@updateReward')->name('update.reward');
});

//Rotas
Route::middleware(['auth'])->group(function(){

	Route::get('/painel', 'Admin\PainelController@index')->name('painel');

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

        //Students
	Route::post('students/store', 'Admin\StudentController@store')->name('students.store')
	->middleware('permission:students.create');
	Route::get('students', 'Admin\StudentController@index')->name('students.index')
	->middleware('permission:students.index');
	Route::get('students/create', 'Admin\StudentController@create')->name('students.create')
	->middleware('permission:students.create');
	Route::put('students/{student}', 'Admin\StudentController@update')->name('students.update')
	->middleware('permission:students.edit');
	Route::get('students/{student}', 'Admin\StudentController@show')->name('students.show')
	->middleware('permission:students.show');
	Route::delete('students/{student}', 'Admin\StudentController@destroy')->name('students.destroy')
	->middleware('permission:students.destroy');
	Route::get('students/{student}/edit', 'Admin\StudentController@edit')->name('students.edit')
	->middleware('permission:students.edit');

	//Categories
	//Route::resource('categories', 'CategoryController');
	Route::post('categories/store', 'Admin\CategoryController@store')->name('categories.store')
	->middleware('permission:categories.create');
	Route::get('categories', 'Admin\CategoryController@index')->name('categories.index')
	->middleware('permission:categories.index');
	Route::get('categories/create', 'Admin\CategoryController@create')->name('categories.create')
	->middleware('permission:categories.create');
	Route::put('categories/{category}', 'Admin\CategoryController@update')->name('categories.update')
	->middleware('permission:categories.edit');
	Route::get('categories/{category}', 'Admin\CategoryController@show')->name('categories.show')
	->middleware('permission:categories.show');
	Route::delete('categories/{category}', 'Admin\CategoryController@destroy')->name('categories.destroy')
	->middleware('permission:categories.destroy');
	Route::get('categories/{category}/edit', 'Admin\CategoryController@edit')->name('categories.edit')
	->middleware('permission:categories.edit');

    //Campaigns
	Route::post('campaigns/store', 'Admin\CampaignController@store')->name('campaigns.store')
	->middleware('permission:campaigns.create');
	Route::get('campaigns', 'Admin\CampaignController@index')->name('campaigns.index')
	->middleware('permission:campaigns.index');
	Route::get('campaigns/create', 'Admin\CampaignController@create')->name('campaigns.create')
	->middleware('permission:campaigns.create');
	Route::put('campaigns/{campaign}', 'Admin\CampaignController@update')->name('campaigns.update')
	->middleware('permission:campaigns.edit');
	Route::get('campaigns/{campaign}', 'Admin\CampaignController@show')->name('campaigns.show')
	->middleware('permission:campaigns.show');
	Route::delete('campaigns/{campaign}', 'Admin\CampaignController@destroy')->name('campaigns.destroy')
	->middleware('permission:campaigns.destroy');
	Route::get('campaigns/{campaign}/edit', 'Admin\CampaignController@edit')->name('campaigns.edit')
	->middleware('permission:campaigns.edit');

     //Donations

	Route::post('donations/store', 'Admin\DonationController@store')->name('donations.store')
	->middleware('permission:donations.store');
	Route::get('donations/show/{donation}', 'Admin\DonationController@show')->name('donations.show')
	->middleware('permission:donations.show');
	Route::get('donations/{reward}', 'Admin\DonationController@confirmed')->name('donations.confirmed')
	->middleware('permission:donation.confirmed');
	Route::post('donations/store/{reward}', 'Admin\DonationController@store')->name('donations.store')
	->middleware('permission:donations.create');
	Route::get('donations', 'Admin\DonationController@index')->name('donations.index')
	->middleware('permission:donations.index');
	Route::get('donations/create', 'Admin\DonationController@create')->name('donations.create')
	->middleware('permission:donations.create');
	Route::put('donations/{donation}', 'Admin\DonationController@update')->name('donations.update')
	->middleware('permission:donations.edit');

	Route::get('donations/{donation}', 'Admin\DonationController@show')->name('donations.show')
	->middleware('permission:donations.show');
	Route::delete('donations/{donation}', 'Admin\DonationController@destroy')->name('donations.destroy')
	->middleware('permission:donations.destroy');
	Route::get('donations/{donation}/edit', 'Admin\DonationController@edit')->name('donations.edit')
	->middleware('permission:donations.edit');

	//rewards
	Route::post('rewards/store', 'Admin\RewardController@store')->name('rewards.store')
	->middleware('permission:rewards.create');
	Route::get('rewards', 'Admin\RewardController@index')->name('rewards.index')
	->middleware('permission:rewards.index');
	Route::get('rewards/create','Admin\RewardController@create')->name('rewards.create')
	->middleware('permission:rewards.create');
	Route::put('rewards/{reward}','Admin\RewardController@update')->name('rewards.update')
	->middleware('permission:rewards.edit');
	Route::get('rewards/show/{reward}', 'Admin\RewardController@show')->name('rewards.show')
	->middleware('permission:rewards.show');
	Route::delete('rewards/{reward}','Admin\RewardController@destroy')->name('rewards.destroy')
	->middleware('permission:rewards.destroy');
	Route::get('rewards/{reward}/edit','Admin\RewardController@edit')->name('rewards.edit')
	->middleware('permission:rewards.edit');
	

    //Countries	
	Route::post('countries/store', 'Admin\CountryController@store')->name('countries.store')
	->middleware('permission:countries.create');
	Route::get('countries', 'Admin\CountryController@index')->name('countries.index')
	->middleware('permission:countries.index');
	Route::get('countries/create', 'Admin\CountryController@create')->name('countries.create')
	->middleware('permission:countries.create');
	Route::put('countries/{country}', 'Admin\CountryController@update')->name('countries.update')
	->middleware('permission:countries.edit');
	Route::get('countries/{country}', 'Admin\CountryController@show')->name('countries.show')
	->middleware('permission:countries.show');
	Route::delete('countries/{country}', 'Admin\CountryController@destroy')->name('countries.destroy')
	->middleware('permission:countries.destroy');
	Route::get('countries/{country}/edit', 'Admin\CountryController@edit')->name('countries.edit')
	->middleware('permission:countries.edit');

    //Cities
	Route::post('cities/store', 'Admin\CityController@store')->name('cities.store')
	->middleware('permission:cities.create');
	Route::get('cities', 'Admin\CityController@index')->name('cities.index')
	->middleware('permission:cities.index');
	Route::get('cities/create', 'Admin\CityController@create')->name('cities.create')
	->middleware('permission:cities.create');
	Route::put('cities/{city}', 'Admin\CityController@update')->name('cities.update')
	->middleware('permission:cities.edit');
	Route::get('cities/{city}', 'Admin\CityController@show')->name('cities.show')
	->middleware('permission:cities.show');
	Route::delete('cities/{city}', 'Admin\CityController@destroy')->name('cities.destroy')
	->middleware('permission:cities.destroy');
	Route::get('cities/{city}/edit', 'Admin\CityController@edit')->name('cities.edit')
	->middleware('permission:cities.edit');

    //States
	Route::post('states/store', 'Admin\StateController@store')->name('states.store')
	->middleware('permission:states.create');
	Route::get('states', 'Admin\StateController@index')->name('states.index')
	->middleware('permission:states.index');
	Route::get('states/create', 'Admin\StateController@create')->name('states.create')
	->middleware('permission:states.create');
	Route::put('states/{state}', 'Admin\StateController@update')->name('states.update')
	->middleware('permission:states.edit');
	Route::get('states/{state}', 'Admin\StateController@show')->name('states.show')
	->middleware('permission:states.show');
	Route::delete('states/{state}', 'Admin\StateController@destroy')->name('states.destroy')
	->middleware('permission:states.destroy');
	Route::get('states/{state}/edit', 'Admin\StateController@edit')->name('states.edit')
	->middleware('permission:states.edit');

});
