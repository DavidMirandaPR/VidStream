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
        //=========================================
        // MAIN VIEW OF THE API CONTROLLER
        //=========================================

        $data['movies'] = Content::where('genre', 'LIKE', '%Comedy%')
                        ->orderBy('year', 'desc')
                        ->limit(100)->get();
        return view('search.content', $data);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //=====================================================
        //  GET ALL THE INFO ABOUT THE MOVIE AND STORE IT TO DB
        //  WE NEED A TABLE FILLED WITH THE IMDB ID ATTRIBUTE
        //=====================================================



        $content = Content::get();

        $att = ['Title','Year','Rated','Released','Runtime','Genre','Director',
                'Writer','Actors','Plot','Language','Awards','Poster','imdbRating',
                'imdbVotes','Type'];
        $DBatt = ['title','year','rated','released','runtime','genre','director',
                'writer','actors','plot','language','awards','poster','imdbRating',
                'imdbVotes','type'];

        foreach($content as $c)
        {
            if($c['title'] == null)
            {
                $url    = "http://www.omdbapi.com/?i=".$c->imdbID;
                $json   = file_get_contents($url);
                $obj    = json_decode($json, true);

                if($obj['Type'] == 'movie' && $c['Type'] == null)
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

        //==================================================
        //  IF THERE IS AN INPUT FIND THE SPECIFID MOVIE
        //  AND STORE IT INTO DB
        //  IF THERE IS NO INPUT THEN PROCEED TO FILL THE DB
        //  TABLE CONTENT WITH ONLY THE IMDB OF THE MOVIE TITLES
        //  FROM THE MOVIES TABLE
        //===================================================


        if($request->input('Title') != '')
        {
            $title = $request->input('Title');
            $att = ['Title','Year','Rated','Released','Runtime','Genre','Director',
                    'Writer','Actors','Plot','Language','Awards','Poster','imdbRating',
                    'imdbVotes','Type', 'imdbID'];

            $DBatt = ['title','year','rated','released','runtime','genre','director',
                    'writer','actors','plot','language','awards','poster','imdbRating',
                    'imdbVotes','type', 'imdbID'];

            $url = "http://www.omdbapi.com/?t=".rawurlencode($title);
            $json = file_get_contents($url);
            $obj = json_decode($json, true);
            $cont = Content::where('imdbID', '=', $obj['imdbID'])->delete();

            echo "Creating new Instante with the imdbID attribute";
            $content = new Content;
            $content->imdbID = $obj['imdbID'];
            $content->save();
            //dd($content);
            for ($i=0; $i < 16; $i++)
            {
                echo "Updating the ".$DBatt[$i]." of the instance <br>";

                $c = Content::where('imdbID', '=', $obj['imdbID'])
                        ->whereNull($DBatt[$i])
                        ->update([$DBatt[$i] => $obj[$att[$i]]]);
            }

        }
        else
        {
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
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
