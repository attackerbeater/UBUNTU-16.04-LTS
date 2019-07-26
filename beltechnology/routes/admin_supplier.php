<?php

################## SUPLLIER
Route::get('/admin/supplier', 'LeveranciersController@index');
// REUSE
Route::post('/admin/lstore', 'LeveranciersController@store');
// CREATE
Route::get('/admin/lread/{id}', 'LeveranciersController@show');
Route::get('/admin/ledit/{id}', 'LeveranciersController@edit');
// UPDATE
Route::post('/admin/lupdate/{id}', 'LeveranciersController@update');
// DELETE
Route::get('/admin/ldelete/{id}', 'LeveranciersController@destroy');
