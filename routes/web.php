<?php

use Illuminate\Support\Facades\Route;

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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//admin
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
	Route::match(['get', 'post'], '/admin', 'HomeController@admin');	
	// Route::match(['get'], '/guest', 'HomeController@guest');
});

//user
Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function()
{
	Route::match(['get', 'post'], '/user', 'HomeController@user');
});

//guest
Route::group(['middleware' => 'App\Http\Middleware\GuestMiddleware'], function()
{
	Route::match(['get'], '/guest', 'HomeController@guest');	
});
