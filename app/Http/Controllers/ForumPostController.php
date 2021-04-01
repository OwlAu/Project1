<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Society;
use App\Models\ForumPost;

class ForumPostController extends Controller
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
            'title' => ['required', 'string', 'max:150'],
            'image'=>['required']
        ]);

        //Search out the society_id
        $user_id = Auth::user()->studentId;
        $societies = Society::all();
        $societyInfo = $societies->where('user_id',$user_id)->first();
        $society_id = $societyInfo->id;


        $newForum = new ForumPost();
        $newForum->title=$request->input('title');
        $newForum->club_id=$society_id;

        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension = $file ->getClientOriginalExtension();//getting image extension
            $filename = time().".".$extension;
            $file->move('uploads/announcementImage/',$filename);
            $newForum->image=$filename;
        } else {
            return $request;
            $hightlights->image='';
        }

        $newForum->save();

        //$announcements = DB::table('announcements')->where('club_id', '=', $society_id)->get();

        //return view('setting')->with('setting',$newForum);
        //return view('announcementList')->with('announcements',$announcements);
        return view('home');
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

    public function createForumForm(){
        return view('createForumForm');
    }
}
