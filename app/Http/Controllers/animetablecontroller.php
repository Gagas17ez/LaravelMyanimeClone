<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anime;
use App\genre;
use App\profile;
use App\User;
use Auth;
use File;
use DB;

class animetablecontroller extends Controller
{
    public function show()
    {
        $listuser = DB::table('users')
                                ->select('users.id as user_id', 'users.name as user_name', 'users.email as user_email', 'users.password as user_password')->get();
        
        $profile = $this->profile();
        //dd($listanimeterbaru);
        $short = 'profilepic/';
        $anime = DB::table('anime')->get();
        //dd($comment);
        return view('show-content.anime.table', compact('anime','listuser', 'listgenre', 'short', 'profile'));
    }
}
