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
                $url = "http://www.omdbapi.com/?i=".$c->imdbID;
                $json = file_get_contents($url);
                $obj = json_decode($json, true);
    
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
        echo $count;
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
            dd($content);
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
     //------------URL STATUS CHECKER--------------------   

        // $instance = Content::where('imdbID', '=', 'tt0138862')
        //             ->get()->first();
        // //echo $instance['poster'];
        // $url = $instance['poster'];

        // //=====================================
        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, $url);
        //     curl_setopt($ch, CURLOPT_HEADER, 1);
        //     curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
        //     $data = curl_exec($ch);
        //     $headers = curl_getinfo($ch);
        //     curl_close($ch);
        // //======================================



        // $check_url_status = $headers['http_code'];

        // if ($check_url_status == '200')
        //    echo "Link Works";
        // else
        //    echo "Broken Link";
     //------------------------------------------------------------



     //-------------NO POSTER AND NULL INSTANCES CHECKER ----------
        // $noPoster = Content::where('poster','=', 'N/A')
        //                 ->delete();
        // echo "Delete of Instances with no poster COMPLETED <br>";

        // $noTitle  = Content::where('title', '=', null)
        //                 ->delete();
        // echo "Delete of Instances with no title COMPLETED <br>";
     //------------------------------------------------------------


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
