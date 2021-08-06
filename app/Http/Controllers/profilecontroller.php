<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use DB;
use File;

class profilecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('show-content.profile.create');
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
            'no_tlp' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'bio' => 'required',
            'profile_pic' => 'required|mimes:jpeg,jpg,png|max:5200'
        ]);

        $profile_pic = $request["profile_pic"];
        $new_profile_pic = time() . ' - ' . $profile_pic->getClientOriginalName();
        
        $query = DB::table('profile')->insert([
            "no_tlp" => $request["no_tlp"],
            "tgl_lahir" => $request["tgl_lahir"],
            "tempat_lahir" => $request["tempat_lahir"],
            "bio" => $request["bio"],
            "user_id" => Auth::user()->id,
            "profile_pic" => $new_profile_pic
        ]); 

        $profile_pic->move('profilepic', $new_profile_pic);
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
        $profile = DB::table('profile')->where('id', $id)->first();
        return view('show-content.profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('show-content.profile.edit');
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
            'no_tlp' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'bio' => 'required',
            'profile_pic' => 'required|mimes:jpeg,jpg,png|max:5200'
        ]);

        $profile = DB::table('anime')->where('id', $id)->first();

        if ($request->has('profile_pic')){
            $path = "profilepic";
            File::delete($path . $profile->profile_pic);
            $profile_pic = $request["profile_pic"];
            $new_profile_pic = time() . ' - ' . $profile_pic->getClientOriginalName();
            $poster->move('profilepic', $new_profile_pic);
            $query = DB::table('profile')
                    ->where('id', $id)
                    ->update([
                        "no_tlp" => $request["no_tlp"],
                        "tgl_lahir" => $request["tgl_lahir"],
                        "tempat_lahir" => $request["tempat_lahir"],
                        "bio" => $request["bio"],
                        "profile_pic" => $new_profile_pic
        ]); 
        }else{
            $query = DB::table('profile')
            ->where('id', $id)
            ->update([
                "no_tlp" => $request["no_tlp"],
                "tgl_lahir" => $request["tgl_lahir"],
                "tempat_lahir" => $request["tempat_lahir"],
                "bio" => $request["bio"]
                
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
        $profile = DB::table('anime')->where('id', $id)->first();
        $profile->delete();

        $path = "profilepic";
        File::delete($path . $profile->profile_pic);
        return redirect()->route('/home');
    }
}
