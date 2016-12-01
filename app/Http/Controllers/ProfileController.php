<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Account;          //Account Model
use App\Username;         //Username Model
use App\GenrePreferences; //GenrePreferences Model
use App\UserHistory;      //userHistory Model
use App\SupportTicket;    //SupportTicket Model
use App\Genre;            //Genre Model

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
            Account::find($account_id)->update(['email' => $newEmail]);
            $request->session()->put('session_email', $newEmail);
       }
       if($newPassword){
            Account::find($account_id)->update(['password' => $newPassword]);
       }
       if($newFirstname){
            Account::find($account_id)->update(['firstName' => $newFirstname]);
            $request->session()->put('session_firstName', $newFirstname);
       }
       if($newLastname){
            Account::find($account_id)->update(['lastName' => $newLastname]);
            $request->session()->put('session_lastName', $newLastname);
       }
       if($newLevel){
            Account::find($account_id)->update(['level' => $newLevel]);
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

        $exists = Username::where('account_id','=',$accID)->where('username','=', $newUser)->get()->first();

        if($newUser)
        {
            if(!$exists)
            {
                $UN = new Username;
                $UN->username   = $newUser;
                $UN->account_id = $accID;
                $UN->save();
                Session::flash('message', 'Username Added!!');
                //==============================================
                //      Creating a Genre Preferences Instance
                //==============================================
                $genrePref              = new GenrePreferences;
                $genrePref->account_id  = $accID;
                $genrePref->username_id = $UN->id;
                $genrePref->save();
                //==============================================
                //      Creating a History Preferences Instance
                //==============================================
                $userHistory              = new UserHistory;
                $userHistory->account_id  = $accID;
                $userHistory->username_id = $UN->id;
                $userHistory->save();

                return redirect('/profile');
            }
            else{
                Session::flash('message', 'Username Already Exists!!');
                return redirect('/profile');
            }

        }
    }


	public function randomName(Request $request)
		{
			return "I think this worked";
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
        return redirect('/content');
    }

    public function editUser(Request $request)
    {
        //========================================
        //      EDIT AN ALREADY EXISTING USERNAME
        //========================================


        $selUID  = $request->input('selectedUID');
        $newUser = $request->input('changeUser');
        if($selUID && $newUser)
        {
            $user = Username::where('id','=',$selUID)->get()->first();
            Username::where('id','=',$selUID)->update(['username' => $newUser]);

            //If the user is editing the same username from which it is logged in Update the session
            if($user->username == $request->session()->get('session_username')){
                $request->session()->put('session_username', $newUser);
            }
            Session::flash('message', 'Username Updated!!');
            return 'Username Updated';
        }
    }


    public function delUser($accID, $selUID)
    {
        //======================================
        //  DELETE AN EXISTING USERNAME
        //======================================

        if($selUID)
        {
            Username::find($selUID)->delete();
            GenrePreferences::where('username_id','=',$selUID)->delete();
            UserHistory::where('username_id','=',$selUID)->delete();
            SupportTicket::where('username_id','=',$selUID)->delete();
        }
        return "There has been an error";
    }

    public function deleteUser(Request $request)
    {
        //======================================
        //  DELETE AN EXISTING USERNAME
        //======================================

        $selUID  = $request->input('selectedUID');
        $accID   = $request->session()->get('session_account');
        ProfileController::delUser($accID, $selUID);
        return "Sucessfully Deleted User";

    }




    public function deleteAcc(Request $request)
    {
        //======================================
        //  DELETE AN EXISTING ACCOUNT
        //======================================

        $accID     = $request->input('accountID');
        $usernames = Username::where('account_id','=', $acciD)->get();
        dd($usernames);
        if($accID)
        {
            foreach($usernames as $user)
            {
                ProfileController::delUser($accID, $user->id);
            }
            Account::find($accID)->delete();
            return "Account deletion Successful";
        }
        return "There has been an error deleting the account";
    }




    public function deleteGenre(Request $request)
    {
        //=========================================
        //  DELETE AN EXISTING GENRE IN PREFERENCES
        //=========================================

        $selGenre = $request->input('selectedGenre');
        //Get Account ID from Session
        $accID    = $request->session()->get('session_account');
        //Get Username from Session
        $username = $request->session()->get('session_username');

        $user     = Username::where('account_id','=', $accID)
                               ->where('username','=',$username)->get()->first();
        if($selGenre)
        {
            GenrePreferences::where('account_id','=',$accID)
                            ->where('username_id','=',$user->id)
                            ->where('genre','=', $selGenre)->delete();

            return "Sucessfully Deleted Genre";
        }
        else
        {
            return "No Genre Selected";
        }
    }

    public function addGenre(Request $request)
    {
        //========================================
        //      ADDING GENRE FUNCTION
        //========================================

        //Get genre selected
        $genre  = $request->input('addGenre');
        //Get Account ID from Session
        $accID    = $request->session()->get('session_account');
        //Get Username from Session
        $username = $request->session()->get('session_username');
        //Select the Username who added the Genre
        $user     = Username::where('account_id','=', $accID)->where('username','=', $username)->get()->first();
        //Check if the Genre Preference already exists
        $exists   = GenrePreferences::where('account_id','=',$accID)->where('username_id','=', $user->id)
                                    ->where('genre','=',$genre)->get()->first();

        if($genre)
        {
            if(!$exists)
            {
                //==============================================
                //      Creating a Genre Preferences Instance
                //==============================================
                $genrePref              = new GenrePreferences;
                $genrePref->account_id  = $accID;
                $genrePref->username_id = $user->id;
                $genrePref->genre       = $genre;
                $genrePref->save();
                return redirect('/profile');
            }
            else{
                Session::flash('message', 'Genre already added to Preferences');
                return redirect('/profile');
            }

        }
    }
		public function ticketHandler(Request $request)
    {
			exit;
        $ticketID = $request->input('ticketID');
        if($ticketID)
        {
            SupportTicket::find($ticketID)->update(['handled' => 1]);
						return "Ticket Handled!";
        } else {
					return "Ticket couldn't be handled.";
				}
    }

}
