<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocietyMemberController extends Controller
{
    public function displayPendingList(){
        return view('displayPendingList');
    }


}
