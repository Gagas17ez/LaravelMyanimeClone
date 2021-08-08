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
        $profile = DB::table('profile')
            ->join('users', 'profile.user_id', '=', 'users.id')
            ->select('profile.user_id as user_id', 'users.email as user_email', 'profile.profile_pic as
            profile_pic')->first();
        return $profile;
    }
    public function genre(){$listgenre = DB::table('genre')->get(); return $listgenre;}
    public function show()
    {
        $listuser = DB::table('users')
                                ->select('users.id as user_id', 'users.name as user_name', 'users.email as user_email', 'users.password as user_password')->get();
        $listgenre = $this->genre();;
        $profile = $this->profile();;
        
        //dd($listanimeterbaru);
        $short = 'profilepic/';
        //dd($listuser);
        $anime = DB::table('anime')->get();
        //dd($comment);
        return view('show-content.anime.table', compact('anime', 'listuser', 'listgenre', 'short', 'profile'));
    }
}
