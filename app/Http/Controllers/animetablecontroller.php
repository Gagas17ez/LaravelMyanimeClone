<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\User;
use App\anime;
use App\genre;
use Auth;
use File;
use DB;

class animetablecontroller extends Controller
{

        public function profile(){
        $nowid = Auth::user()->id;
        $profile = DB::table('profile')
        ->where('profile.user_id', $nowid)
        ->join('users', 'profile.user_id', '=', 'users.id')
        ->select('profile.user_id as user_id', 'users.email as user_email', 'profile.profile_pic as profile_pic')->first();
        return $profile;
        }
        public function genre(){$listgenre = DB::table('genre')->get(); return $listgenre;}
        
    public function show()
    {
        $listuser = DB::table('users')
                                ->select('users.id as user_id', 'users.name as user_name', 'users.email as user_email', 'users.password as user_password')->get();
        //$listgenre = DB::table('genre')->get();
        //$profile = DB::table('profile')->get();
        $listgenre = $this->genre();
        $profile = $this->profile();
        //dd($listanimeterbaru);
        $short = 'profilepic/';
        //dd($listuser);
        $anime = DB::table('anime')->join('genre', 'anime.genre_id', '=', 'genre.id')->select('anime.id as id', 'anime.judul as judul', 'anime.sinopsis as sinopsis', 'genre.genre as genre', 'anime.type as type', 'anime.episode_count as episode_count', 'anime.status as status', 'anime.aired_date as aired_date', 'anime.poster as poster')->get();
        //dd($comment);
        //dd($anime);
        return view('show-content.anime.table', compact('anime', 'listuser', 'listgenre', 'short', 'profile'));
    }
}
