<?php

namespace App\Http\Controllers;

use App\Events\ReservationsRealTime;
use App\Http\Resources\EventsResource;
use App\Models\Category;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{




    public function index(Request $request)
    {


        $query = Event::query();

        // $query = Cache::remember('events', 60, function () {
        //     return Event::query();
        // });
        // iff passing a category_id, filter data by it
        if ($request->filled('category_id') && $request->input('category_id') !== 'null') {
            $query->where('category_id', '=', $request->input('category_id'));
        }

        // if passing a search filter data by it
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%$search%");
        }

        // filter out events with suspended owners
        $query->whereHas('user', function ($query) {
            $query->where('status', '!=', 'suspended');
        });

        // Exclude certain statuses
        $query->whereNotIn('status', ['ended', 'canceled', 'waiting']);

        $events = $query->paginate(5);


        // fetch all categories
        $categories = Category::all();



        // change formte data
        $eventsFil = EventsResource::collection($events);
        // dd($eventsFil);


        return view('guest.home', compact('eventsFil', 'categories'));
    }


    public function eventDetails(Event $event)
    {


        // if event expired or full display it
        if ($event->status === 'approved' || $event->status === 'fulled') {

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
