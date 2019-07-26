<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
	return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => 'revalidate'], function(){
	require __DIR__.'/admin_dashboard.php';
	require __DIR__.'/admin_client.php';
	require __DIR__.'/admin_supplier.php';
	require __DIR__.'/admin_order.php';
	require __DIR__.'/admin_orderstatus.php';
	require __DIR__.'/admin_generate.php';
});
