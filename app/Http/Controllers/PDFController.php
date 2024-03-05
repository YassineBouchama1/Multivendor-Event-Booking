<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{
    public function viewPDF(Reservation $reservation)
    {

        $qrCode = QrCode::size(250)->format('png')->generate(url('qrcode/' . $reservation->id));


        return view('ticketPdf', compact('qrCode', 'reservation'));
    }
    public function generatePDF(Reservation $reservation)
    {
        $qrCode = QrCode::size(250)->format('png')->generate(url('qrcode/' . $reservation->id));

        Pdf::view('ticketPdf', ['reservation' => $reservation, 'qrCode' => $qrCode])
            ->format('a4')
            ->save('invoice.pdf');

        return 'success';
    }
}
