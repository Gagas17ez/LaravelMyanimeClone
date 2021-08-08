<?php

namespace App\Http\Controllers;
use App\anime;
use App\genre;
use DB;
use File;
use Illuminate\Http\Request;

class genrecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listuser = DB::table('users')
                                ->select('users.id as user_id', 'users.name as user_name', 'users.email as user_email', 'users.password as user_password')->get();
        $profile = DB::table('profile')->get();
        
        //dd($listanimeterbaru);
        $short = 'profilepic/';
        $listgenre = DB::table('genre')->get();
        return view('show-content.genre.index', compact('listgenre','listuser','profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('show-content.genre.create');
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
            'genre' => 'required'
        ]);

        $query = DB::table('genre')->insert([
            "genre" => $request["genre"]
        ]);
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
        $genrefilm = DB::table('anime')->where('genre_id', $id)->first();
        return view('show-content.genre.show',compact('genrefilm'));
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
        $profile = DB::table('profile')->get();
        $listgenre = DB::table('genre')->get();
        $genre = DB::table('genre')->where('id', $id)->first();
        return view('show-content.genre.edit', compact('genre','listgenre','profile','listuser'));
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
            'genre' => 'required'
        ]);

        $genre = DB::table('genre')->where('id', $id)->first();
        
        $query = DB::table('genre')
                    ->where('id', $id)
                    ->update([
                        "genre" => $request["genre"]        
        ]); 
        return redirect('/anime');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = DB::table('genre')->where('id', $id)->first();
        $genre->delete();
        return redirect()->route('/home');
    }
}
