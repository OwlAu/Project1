<?php

namespace App\Http\Controllers;

use App\Models\Society;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Auth;

class AnnouncementController extends Controller
{
    //Create new announcement
    public function store(Request $request){

        //Search out the society_id
        $user_id = Auth::user()->studentId;
        $societies = Society::all();
        $societyInfo = $societies->where('user_id',$user_id)->first();
        $society_id = $societyInfo->id;


        $newAnnouncement = new Announcement();
        $newAnnouncement->title=$request->input('title');
        $newAnnouncement->description=$request->input('description');
        $newAnnouncement->club_id=$society_id;

        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension = $file ->getClientOriginalExtension();//getting image extension
            $filename = time().".".$extension;
            $file->move('uploads/announcementImage/',$filename);
            $newAnnouncement->image=$filename;
        } else {
            return $request;
            $hightlights->image='';
        }

        $newAnnouncement->save();

        //return view('setting')->with('setting',$newAnnouncement);
        return redirect('setting');
    } 

    //Display all the announcment that related to this society.
    public function display(){
        $announcements= Announcement::all();
        return view('announcementList')->with('announcements',$announcements);
    }
}
