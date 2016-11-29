<?php
//composer dump-autoload
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Content;
use App\SupportTicket;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //==============================================
    //  VIDSTREAM MAIN CONTENT PAGE
    //==============================================

    public function index(Request $request)
    {
        if($request->session()->exists('session_account'))
        {
            $data['genres'] = ['Action','Comedy','Horror', 'War'];

    			for($i = 0; $i < count($data['genres']); $i++)
                {
    				$data[$data['genres'][$i]] = Content::where('genre', 'LIKE', '%' . $data['genres'][$i] . '%')
                            					->orderBy('year', 'desc')
                               					->limit(15)->get();
    			}

            return view('content-data.content', ['data' => $data]);
        }
        else
            return view('user-portal.login');
    }



    public function seeContent(Request $request)
    {
        $imdbID = $request->input('imdbID');
        echo $imdbID;
        $movie = Content::find($imdbID);
        dd($movie);


    }


    public function contentSearch(Request $request)
    {
        $movieTitle = $request->input('movieTitle');

        $data['movies'] = Content::where('title','LIKE','%' . $movieTitle . '%')
                        ->orderBy('year', 'desc')
                        ->limit(15)->get();

        return view('content-data.search', $data);
    }


    // public function ticketHandler(Request $request)
    // {
		// 	exit;
    //     $ticketID = $request->input('ticketID');
    //     if($ticketID)
    //     {
    //         SupportTicket::find($ticketID)->update(['handled' => 1]);
		// 				return "Ticket Handled!";
    //     } else {
		// 			return "Ticket couldn't be handled."
		// 		}
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //return view('content-data.content', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //============================
    //          POST to /content
    //============================
    public function store(Request $request)
    {
        echo "store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $imdbID = $request->input('imdbID');

        $data['movie'] = Content::where('imdbID','=', $imdbID)->get()->first();

        return view('content-data.info', $data);
    }


    //==========================================
    //      WATCH A MOVIE FUNCTION
    //==========================================



    public function viewMovie(Request $request)
    {
        $imdbID    = $request->input('imdbID');
        $userLevel = $request->session()->get('session_level');

        if($userLevel == 1)
        {
            echo "You need a premium account to see this content Your Level = $userLevel";
        }
        else
        {
            $movie = Content::where('imdbID','=', $imdbID)->get()->first();
            $views = $movie->views;

            if($movie->views)
            {
                $views += 1;
                Content::where('imdbID','=',$imdbID)->update(['views' => $views]);
            }
            else
            {
                $views = 1;
                Content::where('imdbID','=',$imdbID)->update(['views' => $views]);
            }
            echo "Movie has now $views views";

        }
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
