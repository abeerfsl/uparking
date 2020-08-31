<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booking;
use App\users;
use App\payment;
use App\parking_lot;
use PDF;
use Illuminate\Support\Facades\DB;

class pdfbookingController extends Controller
{
  public function pdfbooking(Request $request)
  {
      $booking = DB::table('booking')
              ->selectRaw('booking.* , parking_lot.users_id ')
              ->join('parking_lot','booking.parking_id','parking_lot.id')
              ->orderby('booking.date', 'desc')
              ->get();
      view()->share('booking',$booking);


      if($request->has('download')){
          $pdf = PDF::loadView('pdfbooking');
          return $pdf->download('bookinginfo.pdf');
      }


      return view('pdfbooking');
  }
}
