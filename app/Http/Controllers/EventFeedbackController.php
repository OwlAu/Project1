<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventView;
use App\Models\EventParticipant;
use App\Models\EventFeedback;
use App\Models\Society;
use App\Models\Event;
use Auth;

class EventFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->studentId;
        $societyId = Society::where('user_id','=',$userId)->first()->id;
        $eventId = Event::where('club_id','=',$societyId)->first()->id;
     
        $eventsInfo = Event::where('club_id','=',$societyId)->get();
        $feedbacks = EventFeedback::where('event_id','=',$eventId)->get();


        return view('viewEventFeedback')
        ->with('feedbacks',$feedbacks)
        ->with('eventsInfo',$eventsInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Retrieve user id
        $userId = Auth::user()->studentId;

        $eventId = $request->event_id;

        $newFeedback = new EventFeedback;
        $newFeedback->feedback = $request->feedback;
        $newFeedback->event_id = $request->event_id;
        $newFeedback->user_id = $userId;
        $newFeedback->save();
    
        
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
        $feedbacks = EventFeedback::where('event_id',$id)->get();
        $views = EventView::where('event_id',$id)->get();
        $participants = EventParticipant::where('event_id',$id)->get();
        $eventInfo = Event::find($id);

        //Get the converstion rate
        $eventViews = EventView::where('event_id',$id)->get()->count();
        $eventParticipantsCount = EventParticipant::where('event_id',$id)->get()->count();
        $eventParticipant = EventParticipant::where('event_id',$id)->get();
        $conversionRate = $eventParticipantsCount/$eventViews;
        
        return view('viewEventFeedbackDetail')
        ->with('feedbacks',$feedbacks)
        ->with('eventViews',$eventViews)
        ->with('eventParticipant',$eventParticipant)
        ->with('eventParticipantsCount',$eventParticipantsCount)
        ->with('eventInfo',$eventInfo)
        ->with('conversionRate',$conversionRate);

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
        //
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

    public function displayFeedbacks($id){
        $feedbacks = EventFeedback::where('event_id',$id)->get();
        $views = EventView::where('event_id',$id)->get();
        $participants = EventParticipant::where('event_id',$id)->get();
        $eventInfo = Event::find($id);

        //Get the converstion rate
        $eventViews = EventView::where('event_id',$id)->get()->count();
        $eventParticipantsCount = EventParticipant::where('event_id',$id)->get()->count();
        $eventParticipant = EventParticipant::where('event_id',$id)->get();
        $conversionRate = $eventParticipantsCount/$eventViews;
        
        return view('eventFeedback')
        ->with('feedbacks',$feedbacks)
        ->with('eventViews',$eventViews)
        ->with('eventParticipant',$eventParticipant)
        ->with('eventParticipantsCount',$eventParticipantsCount)
        ->with('eventInfo',$eventInfo)
        ->with('conversionRate',$conversionRate);
    }
}
