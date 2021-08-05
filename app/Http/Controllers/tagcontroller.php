<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anime;
use App\tag;

class tagcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listtag = genre::all();
        return view('emboh.index', compact('$listtag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emboh.create');
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
            'genre' => 'required|unique:genre'
        ]);

        $genre = genre::create([
            "genre" => $request->genre,
        ]); 
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
        //gabutuh cok lakok isine id mbek genre siji tok gabut a
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = genre::findorfail($id);
        return view('emboh.edit', compact('genre'));
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
            'genre' => 'required|unique:genre'
        ]);

        $genre = genre::findorfail($id);
        
        $post_data = [
            "genre" => $request->genre,
        ];
        $genre->update($post_data);
        return redirect('/embuhken');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = genre::findorfail($id);
        $genre->delete();
        return redirect()->route('embuh');
    }
}
