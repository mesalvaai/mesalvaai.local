<?php

Route::get('/', 'Site\HomeController@home')->name('site');

Route::get('/pagamento-credit-card/{base64}', 'MoipIntegrationController@pagamentoCreditCard')->name('pagamento-credit-card');

Route::get('/moip', 'MoipIntegrationController@index')->name('moip');
Route::get('/boleto', 'MoipIntegrationController@PagamentoBoleto')->name('gerar.boleto');

Route::get('/moipt', 'MoipIntegrationController@test')->name('moipt');
Route::get('/testt', 'MoipIntegrationController@testt')->name('testt');
Route::get('/t', 'MoipIntegrationController@t')->name('t');

Route::get('/info',function(){
	return view('sites.info-cursos');
});

<<<<<<< HEAD
Route::get('test', function(){
    return view('tinymce');
});

Route::get('/hola-mundo', function () {
    return 'Hola sou desde o route';
=======
Route::get('get-paises-restantes', 'LocationController@getPaises')->name('get-paises-restantes');
Route::get('get-estados/{idPais}', 'LocationController@getEstados')->name('get-estados');
Route::get('get-cidades/{idPais}/{idEstado}', 'LocationController@getCidades')->name('get-cidades');

Route::get('/campanhas', 'Site\HomeController@campanhas')->name('campanhas');

Route::get('/campanhas/{idCamping?}', 'Site\HomeController@campanha')->name('show.campanha');
Route::get('/campanhas/{slugCamping}/donate', 'Site\HomeController@donate')->name('donate.campanha');
Route::post('/campanhas/processar-donacao', 'Site\HomeController@donateProcess')->name('donate.process');
Route::get('/campanhas/boleto/{codBoleto}/print', 'Site\HomeController@printBoleto')->name('boleto.print');

Route::get('/financiamento', 'Site\FinancingController@index')->name('financing.index');
Route::get('/financiamento/criar-campanha', 'Site\FinancingController@createCamping')->name('create.project');
Route::get('/financiamento/criar-conta', 'Site\FinancingController@createConta')->name('create.conta');

Route::get('/mimos', 'Site\HomeController@mimos')->name('mimos');
Route::get('/test', 'Site\HomeController@test')->name('test');
Route::get('/cursos', 'Site\CursoController@curso');
Route::get('/faculdade/id_curso', 'Site\CursoController@faculdade');
Route::get('/student', 'Admin\StudentController@index');

Auth::routes();

//Layout Painel
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

//Buscar bolsa
Route::get('/bolsas', 'Handbag\AdminController@index')->name('bolsas');
Route::get('bolsas/resultado', 'Handbag\AdminController@showResult')->name('bolsas.resultado');
Route::post('/bolsas/show-course', 'Handbag\AdminController@showCourse')->name('bolsas.show.curso');
Route::get('/bolsas/filtra-show-course', 'Handbag\AdminController@searchCourses')->name('bolsas.filtra.show.curso');

Route::get('/preencheForm', 'Handbag\AdminController@preencheForm')->name('preencheForm');

//Painel para cadastrados no financiamento Colectivo
Route::get('/miniatura/{filename}', array(
	'as' => 'imageVideo',
	'uses' => 'Financing\AdminController@getFile'
));

Route::middleware(['auth', 'IsRoleAluno:role_fc'])->group(function(){
	
	include (base_path('routes/financing.php'));
>>>>>>> ec6dada618596e7fa38f4cb49ba424c04e0e2d2d
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
	UniSharp\LaravelFilemanager\Lfm::routes();
});

<<<<<<< HEAD
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
=======
//Rotas do andmin geral
Route::middleware(['auth'])->group(function(){
	Route::get('/painel', 'Admin\PainelController@index')->name('painel');
	include (base_path('routes/admin.php'));
>>>>>>> ec6dada618596e7fa38f4cb49ba424c04e0e2d2d
});

//Rotas para os webhooks
Route::group(['prefix' => 'webhooks'], function() {
	include (base_path('routes/webhook.php'));
});
