<?php

################## ORDER
// 1
Route::get('/admin/ordersupdates', 'OrdersController@getOrderUpdates');
Route::get('/admin/orders', 'OrdersController@index');
Route::post('/admin/ostore', 'OrdersController@store');
Route::get('/admin/oread/{id}/{order_reference_number}', 'OrdersController@show');
Route::get('/admin/unlinkPdf/{id}/{client_id}/{pdfFile}/{dir}/{column}/{dataColumnDate}', 'PdfController@unlinkPdf');
Route::get('/admin/orderdelete/{id}', 'OrdersController@destroy');
Route::post('/admin/update-order-status/{id}', 'OrdersStatusEditController@update');
