<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Facade\DB;
use App\Models\Society;
use Auth;

class SocietyController extends Controller
{
    public function index(){
        return view('setting');
    }

    
    //Add new society
    public function store(Request $request){
        $societyProfile = new Society();

        $societyProfile->name=$request->input('name');
        $societyProfile->description=$request->input('description');
        $societyProfile->user_id=$request->input('user_id');
        $societyProfile->societyAvailability=$request->input('societyAvailability');
        $societyProfile->societyFees=$request->input('societyFees');

        if($request->hasfile('logo')){
            $file=$request->file('logo');
            $extension = $file ->getClientOriginalExtension();//getting image extension
            $filename = time().".".$extension;
            $file->move('uploads/societyLogo/',$filename);
            $societyProfile->logo=$filename;
        } else {
            return $request;
            $hightlights->logo='';
        }

        $societyProfile->save();

        return view('setting')->with('societyInfo',$societyProfile);
        

    } 

    //Display society info
    public function display(){
        $user_id = Auth::user()->studentId;
        $societies = Society::all();
        $societyInfo = $societies->where('user_id',$user_id)->first();
        //$societyInfo = Society::all()->first();
        return view('setting')->with('societyInfo',$societyInfo);
    }

    //Display update form
    public function updateView($id){
        $societyProfile = Society::find($id);
        return view('societyUpdateForm')->with('societyProfile',$societyProfile);
    }

    //Update society profile info
    public function update(Request $request,$id){
        $societyProfile = Society::find($id);

        $societyProfile->name = $request->input('name');
        $societyProfile->description = $request->input('description');
        $societyProfile->societyAvailability = $request->input('societyAvailability');
        $societyProfile->societyFees = $request->input('societyFees');
        $societyProfile->user_id = $request->input('user_id');

        if($request->hasfile('logo')){
            $file=$request->file('logo');
            $extension = $file ->getClientOriginalExtension();//getting image extension
            $filename = time().".".$extension;
            $file->move('uploads/societyLogo/',$filename);
            $societyProfile->logo=$filename;
        }

        $societyProfile->save();

        return redirect('setting')->with('societyInfo',$societyProfile);

    }

    //Extract society info for user to view.(/Society)
    public function userviewSocietyPage(){
        //$societies = Society::all();
        $societies = Society::paginate(8);
        return view('society')->with('societies',$societies);
    }

}
