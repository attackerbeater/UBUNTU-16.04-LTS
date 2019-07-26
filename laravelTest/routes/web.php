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

Route::get('/', function () {
    return view('welcome');
})->name('home'); // use for links


Route::get('/about', function () {
	echo "Welcome to about page";
})->name('about'); // use for links

Route::get('/link/{id?}', function ($id) {
	echo "Welcome to Link with {$id}";
})->name('link'); // use for links

// Route::namespace('Leveranciers')->group(function(){
Route::group(['namespace' => 'Leveranciers', 'middleware' => ['\App\Http\Middleware\LogLeveranciers']],function(){
// Route::group(['namespace' => 'Leveranciers', 'prefix' => 'testing'],function(){

	Route::resource('admin/leveranciers', 'LeveranciersController');

	Route::get('/admin/leveranciers/{leveranciers}/leverancier', function(\App\Leveranciers $leveranciers){
		return response()->leverancier($leveranciers);
	});

	Route::get('/admin/leveranciers/create', function(){
		return view('admin.leveranciers.create');
	})->name('admin.leveranciers.create');

	Route::get('/admin/leveranciers/{leveranciers}/getById', 'LeveranciersController@getById');
});

Route::group(['namespace' => 'Players'], function(){
	Route::resource('players','PlayersController');
});


Route::get('/square/{number?}', function($number =10){
	return $number * $number;
})->middleware('auth:email');


Route::group(['namespace' => 'Form'], function(){
	Route::get('form/create', 'FormController@create')->name('form.create');
	Route::post('form/store', 'FormController@store')->name('form.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
