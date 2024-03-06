<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{




    public function index(Request $request)
    {
        $query = Event::query();

        // iff passing a category_id, filter data by it
        if ($request->filled('category_id') && $request->input('category_id') !== 'null') {
            $query->where('category_id', '=', $request->input('category_id'));
        }

        // if passing a search filter data by it
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%$search%");
        }

        //
        $query->where('status', '!=', 'ended')
            ->where('status', '!=', 'canceled');

        $events = $query->paginate(1);

        // fetch all categories
        $categories = Category::all();

        return view('guest.home', compact('events', 'categories'));
    }


    public function eventDetails(Event $event)
    {

        if ($event->status === 'approved') {

            $carbonDate = Carbon::parse($event->start_date);
            // Get the month name
            $monthName = $carbonDate->format('F');
            // Get the day number
            $dayNumber = $carbonDate->format('d');
            // dd($event);
            return view('guest.eventDetails', compact('event'));
        }
        return 'expired or canceld';
    }


    public function registerUser()
    {
        return view('guest.registerUser');
    }
}
