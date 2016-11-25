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

//Route for register testing
Route::get('/', function () {
    return view('user-portal.login');
});


//===============================================
//	Note: Add Constraints to resource controllers
//===============================================

Route::get('session/get', 'SessionController@getSession');
Route::post('session/put', 'SessionController@putSession');
Route::get('session/forget', 'SessionController@forgetSession');


//RESTful Controller @ VidStream.tv/content
Route::resource('content','ContentController');

//RESTful Controller @ VidStream.tv/register
Route::resource('register','RegistrationController');

//RESTful Controller @ VidStream.tv/login
Route::resource('login','LoginController');
Route::get('/logout','SessionController@forgetSession');
//Default Home Controller
Route::get('/home', 'HomeController@index');

// Api Routes
Route::group(['prefix' => 'api'], function () {
	// Api: Version 1 	
	Route::group(['prefix' => 'v1'], function () {
		//RESTful Controller @ Vidstream.tv/api/v1/getinfo
		Route::resource('getinfo','APIController');
	});
});

