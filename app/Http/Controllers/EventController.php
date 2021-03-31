<?php

namespace App\Http\Controllers;

use App\Models\Society;
use App\Models\Event;
use Illuminate\Http\Request;
use Auth;

class EventController extends Controller
{
    public function store(Request $request){
        /* $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required','max:1000','min:5'],
            'image'=>['required']
        ]); */

        //Search out the society_id
        $user_id = Auth::user()->studentId;
        $societies = Society::all();
        $societyInfo = $societies->where('user_id',$user_id)->first();
        $society_id = $societyInfo->id;

        $newEvent = new Event();
        $newEvent->title=$request->input('title');
        $newEvent->description=$request->input('description');
        $newEvent->eventFees=$request->input('eventFees');
        $newEvent->eventRegistration=$request->input('eventRegistration');
        $newEvent->eventDate=$request->input('eventDate');
        $newEvent->club_id=$society_id;

        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension = $file ->getClientOriginalExtension();//getting image extension
            $filename = time().".".$extension;
            $file->move('uploads/announcementImage/',$filename);
            $newEvent->image=$filename;
        } else {
            return $request;
            $hightlights->image='';
        }

        $newEvent->save();

        //return view('setting')->with('setting',$newEvent);
        return redirect('setting');
    } 

    public function display(){
        /* $user_id = Auth::user()->studentId;
        $societies = Society::all();
        $societyInfo = $societies->where('user_id',$user_id)->first();
        $society_id = $societyInfo->id; */

        $events= Event::all();

        return view('eventList')->with('events',$events);
    }

    //Extract society info for user to view.(/event)
    public function userviewEventPage(){
        //$societies = Society::all();
        $events = Event::paginate(8);
        return view('event')->with('events',$events);
    }
}
