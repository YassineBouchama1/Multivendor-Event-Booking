<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        return view('guest.users.profile.index', compact('user'));
    }

    public function generatePdf(Request $request, Reservation $reservation)
    {

        $qrCode = QrCode::size(250)->format('png')->generate(url('qrcode/' . $reservation->id));

        // Create a new instance of Dompdf
        $dompdf = new Dompdf();

        // Generate HTML content for the PDF using Blade view
        $html = view('pdf.ticket', compact('reservation', 'qrCode'))->render(); // 'pdf.template' is the Blade view for your PDF

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML content to PDF
        $dompdf->render();

        // Output the generated PDF
        return $dompdf->stream('document.pdf');
    }


    public function ticketPreview(Request $request, Reservation $reservation)
    {

        return view('ticketPreview', compact('reservation'));
    }
}
