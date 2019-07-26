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
  return redirect('/login');
});

Auth::routes();

// Login/Logout Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/login/check', ['uses' => 'LoginController@login', 'as' => 'login.check']);
// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=> 'user', 'middleware' =>['auth', 'user']], function(){
  Route::resource('/', 'UserController');
});
Route::group(['prefix'=> 'administrator', 'middleware' =>['auth', 'administrator']], function(){
  Route::resource('/', 'AdministratorController');
});
