<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    public function show(){
        $userInfo = Auth::user();
        return view('profile')->with('userInfo',$userInfo);
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
