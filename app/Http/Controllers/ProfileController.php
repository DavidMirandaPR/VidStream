<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Account;
use App\Username;
use App\SupportTicket;

class ProfileController extends Controller
{
    public function editProfile(Request $request)
    {
        //===============================================
        //              ACCOUNT PROFILE EDIT
        //===============================================

       $account_id   = $request->session()->get("session_account");
       $newEmail     = $request->input('email');
       $newPassword  = $request->input('password');
       $newFirstname = $request->input('firstName');
       $newLastname  = $request->input('lastName');
       $newLevel     = $request->input('level');

       if($newEmail){
            $updateEmail = Account::find($account_id)->update(['email' => $newEmail]);
            $request->session()->put('session_email', $newEmail);
       }
       if($newPassword){
            $updatePass  = Account::find($account_id)->update(['password' => $newPassword]);
       }
       if($newFirstname){
            $updateFN    = Account::find($account_id)->update(['firstName' => $newFirstname]);
            $request->session()->put('session_firstName', $newFirstname);
       }
       if($newLastname){
            $updateLN    = Account::find($account_id)->update(['lastName' => $newLastname]);
            $request->session()->put('session_lastName', $newLastname);
       }
       if($newLevel){
            $updateLN    = Account::find($account_id)->update(['level' => $newLevel]);
            $request->session()->put('session_level', $newLevel);
       }
       return redirect('/profile');
    }

    public function addUser(Request $request)
    {
        //========================================
        //      ADDING USER FUNCTION
        //========================================

        $newUser = $request->input('addUser');
        $accID   = $request->session()->get('session_account');
        if($newUser)
        {
            if(!Username::where('username','=',$newUser)->exists())
           { 
                $UN = new Username;
                $UN->username   = $newUser;
                $UN->account_id = $accID;
                $UN->save();
                Session::flash('message', 'Username Added!!'); 
                return redirect('/profile');
            }
            else{
                Session::flash('message', 'Username Already Exists!!'); 
                return redirect('/profile');
            }

        }
    }

    public function ticketCreate(Request $request)
    {
        //========================================
        //  SUPPORT TICKET ISSUER FUNCTION
        //========================================
        $msg          = $request->input('msg');
        $username     = $request->session()->get('session_username');
        $UN_ID        = Username::where('username', '=', $username)->get()->first();
        $account_id   = $request->session()->get("session_account");

        $suppTicket              = new supportTicket;
        $suppTicket->message     = $msg;
        $suppTicket->username_id = $UN_ID->id;
        $suppTicket->save();
        Session::flash('message', 'Support Ticket Send!!'); 

        return redirect('/profile');
    }

    public function switchUser(Request $request)
    {
        //===================================
        //     SWITCH CURRENT SESSION USER
        //===================================
        $username = $request->input('un');
        $request->session()->put('session_username', $username);
        return redirect('/profile');        
    }
}
