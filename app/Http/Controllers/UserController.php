<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\SocietyMember;
use App\Models\EventParticipant;
use App\Models\Confession;
class UserController extends Controller
{
    public function show(){
        $userInfo = Auth::user();
        $userId = $userInfo->studentId;
        $societiesInfo = SocietyMember::where('user_id','=',$userId)->get();
        $eventsInfo = EventParticipant::where('user_id','=',$userId)->get();
        $confessions = Confession::where('user_id','=',$userId)->get();
        return view('profile')
        ->with('userInfo',$userInfo)
        ->with('societiesInfo',$societiesInfo)
        ->with('eventsInfo', $eventsInfo)
        ->with('confessions',$confessions);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
  
        /* $request->validate([
            
        ]); */

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->studentId = $request->input('studentId');
        $user->faculty = $request->input('faculty');

        if($request->hasfile('profilePic')){
            $file=$request->file('profilePic');
            $extension = $file ->getClientOriginalExtension();//getting profilePic extension
            $filename = time().".".$extension;
            $file->move('uploads/profilePic/',$filename);
            $user->profilePic=$filename;
        }

        $user->save();

        return redirect('home');
    }
}
