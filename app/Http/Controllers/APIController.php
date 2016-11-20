<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Content;

use App\Movies;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search.content');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "API create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //============================
    //          POST    
    //Function used to populate DB with movies/series
    //============================
    public function store(Request $request)
    {
        //$title = $request->input('Title');
        
        //Title Parameter
        $movies = Movies::get();



        foreach ($movies as $m) {
            $url = "http://www.omdbapi.com/?s=".rawurlencode($m['title']);
            $json = file_get_contents($url);
            $obj = json_decode($json, true);
            dd($obj);
            exit;



        }
        exit;


        

        //Search Parameter
        //$url   = "http://www.omdbapi.com/?s=".rawurlencode($title);
        $json = file_get_contents($url);
        $obj = json_decode($json, true);
        //echo $obj['Actors'];
        echo $obj['Title'];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "API Show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "API edit";
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
        echo "API update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "API delete";
    }
}
