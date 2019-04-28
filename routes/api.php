<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// 
Route::group(['prefix' => 'V1'], function() {
	Route::resource('meeting', 'MeetingController', [
		'except' => ['create', 'edit']
	]);
	// Route::get('webhook-boleto', 'MeetingController@index')->name('webhooks.boletos');
	// Route::get('webhook-creditcard', 'MeetingController@webhookCreditCard')->name('webhooks.creditcards');
	// Route::get('webhook-json', 'MeetingController@jsonWebhooks')->name('webhooks.store');
});


