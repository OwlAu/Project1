<?php

namespace App\Http\Controllers;

use App\Models\EventView;
use App\Models\EventFeedback;
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
        $newEvent->maxParticipants=$request->input('maxParticipants');
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

    public function userviewEventDetailPage($id){
        $userId = Auth::user()->id;

        $eventInfo=Event::find($id);
        $eventId=$eventInfo->id;
        $societyId = $eventInfo->club_id;
        $societyInfo = Society::find($societyId);
        $feedbacks = EventFeedback::where('event_id','=',$eventId)->orderByDesc('created_at')->get();
    
        /* Event View function */
        $newEventView = new EventView();
        $newEventView->user_id = $userId;
        $newEventView->event_id = $eventId;
        $newEventView->save();

        return view('eventDetail')
        ->with('eventInfo',$eventInfo)
        ->with('societyInfo',$societyInfo)
        ->with('feedbacks',$feedbacks);
    }

    //Extract society info for user to view.(/event)
    public function userviewEventPage(){
        //$societies = Society::all();
        $events = Event::paginate(8);
        return view('event')->with('events',$events);
    }

    public function displaySocietyEvent(Request $request){
        $clubId = $request->id;
        $events = Event::where('club_id','=',$clubId)->get();
        $societyInfo = Society::find($clubId);

        return view('displaySocietyEvents')
        ->with('events',$events)
        ->with('societyInfo',$societyInfo);
    }

    public function displaySocietyEventDetail(Request $request){
        $userId = Auth::user()->id;

        $clubId = $request->societyId;
        $eventId = $request->eventId;
        $event = Event::where('id','=',$eventId)->first();
        $societyInfo = Society::find($clubId);
        $feedbacks = EventFeedback::where('event_id','=',$eventId)->orderByDesc('created_at')->get();

        /* Event view function */
        $newEventView = new EventView();
        $newEventView->user_id = $userId;
        $newEventView->event_id = $eventId;
        $newEventView->save();

        return view('displaySocietyEventsDetail')
        ->with('eventInfo',$event)
        ->with('societyInfo',$societyInfo)
        ->with('feedbacks',$feedbacks);

    }

}
