<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Account;  //Account Model
use App\Username; //Username Model

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //==============================================
      //  VIDSTREAM REGISTRATIO HOMEPAGE
      //==============================================
      if ($request->session()->has('session_account')) {
        return redirect('/content');
      }
      else
        return view('user-portal.registration');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      echo "create";
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //======================
    //        POST
    //======================
    public function store(Request $request)
    {
      //==========================
      //Acquiring Data from Post
      //==========================
      $firstName = $request->input('firstName');
      $lastName  = $request->input('lastName');
      $email     = $request->input('email');
      $password  = $request->input('password');
      $level     = $request->input('level');
      $username  = $request->input('username');

      //==============================================
      //          Creating a User instance
      //==============================================
      $account            = new Account();
      $account->firstName = $firstName;
      $account->lastName  = $lastName;
      $account->email     = $email;
      $account->password  = $password;
      $account->level     = $level;
      //Saving User instance to DB
      //return view('user-portal.login');
      $account->save();


      //==============================================
      //          Creating a Username instance
      //==============================================
      $userName             = new Username;
      $userName->account_id = $account->id;
      $userName->username   = $username;
      $userName->save();

      $acc = Account::where('id', '=', $account->id)
                      ->whereNull('username_id')
                      ->update(['username_id' => $userName->id]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      echo "show";
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      echo "edit";
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      echo "update";
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      echo "destroy";
    }
}
