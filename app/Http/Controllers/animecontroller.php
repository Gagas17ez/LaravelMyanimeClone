<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anime;
use App\genre;
use App\animeinfo;
use File;

class animecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $listanime = anime::all();
        return view('emboh.index', compact('listanime'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listgenre = genre::all();
        return view('emboh.create',compact('listgenre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|unique:cast',
            'sinopsis' => 'required',
            'video_link' =>  'required',
            'poster' =>  'required|mimes:jpeg,jpg,png|max:2200',
            'genre_id' =>  'required'
        ]);

        $poster = $request->poster;
        $new_poster = time() . ' - ' . $poster->getClientOriginalName();
        
        $anime = anime::create([
            "judul" => $request->judul,
            "sinopsis" => $request->sinopsis,
            "video_link" => $request->video_link,
            "genre_id" => $request->genre_id,
            "poster" => $new_poster,
        ]); 

        $poster->move('/poster', $new_poster);
        return redirect('emboh opo ken');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anime = anime::findorfail($id);
        return view('embuh.show', compact('anime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anime = anime::findorfail($id);
        $listgenre = genre::all();
        return view('emboh.edit', compact('listgenre', 'anime'));
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
        $this->validate($request, [
            'judul' => 'required|unique:cast',
            'sinopsis' => 'required',
            'video_link' =>  'required',
            'poster' =>  'required|mimes:jpeg,jpg,png|max:2200',
            'genre_id' =>  'required'
        ]);

        $anime = anime::findorfail($id);

        if ($request->has('poster')){
            $path = "/poster";
            File::delete($path . $anime->poster);
            $poster = $request->poster;
            $new_poster = time() . ' - ' . $poster->getClientOriginalName();
            $poster->move('/poster', $new_poster);
            $post_data = [
            "judul" => $request->judul,
            "sinopsis" => $request->sinopsis,
            "video_link" => $request->video_link,
            "genre_id" => $request->genre_id,
            "poster" => $new_poster,
        ]; 
        
        }else{
            $post_data = [
                "judul" => $request->judul,
                "sinopsis" => $request->sinopsis,
                "video_link" => $request->video_link,
                "genre_id" => $request->genre_id,
            ];
        }

        $anime->update($post_data);
        return redirect('/embuh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anime = anime::findorfail($id);
        $anime->delete();

        $path = "\poster";
        File::delete($path . $anime->poster);
        return redirect()->route('embuh');
    }
}
