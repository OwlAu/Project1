<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Society;
use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\EventFeedback;
use App\Models\EventView;
use Auth;
use DB;

class EventParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function displayParticipants($id)
    {
        $userId = Auth::user()->studentId;
        $club_id = Society::where('user_id',$userId)->first()->id;
        
        $participantsInfo = EventParticipant::where('event_id',$id)->get();
        $eventInfo = Event::where('club_id',$club_id)->first();

        $feedbacks = EventFeedback::where('event_id',$id)->get();
        $views = EventView::where('event_id',$id)->get();
        $participants = EventParticipant::where('event_id',$id)->get();
        $eventInfo = Event::find($id);

        //Get the converstion rate
        $eventViews = EventView::where('event_id',$id)->get()->count();
        $eventParticipantsCount = EventParticipant::where('event_id',$id)->get()->count();
        $eventParticipants = EventParticipant::where('event_id',$id)->get();
        $conversionRate = $eventParticipantsCount/$eventViews;
        

        return view('eventParticipant')
        ->with('feedbacks',$feedbacks)
        ->with('eventViews',$eventViews)
        ->with('eventParticipants',$eventParticipants)
        ->with('eventParticipantsCount',$eventParticipantsCount)
        ->with('eventInfo',$eventInfo)
        ->with('conversionRate',$conversionRate);
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
            'user_id' => ['required'],
            'event_id'=>['required'],
            'paymentImg'=>['required','image']
        ]);

        $eventRegisteration = new EventParticipant();

        $eventRegisteration->user_id = Auth::user()->studentId;
        $eventRegisteration->event_id=$request->input('event_id');
        $eventRegisteration->status='pending';

        if($request->hasfile('paymentImg')){
            $file=$request->file('paymentImg');
            $extension = $file ->getClientOriginalExtension();//getting paymentImg extension
            $filename = time().".".$extension;
            $file->move('uploads/eventRegisteration/',$filename);
            $eventRegisteration->paymentImg=$filename;
        } else {
            return $request;
            $hightlights->paymentImg='';
        }

        //Check if the user joined the society before.
        $validateUser = DB::table('event_participants')->where('event_id',$eventRegisteration->event_id)->where('user_id',$eventRegisteration->user_id)->first();
        
        if($validateUser===NULL){
            $eventRegisteration->save();
        } else{
            return view('joinedSocietyError');
        }

        return view('home');
        //return redirect('setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function acceptRegistration($eventId, $eventParticipantId)
    {
        $eventParticipant = EventParticipant::find($eventParticipantId);
        $eventParticipant->status = 'enrolled';
        $eventParticipant->save();

        return redirect('/home');
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

    public function eventRegistrationForm(Request $request){
        $eventId = $request->eventId;
        $eventInfo= Event::find($eventId);
        $userInfo = Auth::user();
        return view('eventRegistrationForm')
        ->with('eventInfo',$eventInfo)
        ->with('userInfo',$userInfo);
    }


}
