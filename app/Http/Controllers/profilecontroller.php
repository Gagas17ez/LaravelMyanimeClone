<?php

namespace App\Http\Controllers;
use Auth;
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

    public function profile(){
        $profile = DB::table('profile')
        ->join('users', 'profile.user_id', '=', 'users.id')
        ->select('profile.user_id as user_id', 'users.email as user_email', 'profile.profile_pic')->first();
        return $profile;
    }
    public function genre(){$listgenre = DB::table('genre')->get(); return $listgenre;}
    public function user(){$user = Auth::user(); return $user;}


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
        $listgenre = $this->genre();
        $profile = $this->profile();
        $user = $this->user();
        //dd($user);
        return view('show-content.profile.create', compact('profile', 'listgenre', 'user'));
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
            'no_tlp' => 'required|alpha_num',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'bio' => 'required',
            'profile_pic' => 'required|mimes:jpeg,jpg,png|max:5200'
        ]);

        $profile_pic = $request["profile_pic"];
        $new_profile_pic = time() . ' - ' . $profile_pic->getClientOriginalName();
        
        // $updateInsert = DB::table('profile')
        // ->updateOrInsert(
        //     ['user_id' => Auth::user()->id],
        //     [
        //         "no_tlp" => $request["no_tlp"],
        //         "tgl_lahir" => $request["tgl_lahir"],
        //         "tempat_lahir" => $request["tempat_lahir"],
        //         "bio" => $request["bio"],
        //         "profile_pic" => $new_profile_pic
        //     ]
        // );

        if ($request->has('profile_pic')){
            $path = "profilepic";
            $profile = $this->profile();
            File::delete($path . $profile->profile_pic);
            $profile_pic = $request["profile_pic"];
            $new_profile_pic = time() . ' - ' . $profile_pic->getClientOriginalName();
            $profile_pic->move('profilepic', $new_profile_pic);
            $updateInsert = DB::table('profile')
            ->updateOrInsert(
                ['user_id' => Auth::user()->id],
                [
                    "no_tlp" => $request["no_tlp"],
                    "tgl_lahir" => $request["tgl_lahir"],
                    "tempat_lahir" => $request["tempat_lahir"],
                    "bio" => $request["bio"],
                    "profile_pic" => $new_profile_pic
                ]
            ); 
        }else{
            $updateInsert = DB::table('profile')
            ->updateOrInsert(
                ['user_id' => Auth::user()->id],
                [
                    "no_tlp" => $request["no_tlp"],
                    "tgl_lahir" => $request["tgl_lahir"],
                    "tempat_lahir" => $request["tempat_lahir"],
                    "bio" => $request["bio"],
                ]
            );
        }

        
        return redirect('/profile/create');
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
