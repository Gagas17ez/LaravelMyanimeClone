<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Auth;

class profilecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = profile::where('user_id', Auth::users()->id)->first();
        return view('emboh.index', compact('profile'));
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
        $this->validate($request, [
            'no_tlp' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'bio' => 'required',
            'profile_pic' =>  'required|mimes:jpeg,jpg,png|max:2200',

        ]);

        $profile = $request->profile;
        $new_profile = time() . ' - ' . $profile->getClientOriginalName();

        profile::create([
            "no_tlp" => $request->no_tlp,
            "tgl_lahir" => $request->tgl_lahir,
            "tempat_lahir" => $request->tempat_lahir,
            "bio" => $request->bio,
            "profile_pic" => $new_profile,
            "user_id" => Auth::user()->id
        ]); 

        $poster->move('/profilepic', $new_profile);
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
        $this->validate($request, [
            'no_tlp' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'bio' => 'required',
            'profile_pic' => 'required|mimes:jpeg,jpg,png|max:5000',

        ]);

        $profile = profile::findorfail($id);

        if ($request->has('profile_pic')){
            $path = "/profilepic";
            File::delete($path . $profile->profile_pic);
            $profile_pic = $request->profile_pic;
            $new_profile = time() . ' - ' . $profile_pic->getClientOriginalName();
            $profile_pic->move('/profilepic', $new_poster);
            $post_data = [
            "no_tlp" => $request->no_tlp,
            "tgl_lahir" => $request->tgl_lahir,
            "tempat_lahir" => $request->tempat_lahir,
            "bio" => $request->bio,
            "profile_pic" => $new_profile,
        ]; 
        
        }else{
            $post_data = [
                "no_tlp" => $request->no_tlp,
                "tgl_lahir" => $request->tgl_lahir,
                "tempat_lahir" => $request->tempat_lahir,
                "bio" => $request->bio,
            ];
        }

        $profile->update($post_data);
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
        //
    }
}
