<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account; //Account Model

use App\Content;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('session_account')) {
            return redirect('/content');
        }
        else
            return view('user-portal.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //======================
    //          POST
    //======================
    public function store(Request $request)
    {
        $email    = $request->input('email');
        $password = $request->input('password');

        if($user = Account::where("email", "=", $email)->get()->first())
        {
            if($user->password == $password)
            {
              SessionController::putSession($request);
              if($user->level == 1)
              {
                //echo "Level 1";
                return redirect('/content');
              }
              else if($user->level == 2)
              {
                echo "Premium Account";
              }
              else if($user->level == 3)
              {
                $data['users'] = Account::get();
                return view('user-portal.admin', $data);
              }
            }
            else
            {
                echo "Nope 1";
                //return redirect('/login');
            }
        }
        else{
            echo "Nope 2";
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
