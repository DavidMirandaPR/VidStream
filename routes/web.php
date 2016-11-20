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

Route::get('content', function(){
	return view('content-data.content');
});

//RESTful Controller @ VidStream.tv/register
Route::resource('register','RegistrationController');
//RESTful Controller @ VidStream.tv/login
Route::resource('login','LoginController');
Route::get('/home', 'HomeController@index');
