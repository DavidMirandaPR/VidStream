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
// Route::get('/', function () {
//     return view('register');
// });

<<<<<<< HEAD
//Route for register testing
Route::get('/', function () {
    return view('user_portal.registration');
});

=======
>>>>>>> adf11ba40e33038887bcd7e2ca82986bed926f85

//RESTful Controller @ VidStream.tv/register
Route::resource('register','RegistrationController');

//RESTful Controller @ VidStream.tv/login
Route::resource('login','LoginController');

Route::get('/home', 'HomeController@index');
