<?php

namespace App\Http\Controllers;
use App\booking;
use App\users;
use App\payment;
use App\parking_lot;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingController extends Controller

{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(Parking_lot $id) {

         $booking = DB::table('parking_lot')
                 ->select('booking.*')
                 ->join('booking','booking.parking_id','parking_lot.id')
                 ->where('booking.parking_id','=',$id)
                 ->get();

        return view('booking.index')->with('booking', $id->booking);



  }


  public function create() {
     return view('booking.create');
  }
  public function store(Request $request ,booking $booking) {
    $this ->validate($request, [
      'date' => 'required|date|date_format:Y-m-d',
      'plate_number' => 'required|min:5',
      'username' => 'required|unique:booking',
      'parking_id' => 'required',
      'slot_number' => 'required'
       ]);

      $booking -> date = $request->input('date');
      $booking -> start_time = $request->input('start_time');
      $booking -> end_time = $request->input('end_time');
      $booking -> plate_number = $request->input('plate_number');
      $booking -> username = $request->input('username');
      $booking -> parking_id = $request->input('parking_id');
      $booking -> slot_number = $request->input('slot_number');
      $booking->save();
     return redirect()->route('booking.index',$booking->parking_id)->withStatus(__('Booking successfully created.'));
  }

  public function show($id) {
     echo 'show';
  }

  public function edit(booking $booking) {
       //$id=$booking->parking_id;
//  dd($booking);
       return view('booking.edit')->with('booking', $booking);
  }

  public function update(Request $request, booking $booking) {

    $request->validate(['date' => 'required|date|date_format:Y-m-d',
    'plate_number' => 'required|min:7',
    'slot_number' => 'required'
     ]);
    $booking->update($request->all());
   //dd($booking);
    return redirect()->route('booking.index',$booking->parking_id)->withStatus(__('booking successfully updated.'));
  }

  public function destroy(booking $booking) {
    $booking->delete();

    return redirect()->route('booking.index',$booking->parking_id)->withStatus(__('booking successfully deleted.'));
  }

}
