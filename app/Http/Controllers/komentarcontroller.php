<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anime;
use App\genre;
use Auth;
use File;
use DB;


class komentarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'komentar' => 'required',
            'rating' => 'required',
            'anime_id' => 'required'
            
        ]);

        $query = DB::table('komentar')->insert([
            "komentar" => $request->komentar,
            "rating" => $request->rating,
            "nama_komentar" => Auth::user()->name,
            "user_idkomen" => Auth::user()->id,
            "anime_id" => $request->anime_id
        ]); 
        return redirect('/anime/'.$request->anime_id);
    
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
        $request->validate([
            'komentar' => 'required',
            'rating' => 'required',
        ]);

        $genre = DB::table('komentar')->where('id', $id)->first();
        $query = DB::table('komentar')
                    ->where('id', $id)
                    ->update([
                        "komentar" => $request["komentar"],
                        "rating" => $request["rating"]          
        ]); 
        return redirect('/embuhken');
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
        $komen = DB::table('komentar')->where('id', $id)->first();
        $anime_id = $komen->anime_id;
        $komen->delete();
        return redirect()->route('/anime/'.$anime_id);
    }
}
