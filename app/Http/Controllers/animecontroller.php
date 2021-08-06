<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anime;
use App\genre;
use File;
use DB;

class animecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $listanime = DB::table('anime')->get();
        return view('show-content.anime.index', compact('listanime'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listgenre = DB::table('genre')->get();
        return view('show-content.anime.create',compact('listgenre'));
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
            'judul' => 'required',
            'sinopsis' => 'required',
            'type' => 'required',
            'episode_count' => 'required',
            'status' => 'required',
            'aired_date' => 'required',
            'producer' => 'required',
            'studio' => 'required',
            'video_link' =>  'required',
            'poster' =>  'required|mimes:jpeg,jpg,png|max:2200',
            'genre_id' =>  'required'
        ]);

        $poster = $request["poster"];
        $new_poster = time() . ' - ' . $poster->getClientOriginalName();
        
        $query = DB::table('anime')->insert([
            "judul" => $request["judul"],
            "sinopsis" => $request["sinopsis"],
            "type" => $request["type"],
            "episode_count" => $request["episode_count"],
            "status" => $request["status"],
            "aired_date" => $request["aired_date"],
            "producer" => $request["producer"],
            "studio" => $request["studio"],
            "video_link" => $request["video_link"],
            "genre_id" => $request["genre_id"],
            "poster" => $new_poster
        ]); 

        $poster->move('poster', $new_poster);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anime = DB::table('anime')->where('id', $id)->first();
        return view('show-content.anime.show', compact('anime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anime = DB::table('anime')->where('id', $id)->first();
        $listgenre = DB::table('genre')->get();
        return view('show-content.anime.edit', compact('listgenre', 'anime'));
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
        $request->validate([
            'judul' => 'required',
            'sinopsis' => 'required',
            'type' => 'required',
            'episode_count' => 'required',
            'status' => 'required',
            'aired_date' => 'required',
            'producer' => 'required',
            'studio' => 'required',
            'video_link' =>  'required',
            'poster' =>  'required|mimes:jpeg,jpg,png|max:2200',
            'genre_id' =>  'required'
        ]);

        $anime = DB::table('anime')->where('id', $id)->first();

        if ($request->has('poster')){
            $path = "poster";
            File::delete($path . $anime->poster);
            $poster = $request["poster"];
            $new_poster = time() . ' - ' . $poster->getClientOriginalName();
            $poster->move('/poster', $new_poster);
            $query = DB::table('anime')
                    ->where('id', $id)
                    ->update([
                        "judul" => $request['judul'],
                        "sinopsis" => $request['sinopsis'],
                        "type" => $request['type'],
                        "episode_count" => $request['episode_count'],
                        "status" => $request['status'],
                        "aired_date" => $request['aired_date'],
                        "producer" => $request['producer'],
                        "studio" => $request['studio'],
                        "video_link" => $request['video_link'],
                        "genre_id" => $request['genre_id'],
                        "poster" => $new_poster
        ]); 
        
        }else{
            $query = DB::table('anime')
                    ->where('id', $id)
                    ->update([
                        "judul" => $request['judul'],
                        "sinopsis" => $request['sinopsis'],
                        "type" => $request['type'],
                        "episode_count" => $request['episode_count'],
                        "status" => $request['status'],
                        "aired_date" => $request['aired_date'],
                        "producer" => $request['producer'],
                        "studio" => $request['studio'],
                        "video_link" => $request['video_link'],
                        "genre_id" => $request['genre_id']
        ]); 
        }

        
        return redirect('\home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anime = DB::table('anime')->where('id', $id)->first();
        $anime->delete();

        $path = "poster";
        File::delete($path . $anime->poster);
        return redirect()->route('/home');
    }
}
