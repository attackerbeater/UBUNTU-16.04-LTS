<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Polls
Route::get('polls','PollsController@index');
Route::get('polls/{id}','PollsController@show');
Route::post('polls', 'PollsController@store');
Route::put('polls/{poll}', 'PollsController@update');
Route::delete('polls/{poll}', 'PollsController@delete');
Route::any('errors', 'PollsController@errors');


// Questions
Route::apiResource('questions', 'Api\QuestionsController');

Route::get('polls/{poll}/questions', 'PollsController@questions');


// Leveranciers
Route::get('leveranciers','Api\LeveranciersController@index');
Route::get('leveranciers/{id}','Api\LeveranciersController@show');
Route::post('leveranciers', 'Api\LeveranciersController@store');
Route::put('leveranciers/{poll}', 'Api\LeveranciersController@update');
Route::delete('leveranciers/{poll}', 'Api\LeveranciersController@delete');
