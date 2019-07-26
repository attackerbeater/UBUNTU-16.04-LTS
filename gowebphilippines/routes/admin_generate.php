<?php

/* Status One save this */
// open modal to generate PDF
Route::get('/admin/generate-quotation-request-form/{id}/{supplier_name}/{row_num}/{column_num}', 'StatusOneGeneratePDFController@generatepdf');
// process email
Route::post('/admin/post-generate-quotation-request-form', 'StatusOneGeneratePDFController@process');

/* Status three save this */
// open modal to generate PDF
Route::get('/admin/generate-quotation-request/{id}/{client_id}', 'StatusThreeGeneratePDFController@generatepdf');
// process email
Route::post('/admin/post-generate-quotation-request', 'StatusThreeGeneratePDFController@process');

/* Status Five save this */
// open modal to generate PDF
Route::get('/admin/send-confirmation-to-supplier/{id}/{supplier_name}', 'StatusFiveGeneratePDFController@generatepdf');
// process email
Route::post('/admin/post-send-confirmation-to-supplier', 'StatusFiveGeneratePDFController@process');

/* Status seven save this */
// open modal to generate PDF
Route::get('/admin/generate-client-confirmation/{id}/{client_id}', 'StatusSevenGeneratePDFController@generatepdf');
// process email
Route::post('/admin/post-generate-client-confirmation', 'StatusSevenGeneratePDFController@process');

/* Status ten save this */
// open modal to generate PDF
Route::get('/admin/generate-delivery-document/{id}', ['as'=>'generate-delivery-document', 'uses'=>'StatusTenGeneratePDFController@generatepdf']);
// process email
Route::post('/admin/sent-delivery-document-to-supplier', 'StatusTenGeneratePDFController@process');

/* Status thirteen save this */
// open modal to generate PDF
Route::get('/admin/generate-invoice/{id}', ['as'=>'generate-invoice', 'uses'=>'StatusThirteenGenerateInvoiceController@generateInvoice']);
// process email
Route::post('/admin/generate-invoice', 'StatusThirteenGenerateInvoiceController@process');
