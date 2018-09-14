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

Route::get('/', 'Site\HomeController@home')->name('site');

Route::get('/pagamento-credit-card/{base64}', 'MoipIntegrationController@pagamentoCreditCard')->name('pagamento-credit-card');

Route::get('/moip', 'MoipIntegrationController@index')->name('moip');
Route::get('/boleto', 'MoipIntegrationController@PagamentoBoleto')->name('boleto');

Route::get('/moipt', 'MoipIntegrationController@test')->name('moipt');
Route::get('/testt', 'MoipIntegrationController@testt')->name('testt');
Route::get('/t', 'MoipIntegrationController@t')->name('t');

Route::get('/info',function(){
	return view('sites.info-cursos');
});


Route::get('get-paises-restantes', 'LocationController@getPaises')->name('get-paises-restantes');
Route::get('get-estados/{idPais}', 'LocationController@getEstados')->name('get-estados');
Route::get('get-cidades/{idPais}/{idEstado}', 'LocationController@getCidades')->name('get-cidades');


Route::get('/campanhas', 'Site\HomeController@campanhas')->name('campanhas');
Route::get('/campanhas/{idCamping?}', 'Site\HomeController@campanha')->name('show.campanha');
Route::get('/campanhas/{slugCamping}/donate', 'Site\HomeController@donate')->name('donate.campanha');
Route::post('/campanhas/processar-donacao', 'Site\HomeController@donateProcess')->name('donate.process');
Route::get('/campanhas/gerar-boleto/{idBoleto?}/{idOrder?}', 'Site\HomeController@gerarBoleto')->name('gerar.boleto');
//Route::get('/campanhas/gerar-boleto', array('as' => 'gerar.boleto', 'uses' => 'Site\HomeController@gerarBoleto'));
// Route::get('/campanhas/gerar-boleto/{data}', array('as' => 'gerar.boleto', function($data) {
// 	return View::make('sites.donations.gerar-boleto')->with('data', $data);
// })); 
Route::get('/campanhas/boleto/{codBoleto}/print', 'Site\HomeController@printBoleto')->name('boleto.print');

Route::get('/financiamento', 'Site\FinancingController@index')->name('financing.index');
Route::get('/financiamento/criar-campanha', 'Site\FinancingController@createCamping')->name('create.project');
Route::get('/financiamento/criar-conta', 'Site\FinancingController@createConta')->name('create.conta');

Route::get('/mimos', 'Site\HomeController@mimos')->name('mimos');
Route::get('/cursos', 'Site\CursoController@curso');
Route::get('/faculdade/id_curso', 'Site\CursoController@faculdade');
Route::get('/student', 'Admin\StudentController@index');

//Controllers para tests
Route::get('/test', 'Site\TestController@test')->name('test');
Route::get('/retornar-status-boleto', 'Site\TestController@retornarStatusBoleto')->name('rsb');
Route::get('/retornar-status-cartao', 'Site\TestController@getStatusCartao')->name('status.cartao');
Route::get('/flash-session', 'Site\TestController@testSessions')->name('test-session');



//Route::get('/home', 'Site\HomeController@index')->name('home');

//Layout Painel
Route::get('/formss', 'Admin\PainelController@forms')->name('forms');
Route::get('/chartss', 'Admin\PainelController@charts')->name('charts');
Route::get('/tabless', 'Admin\PainelController@tables')->name('tables');
Route::get('/ingresarr', 'Admin\PainelController@ingresar')->name('ingresar');
Route::get('/cadastrarr', 'Admin\PainelController@cadastrar')->name('cadastrar');

//Layout Modelo Admin
// Route::get('/admin', 'Admin\AdminController@index')->name('admin');
// Route::get('/forms', 'Admin\AdminController@forms')->name('forms');
// Route::get('/charts', 'Admin\AdminController@charts')->name('charts');
// Route::get('/tables', 'Admin\AdminController@tables')->name('tables');
// Route::get('/ingresar', 'Admin\AdminController@ingresar')->name('ingresar');
// Route::get('/cadastrar', 'Admin\AdminController@cadastrar')->name('cadastrar');


//Buscar bolsa
Route::get('/bolsas', 'Handbag\AdminController@index')->name('bolsas');
Route::post('bolsas/resultado', 'Handbag\AdminController@showResult')->name('bolsas.resultado');
Route::post('/bolsas/show-course', 'Handbag\AdminController@showCourse')->name('bolsas.show.curso');;


//Lêr arquivos do storage para frontend
Route::get('/miniatura/{filename}', array(
	'as' => 'imageVideo',
	'uses' => 'Financing\AdminController@getFile'
));

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
	UniSharp\LaravelFilemanager\Lfm::routes();
});

//Rotas para autentificação
Auth::routes();

//Rotas para administrador do financimaneto coletivo
Route::middleware(['auth', 'IsRoleAluno:role_fc'])->group(function(){
	include (base_path('routes/financing.php'));
});

//Rotas para o painel
Route::middleware(['auth'])->group(function(){
	Route::get('/painel', 'Admin\PainelController@index')->name('painel');
	include (base_path('routes/admin.php'));
});
