<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anime;
use App\genre;
use Auth;
use File;
use DB;

class animecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function profile(){
        $nowid = Auth::user()->id;
        $profile = DB::table('profile')
        ->where('profile.user_id', $nowid)
        ->join('users', 'profile.user_id', '=', 'users.id')
        ->select('profile.user_id as user_id', 'users.email as user_email', 'profile.profile_pic as profile_pic')->first();
        return $profile;
    }
    public function genre(){$listgenre = DB::table('genre')->get(); return $listgenre;}
    


    

    public function index()
    {   
        $listanime = DB::table('anime')->get();
        //$listgenre = DB::table('genre')->get();
        $listanimeterbaru = DB::select('select * from anime inner join genre on genre_id = genre.id order by aired_date desc limit 3'); 
        //dd($listanimeterbaru);
        $listgenre = $this->genre();
        $profile = $this->profile();
        $short = 'poster/';
        return view('show-content.anime.index', compact('listgenre', 'profile', 'listanime', 'listanimeterbaru', 'short'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listgenre = $this->genre();
        $profile = $this->profile();
        return view('show-content.anime.create',compact('listgenre', 'profile'));
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
            'poster' =>  'required|mimes:jpeg,jpg,png|max:5200',
            'poster_wide' => 'required|mimes:jpeg,jpg,png|max:5200',
            'genre_id' =>  'required'
        ]);

        $poster = $request["poster"];
        $new_poster = time() . ' - ' . $poster->getClientOriginalName();
        $poster_wide = $request["poster_wide"];
        $new_poster_wide = time() . ' - ' . $poster_wide->getClientOriginalName();
        
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
            "poster" => $new_poster,
            "poster_wide" => $new_poster_wide
        ]); 

        $poster->move('poster', $new_poster);
        $poster_wide->move('poster_wide', $new_poster_wide);
        return redirect('/anime')->with('success', $request['judul'].'Anime has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listuser = DB::table('users')
                                ->select('users.id as user_id', 'users.name as user_name', 'users.email as user_email', 'users.password as user_password')->get();
        
        $profile = $this->profile();
        $listanime = DB::table('anime')->get();
        //dd($listanimeterbaru);
        $short = 'profilepic/';
        $anime = DB::table('anime')->where('id', $id)->first();
        $listgenre = DB::table('genre')->get();
        if (!is_null($anime->viewcount))
        { $addview = $anime->viewcount + 1; $animechangeview = DB::table('anime')->where('id', $id)->update(['viewcount' => $addview]);}
        else
        {$animechangeview = DB::table('anime')->where('id', $id)->update(['viewcount' => 1]);}
        $comment = DB::table('komentar')->where('anime_id', $id)->join('profile', 'komentar.user_idkomen', '=', 'profile.user_id')->get();
        //dd($comment);
        return view('show-content.anime.detail', compact('comment','anime','listgenre','short','profile','listuser','listanime'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listuser = DB::table('users')
                                ->select('users.id as user_id', 'users.name as user_name', 'users.email as user_email', 'users.password as user_password')->get();
        
        $profile = $this->profile();;
        
        //dd($listanimeterbaru);
        $short = 'profilepic/';
        $anime = DB::table('anime')->where('id', $id)->first();
        //dd($anime);
        $listgenre = DB::table('genre')->get();
        return view('show-content.anime.edit', compact('listgenre', 'anime','listuser','profile'));
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
        $listuser = DB::table('users')
                                ->select('users.id as user_id', 'users.name as user_name', 'users.email as user_email', 'users.password as user_password')->get();
        $listgenre = DB::table('genre')->get();
        $profile = $this->profile();;
        
        //dd($listanimeterbaru);
        $short = 'profilepic/';
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
            $poster->move('poster', $new_poster);
            $poster_wide = $request["poster_wide"];
            $new_poster_wide = time() . ' - ' . $poster_wide->getClientOriginalName();
            $poster_wide->move('poster_wide', $new_poster_wide);
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
                        "poster" => $new_poster,
                        "poster_wide" => $new_poster_wide
        ]); 
        }
        return redirect('/anime')->with('success', $request['judul'].'Anime has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = DB::table('komentar')->where('anime_id', $id)->delete();
        $anime = DB::table('anime')->where('id', $id)->first();
        $path = 'poster';
        $path2 = 'poster_wide';
        File::delete($path . $anime->poster);
        File::delete($path2 . $anime->poster);
        $query = DB::table('anime')->where('id', $id)->delete();
        
        return redirect('/anime/table')->with('deleted', 'Anime has been deleted');
    }
}
