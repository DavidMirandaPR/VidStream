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
use App\Genre;
//Route for register testing
Route::get('/', function () {
	if(Session::has('session_account'))
	{
		return redirect()->action('ContentController@index');
	}
	else
	{
    	return redirect('/login');
	}
});


Route::get('/usernames',function(){
	if(Session::has('session_account'))
	{
		$data['usernames'] = Username::where('account_id', '=', Session::get('session_account'))->get();
		return view('user-portal.user', $data);
	}
	else
	{
		return redirect('/login');
	}
});
//================================================
//				CONTENT CONTROLLER
//================================================
//RESTful Controller @ VidStream.tv/content
Route::resource('content','ContentController');
Route::post('/viewMovie', 'ContentController@viewMovie');
//================================================
//				PROFILE CONTROLLER
//================================================
// GETS
Route::get('/switchUser','ProfileController@switchUser');

//POSTS
Route::post('/deleteUser', 'ProfileController@deleteUser');
Route::post('/random','ProfileController@randomName');
Route::post('/support','ProfileController@ticketCreate');
Route::post('/editUser','ProfileController@editUser');
Route::post('/edit', 'ProfileController@editProfile');
Route::post('/adduser', 'ProfileController@addUser');
Route::post('/random','ProfileController@randomName');
Route::get('profile', function(){
	$acc = Session::get('session_account');
	$data['usernames'] = Username::where('account_id', '=', $acc)->get();
	$data['genres']    = Genre::get();
	return view('user-portal.profile', $data);
});

//================================================
//	SESSION CONTROLLER
//================================================
Route::get('/logout','SessionController@forgetSession');



//===============================================
//	Note: Add Constraints to resource controllers
//===============================================

Route::get('/account', function(){
	$data['users'] = Account::get();
    return view('user-portal.admin', $data);
});



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

