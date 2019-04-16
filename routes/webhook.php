<?php
Route::get('/webhook', 'Admin\WebhookController@index')->name('webhook.index');
Route::get('/create', 'Admin\WebhookController@createWebhook')->name('webhook.create');
Route::get('/list', 'Admin\WebhookController@showWebhook')->name('webhook.show');
Route::get('/delete', 'Admin\WebhookController@destroyWebhook')->name('webhook.delete');