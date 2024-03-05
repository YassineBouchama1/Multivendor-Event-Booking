<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{


    public function index()
    {

        $reservations = Reservation::get();



        return view('organizer.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        // determine whether the status is confirmed or unconfirmed based on the event is reservation method
        $status = $event->reservation_method === 'manual' ? 'confirmed' : 'unconfirmed';

        // Ccreate a new reservation
        $reservationCreated = Reservation::create([
            'event_id' => $event->id,
            'user_id' => Auth::user()->id,
            'status' => $status
        ]);

        return redirect()->route('user.index')->with('success', 'Booked Event Successfully');
    }




    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function confirmed(Reservation $reservation)
    {

        // validate if user is admin
        $reservation->status = 'confirmed';

        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'reservation Accepted successfully.');;
    }

    public function canceled(Reservation $reservation)
    {

        $reservation->status = 'canceled';

        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'reservation canceled successfully.');;
    }
}
