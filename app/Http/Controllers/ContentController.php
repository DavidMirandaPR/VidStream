<?php

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
    public function index()
    {

			$genres['genres'] = ['Action','Drama','Horror','Adventure'];

			for ($i=0; $i < 4; $i++)
			{
				$data[$genres['genres'][$i]] = Content::where('genre', 'LIKE', '%'.$genres['genres'][$i].'%')
	                      ->orderBy('year', 'desc')
	                      ->limit(10)->get();
			}
			$array['data'] = $data;
			//dd($array);
      return view('content-data.content', $array, $genres);
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
