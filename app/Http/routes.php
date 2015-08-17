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

use \App\Http\Controllers;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articcles', function() {
    return 'fucked';
});

/**
 * The routes for authentication.
 */

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/articles', 'ArticleController@index');
Route::get('/articles/{id}', ['uses' => 'ArticleController@show']);
Route::delete('/articles/{id}', ['uses' => 'ArticleController@destroy']);

Route::get('/testdashboard', [
    'uses' => 'DashboardController@index',
    'user' => \Auth::user()
]);

/**
 * The route to the dashboard.
 *
 * Use the auth middleware to authenticate.
 * Pass the current user to the view.
 */
Route::get('/dashboard', ['middleware' => 'auth', function() {
    return view('dashboard', [
        'user' => \Auth::user(),
    ]);
//    return redirect()->action('DashboardController@index');
//    return redirect()->action('DashboardController@index');
//    return Redirect::action('DashboardController@index', array('user' => \Auth::user()));
    // TODO: why are the above both not applicable?
}]);