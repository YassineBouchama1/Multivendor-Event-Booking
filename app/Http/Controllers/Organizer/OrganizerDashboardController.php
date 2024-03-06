<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerDashboardController extends Controller

{

    public function index()
    {
        $events = Event::get();
        $reservations =  Auth::user()->reservations;


        //bring all counts of events and reservations
        $eventWaiting = Auth::user()->events->where('status', '=', 'waiting')->count();
        $activeEvents = Auth::user()->events->where('status', '=', 'approved')->count();
        $reservationsCount = Auth::user()->reservations->count();

        // dd('dahsboar');
        return view('organizer.index', compact('events', 'eventWaiting', 'activeEvents', 'reservations', 'reservationsCount'));
    }
}
