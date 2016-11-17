<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; //User Model

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
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
    public function store(Request $request)
    {
      //==========================
      //Acquiring Data from Post
      //==========================
      $firstName = $request->input('firstName');
      $lastName  = $request->input('lastName');
      $email     = $request->input('email');
      $password  = $request->input('password');
      $level = 1;
      //==============================================
      //Creating a User instance with table attributes
      //==============================================
      $user = new User();

      $user->firstName = $firstName;
      $user->lastName  = $lastName;
      $user->email     = $email;
      $user->password  = $password;
      $user->level     = 1;
      //Saving User isntance to DB
      $user->save();

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
