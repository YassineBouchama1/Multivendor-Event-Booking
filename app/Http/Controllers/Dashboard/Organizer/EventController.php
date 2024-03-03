<?php

namespace App\Http\Controllers\Dashboard\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {

        $events = Event::get();



        return view('dashboard.events.index', compact('events'));
    }



    public function create()
    {
        $categories = Category::get();
        return view('dashboard.events.create', compact('categories'));
    }




    public function store(Request $request)
    {
        // Validate  request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'cover' => 'required|image',
            'description' => 'required|string',
            // 'location_latitude' => 'required|numeric',
            // 'location_longitude' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',            'date' => 'required|date',
            'price' => 'required|numeric',
            'places' => 'required|integer',
            'reservation_method' => 'required|in:manual,automatic',
        ]);

        $image = $request->file('cover');

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('events'), $imageName);

        //get organizer_id
        $validatedData['organizer_id'] = Auth::id();
        $validatedData['location_latitude'] = 32.288281907159664;
        $validatedData['location_longitude'] = -9.22502082808233;
        $validatedData['cover'] = $imageName;

        // Create a new event
        $event = Event::create($validatedData);

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }
}
