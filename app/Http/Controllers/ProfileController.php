<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile ;
use Illuminate\Http\bycrpt;
class ProfileController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        if($user->profile == null){
              $profile = Profile::create([
                 'province'=>'Aben',
                 'user_id'=>$id,
                 'gender'=>'Male',
                 'bio'=>'hello world',
                 'facebook'=>'https://www.facebook.com',
              ]);
        }
        return view('users.profile')->with('user', $user);
    }


    public function update(Request $request)
    {
        $this->validate ($request,[
            'name'=>'required',
            'province'=>'required',
            'gender'=>'required',
            'bio'=>'required',
        ]);
        $user = Auth::user();
        $user->name= $request->name;
        $user->profile->province= $request->province;
        $user->profile->gender= $request->gender;
        $user->profile->facebook= $request->facebook;
        $user->profile->bio= $request->bio;
        $user->profile-> save();
        // $use->save();
        $user->user-> save();

    return  redirect()->back();
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
