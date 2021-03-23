<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Society;


class SocietyController extends Controller
{
    public function index(){
        return view('setting');
    }

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

        //return view('setting')->with('setting',$societyProfile);
        return view('setting');

    } 

   
}
