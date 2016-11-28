<?php
//composer dump-autoload
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //==============================================
        //  VIDSTREAM MAIN CONTENT PAGE
        //==============================================


        if($request->session()->exists('session_account')){
            $data['genres'] = ['Action','Comedy','Horror', 'War'];

    			for($i = 0; $i < count($data['genres']); $i++){
    				$data[$data['genres'][$i]] = Content::where('genre', 'LIKE', '%' . $data['genres'][$i] . '%')
                            					->orderBy('year', 'desc')
                               					->limit(10)->get();
    			}

            return view('content-data.content', ['data' => $data]);
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
    {  //wtf?
       return view('content-data.content', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //============================
    //          POST
    //============================
    public function store(Request $request)
    {

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
