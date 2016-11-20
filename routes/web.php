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

<<<<<<< HEAD
//Route for register testing
Route::get('/', function () {
    return view('user_portal.registration');
});

//RESTful Controller @ VidStream.tv/content
Route::resource('content','ContentController');


=======
Route::get('content', function(){
	return view('content-data.content');
});

>>>>>>> c6589cc8a349b4ed2efd5c65bf869381dc92ea81
//RESTful Controller @ VidStream.tv/register
Route::resource('register','RegistrationController');
//RESTful Controller @ VidStream.tv/login
Route::resource('login','LoginController');
Route::get('/home', 'HomeController@index');
