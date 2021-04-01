<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventParticipant;
use Auth;
use DB;

class EventParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function eventRegistrationForm(Request $request){
        $eventId = $request->eventId;
        $eventInfo= Event::find($eventId);
        $userInfo = Auth::user();
        return view('eventRegistrationForm')
        ->with('eventInfo',$eventInfo)
        ->with('userInfo',$userInfo);
    }


}
