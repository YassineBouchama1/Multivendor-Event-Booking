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



    public function session(Request $request, Event $event)
    {

        \Stripe\Stripe::setApiKey(config('stripe.sk'));


        //create session to save event
        $request->session()->put('event', $event);



        //cheeck if event is free create resrvation direct without strip
        if ((int)$event->price === 0) {
            return redirect()->route('user.booking');
        }


        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $event->title,
                        ],
                        'unit_amount'  => (int)$event->price,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment',
            'success_url' => route('user.booking'),
            'cancel_url'  => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }



    public function store(Request $request)
    {

        //get event details from session come from sessin function
        $event = session('event');


        // dd($event);
        $reservationCount = Reservation::count();
        //check if there is a place
        if ($reservationCount >= $event->places) {
            $event->status = 'fulled';
            $event->save();
            return redirect()->route('home.index')->with('error', 'event is fulled');
        }


        // determine whether the status is confirmed or unconfirmed based on the event is reservation method
        $status = $event->reservation_method === 'manual' ? 'unconfirmed' : 'confirmed';

        // Ccreate a new reservation
        $reservationCreated = Reservation::create([
            'event_id' => $event->id,
            'user_id' => Auth::user()->id,
            'status' => $status
        ]);
        $reservationCountUpdated = Reservation::count();

        if ($reservationCountUpdated >= $event->places) {
            $event->status = 'fulled';
            $event->save();
        }

        //after create reservation remove session
        $request->session()->forget('event');

        return redirect()->route('user.index')->with('success', 'Booked Event Successfully');
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
