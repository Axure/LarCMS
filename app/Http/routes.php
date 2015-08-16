<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articcles', function() {
    return 'fucked';
});

Route::get('/articles', 'ArticleController@index');
Route::get('/articles/{id}', ['uses' => 'ArticleController@show']);
Route::delete('/articles/{id}', ['uses' => 'ArticleController@destroy']);

Route::get('/dashboard', function() {
    return view('dashboard');
});