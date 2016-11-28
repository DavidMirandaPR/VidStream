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
use App\Account;
use App\Username;
//Route for register testing
Route::get('/', function () {
	if(Session::has('session_account'))
	{
		return redirect()->action('ContentController@index');
	}
	else
	{
    	return view('user-portal.login');
	}
});
Route::post('/random','ProfileController@randomName');
Route::post('/edit', 'ProfileController@editProfile');
Route::get('/logout','SessionController@forgetSession');
Route::post('/adduser', 'ProfileController@addUser');
//===============================================
//	Note: Add Constraints to resource controllers
//===============================================

Route::get('/account', function(){
	$data['users'] = Account::get();
    return view('user-portal.admin', $data);
});
//RESTful Controller @ VidStream.tv/content
Route::resource('content','ContentController');

//RESTful Controller @ VidStream.tv/register
Route::resource('register','RegistrationController');

//RESTful Controller @ VidStream.tv/login
Route::resource('login','LoginController');
//Logout Link
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


//Profile testing routes
Route::get('profile', function(){
	$acc = Session::get('session_account');
	$data['usernames'] = Username::where('account_id', '=', $acc)->get();
		return view('user-portal.profile', $data);
});
