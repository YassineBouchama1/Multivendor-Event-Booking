<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller

{

    public function index()
    {
        $events = Event::get();
        // dd('dahsboar');
        return view('admin.index', compact('events'));
    }
}
