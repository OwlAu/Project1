<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confession;
use Auth;

class ConfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confessions = Confession::all()->sortByDesc('created_at');
        return view('confession')->with('confessions',$confessions);
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

        $newConfession = new Confession;
        $newConfession->content = $request->content;
        $newConfession->user_id = $userId;
        $newConfession->save();
        
        $confessions = Confession::all();
        return redirect('confession')->with('confessions',$confessions);
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
}
