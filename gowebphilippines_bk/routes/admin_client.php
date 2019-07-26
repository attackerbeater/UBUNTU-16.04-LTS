<?php

################## CLIENT
Route::get('/admin/client','KlantenController@index');
// REUSE
Route::post('/admin/kstore', 'KlantenController@store');
// CREATE
Route::get('/admin/kread/{id}', 'KlantenController@show');
Route::get('/admin/kedit/{id}', 'KlantenController@edit');
// UPDATE
Route::post('/admin/kupdate/{id}', 'KlantenController@update');

Route::post('/admin/kupdateid/{id}', 'KlantenController@updateId');

// DELETE
Route::get('/admin/kdelete/{id}', 'KlantenController@destroy');
