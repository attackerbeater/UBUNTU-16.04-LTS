<?php
// generl function for status updates
Route::post('/admin/processing/{id}', 'StatusUpdateController@update');
// for view records
Route::get('/admin/order-lists-noprice/{id}','StatusUpdateController@orderProductTreatmentHasnoprice'); // this is for step 1 it show the lists of order products including treatments
// for modal update
Route::get('/admin/order-modal-product-update-no-price/{id}','StatusUpdateController@editOrderProductTreatmentHasnoprice'); // this is for step 1 when you clicked Click to add / edit product modal show with form
// for view records
Route::get('/admin/order-lists-hasprice/{id}','StatusUpdateController@orderProductTreatmentHasprice'); // this is for step 3 it show the lists of order products including treatments with price
// for modal update
Route::get('/admin/order-modal-product-update-has-price/{id}','StatusUpdateController@editOrderProductTreatmentHasprice'); // this is for step 3 when you clicked Click to add / edit product modal show with form
Route::get('/admin/order-treatment-lists/{id}','StatusUpdateController@orderTreatmentLists'); // this shows treatment lists for steps 1 - 12
Route::post('/admin/lost/{id}', 'LostController@init');
