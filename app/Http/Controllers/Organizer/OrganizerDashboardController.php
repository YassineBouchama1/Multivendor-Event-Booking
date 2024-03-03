<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizerDashboardController extends Controller

{

    public function index()
    {

        // dd('dahsboar');
        return view('organizer.index');
    }
}
