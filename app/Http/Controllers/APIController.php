<?php

namespace App\Http\Controllers;

ini_set('max_execution_time', 3600);

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
        $content = Content::get();

        $att = ['Title','Year','Rated','Released','Runtime','Genre','Director',
                'Writer','Actors','Plot','Language','Awards','Poster','imdbRating',
                'imdbVotes','Type'];
        $DBatt = ['title','year','rated','released','runtime','genre','director',
                'writer','actors','plot','language','awards','poster','imdbRating',
                'imdbVotes','type'];
    

        foreach($content as $c)
        {   echo $c->imdbID;
            $url = "http://www.omdbapi.com/?i=".$c->imdbID;
            $json = file_get_contents($url);
            $obj = json_decode($json, true);

            if($obj['Type'] == 'movie' && $c['title'] != NULL)
            {
                //Store Attributes changes
                for ($i=0; $i < 16; $i++) { 
                    $cont = Content::where('imdbID', '=', $obj['imdbID'])
                            ->whereNull($DBatt[$i])
                            ->update([$DBatt[$i] => $obj[$att[$i]]]);
                }
            }
        }
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

            $url = "http://www.omdbapi.com/?t=".rawurlencode($m['title']);
            $json = file_get_contents($url);
            $obj = json_decode($json, true);
            if(array_key_exists('imdbID', $obj))
            {   
                $content = new Content;
                $content->imdbID = $obj['imdbID'];
                $content->save();
            }
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
