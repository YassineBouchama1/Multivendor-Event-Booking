<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Mail\ReservationMail;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $reservationCount = count($event->reservations);
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


        //send email that reservation coonfirm
        if ($event->reservation_method === 'automatic') {
            Mail::to(Auth::user()->email)->send(new ReservationMail($reservationCreated));
        }


        // check if event full
        $reservationCountUpdated = count(Event::where('id', $event->id)->first()->reservations);

        // deteremin is event fulled after last reservation
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


        // after confirm reservation send email
        if ($reservation->status === 'confirmed') {
            Mail::to($reservation->user->email)->send(new ReservationMail($reservation));
        }
        return redirect()->route('reservations.index')->with('success', 'reservation Accepted successfully.');;
    }

    public function canceled(Reservation $reservation)
    {

        $reservation->status = 'canceled';

        $reservation->save();
        $reservation->delete();


        $event = Event::where('id', $reservation->event_id)->first();
        $ReservationCount = Reservation::where('event_id', $event->id)->count();

        // check if there is a tickets for event
        if ($event->places > $ReservationCount) {
            $event->status = 'approved';
            $event->save();
        }
        return redirect()->route('reservations.index')->with('success', 'reservation canceled successfully.');;
    }
}
