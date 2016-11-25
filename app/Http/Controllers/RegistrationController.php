<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Account; //Account Model
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

      //==============================================
      //Creating a User instance with table attributes
      //==============================================
      $user = new Account();
      $user->firstName = $firstName;
      $user->lastName  = $lastName;
      $user->email     = $email;
      $user->password  = $password;
      $user->level     = $level;
      //Saving User isntance to DB
      $user->save();
      return view('user-portal.login');

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
