<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\User;
use DB;
use File;


class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function profile(){
        $profile = DB::table('profile')
        ->join('users', 'profile.user_id', '=', 'users.id')
        ->select('profile.user_id as user_id', 'users.email as user_email')->first();
        return $profile;
    }
    public function genre(){$listgenre = DB::table('genre')->get(); return $listgenre;}


    public function index()
    {
        // $listanimeterbaru = DB::select('select users.id, users.name, users.email, users.password from users inner join profile on users.id = profile.user_id order by aired_date desc limit 3');
        
        $listuser = DB::table('users')
                                ->select('users.id as user_id', 'users.name as user_name', 'users.email as user_email', 'users.password as user_password', 'users.status as user_status')->get();
        $listgenre = $this->genre();
        $profile = $this->profile();
        
        //dd($listanimeterbaru);
        $short = 'profilepic/';
        //dd($listuser);
        return view('show-content.user.index', compact('listuser', 'listgenre', 'short', 'profile'));
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
        //
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
