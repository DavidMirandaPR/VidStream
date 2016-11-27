<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Account;	//Account Model
use App\Username;	//Username Model
class SessionController extends Controller
{
    //we will create function to get accessing session Data
    // that is with get() method
    public function getSession(Request $request){
      	if($request->session()->has('session_account'))
      	{
        	echo $request->session()->get('session_account');

        }
      	else {
        	echo 'no data in the session';
      	}
    }
    // create new function for put method
    public static function putSession(Request $request){
    	$email = $request->input('email');
    	$account = Account::where('email','=', $email)->get()->first();
    	$UN      = Username::where('account_id','=',$account->id)->get()->first();
    	$request->session()->regenerate();
    	$request->session()->put('session_account', $account->email);
    	$request->session()->put('session_username', $UN->username);
      $request->session()->put('session_level', $account->level);
  		$data    = $request->session()->all();
      //dd($data);
    }
    // create new function to delete session
    public function forgetSession(Request $request){
      	$request->session()->forget('session_account');
      	$request->session()->forget('session_username');
      	//echo "data hasbeen removed from the session";
        return redirect('/login');


    }
}
