<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SocietyMember;
use App\Models\Society;
use App\Models\User;
use Auth;
use Illuminate\Validation\Rule;


class SocietyMemberController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function displayPendingList(){
        return view('displayPendingList');
    }
    public function index($id){
        $societyInfo = Society::find($id);
        return view('registerSocietyForm')->with('societyInfo',$societyInfo);
    }

    public function store(Request $request){
         $request->validate([
            'user_id' => ['required'],
            'club_id'=>['required'],
            'paymentImg'=>['required','image']
        ]);

        $memberRegistration = new SocietyMember();

        $memberRegistration->user_id=$request->input('user_id');
        $memberRegistration->club_id=$request->input('club_id');
        $memberRegistration->status='pending';

        if($request->hasfile('paymentImg')){
            $file=$request->file('paymentImg');
            $extension = $file ->getClientOriginalExtension();//getting paymentImg extension
            $filename = time().".".$extension;
            $file->move('uploads/memberRegistration/',$filename);
            $memberRegistration->paymentImg=$filename;
        } else {
            return $request;
            $hightlights->paymentImg='';
        }

        //Check if the user joined the society before.
        $validateUser = DB::table('society_members')->where('club_id',$memberRegistration->club_id)->where('user_id',$memberRegistration->user_id)->first();
        
        if($validateUser===NULL){
            $memberRegistration->save();
        } else{
            return view('joinedSocietyError');
        }

        return view('home');
        //return redirect('setting');
    }

    //Display user registration request.(Pending)
    public function displayPendingUser(){
        $pendingUsers = SocietyMember::where('status','=','pending')->get();
        return view('displayPendingUser')->with('pendingUsers',$pendingUsers);
    }

    //Accept user request
    public function acceptSocietyRequest(Request $request){
        //Get user id
        $userId = $request->user_id;
        //Search for user details
        $member=SocietyMember::where('user_id','=',$userId)->first();
        //Change status to "enrolled"
        $member->status='enrolled';
        $member->save();

        $pendingUsers = SocietyMember::where('status','=','pending')->get();
        return view('displayPendingUser')->with('pendingUsers',$pendingUsers);

    }

    //Deny user request
    public function denySocietyRequest(Request $request){
        //Get user id
        $userId = $request->user_id;
        //Search for user details
        $member=SocietyMember::where('user_id','=',$userId)->first();
        //Change status to "deny"
        $member->status='deny';
        $member->save();

        $pendingUsers = SocietyMember::where('status','=','pending')->get();
        return view('displayPendingUser')->with('pendingUsers',$pendingUsers);
    }

    //Kick out members
    public function kickSocietyRequest(Request $request){
        //Get user id
        $userId = $request->user_id;
        //Search for user details
        $member=SocietyMember::where('user_id','=',$userId)->first();
        //Change status to "deny"
        $member->status='deny';
        $member->save();

        $pendingUsers = SocietyMember::where('status','=','pending')->get();
        return redirect('/member_list')->with('pendingUsers',$pendingUsers);
    }

    //Display members.(Pending)
    public function displayMembers(){
        $pendingUsers = SocietyMember::where('status','=','enrolled')->get();
        return view('displayMembers')->with('pendingUsers',$pendingUsers);
    }

   

}
