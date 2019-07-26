<?php
// for testing only
Route::get('/admin/interface','CarController@getIndex');

Route::get('/admin/bpi','PaymentController@processBpi');
Route::get('/admin/paypal','PaymentController@processPaypal');
Route::get('/admin/mastercard','PaymentController@processMasterCard');
