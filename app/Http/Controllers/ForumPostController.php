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
    public function index(Request $request)
    {
        $societyId = $request->id;
        
        $forums = ForumPost::where('club_id','=',$societyId)->get();
        $societyInfo=Society::find($societyId);

        return view('displaySocietyForum')->with('forums',$forums)->with('societyInfo',$societyInfo);
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
            $file->move('uploads/forumImage/',$filename);
            $newForum->image=$filename;
        } else {
            return $request;
            $hightlights->image='';
        }

        $newForum->save();

        $forums = ForumPost::where('club_id','=',$society_id);
        return redirect('/society_forum_list');
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
        $forum = ForumPost::find($id);
        $forum->delete();
        return redirect('/forum_list');
    }

    public function createForumForm(){
        return view('createForumForm');
    }

    public function societyForumList(){
        $userId = Auth::user()->studentId;
        $societyInfo = Society::where('user_id','=',$userId)->first();
        $societyId = $societyInfo->id;

        $forums = ForumPost::where('club_id','=',$societyId)->get();

        return view('societyForumList')->with('forums',$forums);
    }
}
