<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminDashboardController extends Controller

{

    public function index()
    {
        $events = Event::get();
        // dd('dahsboar');

        // count normal users using Spatie roles
        $usersCount = Role::where('name', 'user')->first()->users()->count();
        $organizersCount = Role::where('name', 'organizer')->first()->users()->count();

        $eventCount = Event::count();


        return view('admin.index', compact('events', 'eventCount', 'usersCount', 'organizersCount'));
    }
}
