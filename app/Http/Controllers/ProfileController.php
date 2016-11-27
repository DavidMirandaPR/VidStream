<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class ProfileController extends Controller
{
    public function editProfile(Request $request)
    {
       $account_email = $request->session()->get("session_account");

       $newEmail = $request->input('email');
       $newPassword = $request->input('password');
       $newFirstName = $request->input('firstname');
       $newLastName = $request->input('lastname');

       if($newEmail){
            $updateEmail = Account::where('email', '=', $account_email)->update(['email' => $newEmail]);
            $request->session()->put('session_account', $newEmail);
       }
       if($newPassword){
            $updatePass = Account::where('password', '=', $newPassword)->update(['password' => $newPassword]);
       }
       if($newFirstName){
            $updateFN = Account::where('firstName', '=', $newFirstName)->update(['firstName' => $newFirstName]);
            $request->session()->put('session_firstName', $newFirstName);
       }
       if($newLastName){
            $updateLN = Account::where('lastName', '=', $newLastName)->update(['lastname' => $lastName]);
            $request->session()->put('session_lastName', $newLastName);
       }
    }
}
