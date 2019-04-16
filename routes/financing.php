<?php  
Route::get('/financing', 'Financing\AdminController@index')->name('financiamento.index');
	
Route::get('/financing/student', 'Financing\AdminController@listStudent')->name('list.student');
Route::get('/financing/create', 'Financing\AdminController@createStudent')->name('create.student');
Route::post('/financing/store', 'Financing\AdminController@storeStudent')->name('store.student');
Route::get('/financing/edit-student/{idStudent}', 'Financing\AdminController@editStudent')->name('edit.student');
Route::put('/financing/update-student/{idStudent}', 'Financing\AdminController@updateStudent')->name('update.student');

Route::get('/financing/campanha', 'Financing\AdminController@createCamping')->name('create.camping');
Route::post('/financing/store-camping', 'Financing\AdminController@storeCamping')->name('store.camping');
Route::get('/financing/show-camping/{idCamping}', 'Financing\AdminController@showCamping')->name('show.camping');
Route::get('/financing/view-camping/{idCamping}', 'Financing\AdminController@viewCamping')->name('view.camping');
Route::get('/financing/publish-camping/{idCamping}', 'Financing\AdminController@publishCamping')->name('publish.camping');
Route::get('/financing/{idCamping}/edit', 'Financing\AdminController@editCamping')->name('edit.camping');
Route::put('/financing/update/{idCamping}', 'Financing\AdminController@updateCamping')->name('update.camping');

Route::get('/financing/rewards', 'Financing\AdminController@listRewards')->name('list.rewards');
Route::get('/financing/rewards/{campingId?}', 'Financing\AdminController@createRewards')->name('create.rewards');
Route::post('/financing/store-rewards', 'Financing\AdminController@storeRewards')->name('store.rewards');
Route::get('/financing/show-redwards/{idReward}', 'Financing\AdminController@showReward')->name('show.reward');
Route::get('/financing/edit-redwards/{idReward}/edit', 'Financing\AdminController@editReward')->name('edit.reward');
Route::put('/financing/update-redwards/{idReward}', 'Financing\AdminController@updateReward')->name('update.reward');