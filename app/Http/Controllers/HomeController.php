<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
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

        $events = $query->paginate(1);

        // fetch all categories
        $categories = Category::all();

        return view('guest.home', compact('events', 'categories'));
    }


    public function eventDetails(Event $event)
    {
        // dd($event);
        return view('guest.eventDetails', compact('event'));
    }


    public function registerUser()
    {
        return view('guest.registerUser');
    }
}
