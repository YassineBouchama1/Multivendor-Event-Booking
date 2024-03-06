<?php

namespace App\Http\Controllers\Organizer;

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



        return view('organizer.events.index', compact('events'));
    }



    public function create()
    {
        $categories = Category::get();
        return view('organizer.events.create', compact('categories'));
    }




    public function store(Request $request)
    {
        // Validate  request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'cover' => 'required|image',
            'description' => 'required|string',
            'location' => 'required|string',
            // 'location_latitude' => 'required|numeric',
            // 'location_longitude' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'start_date' => 'required',
            'end_date' => 'required',
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

    // Show the form for editing the specified menu
    public function edit(Event $event)
    {
        // Get the authenticated user's restaurant_id

        $id = Auth::user()->id;

        if ($event->organizer_id !== $id) {
            abort(403, 'Unauthorized action.');
        }



        //2- Fetch categories
        $categories = Category::get();


        return view('organizer.events.edit', compact('event', 'categories'));
    }
    // Update the specified event
    public function update(Request $request, Event $event)
    {
        $id = Auth::user()->id;

        // Check if the user is the organizer of the event
        if ($event->organizer_id !== $id) {
            abort(403, 'Unauthorized action.');
        }



        // Update the event with validated data
        $event->fill($request->all());

        // update image if it passing with request
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');

            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('events'), $imageName);
            $event->cover = $imageName;
        }


        // Save the updated event
        $event->save();

        // Redirect with success message
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {


        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event Deleted successfully.');
    }


    //this is for admin only


    public function accept(Event $event)
    {

        // validate if user is admin
        $event->status = 'approved';

        $event->save();

        return redirect('/admin')->with('success', 'Event Accepted successfully.');;
    }
}
