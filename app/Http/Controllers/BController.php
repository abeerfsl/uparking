<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\booking;
use App\users;
use App\payment;
use App\parking_lot;
use Illuminate\Support\Facades\DB;
class BController extends Controller
{
  //$id = Auth::id();
//   $posts = Post::whereDate('created_at', Carbon::today())->get();  ->whereDate('created_at', '=', date('Y-m-d'))
  public function index() {

         $booking = booking::select(DB::raw('booking.*'),DB::raw('parking_lot.users_id as us'),DB::raw('parking_lot.parking_name'))
                 ->join('parking_lot','parking_lot.id','booking.parking_id')->orderby('date', 'desc')
                 ->paginate(10);

        return view('b.index',['booking'=>$booking]);



  }



  public function create() {
     return view('b.create');
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
     return redirect()->route('booking.index',$booking)->withStatus(__('Booking successfully created.'));
  }

  public function show($id) {
     echo 'show';
  }

  public function edit($id) {
    $booking=booking::find($id);
   //dd($booking);
        return view('b.edit',compact('booking'));
   }

   public function update(Request $request, $id) {

     $request->validate(['date' => 'required|date|date_format:Y-m-d',
     'plate_number' => 'required|min:7',
     'slot_number' => 'required'
      ]);
    $booking= booking::find($id);
    $booking -> date = $request->input('date');
    $booking -> start_time = $request->input('start_time');
    $booking -> end_time = $request->input('end_time');
    $booking -> plate_number = $request->input('plate_number');
    $booking -> username = $request->input('username');
    $booking -> parking_id = $request->input('parking_id');
    $booking -> slot_number = $request->input('slot_number');
      $booking->save();
     return redirect()->route('booking.index',$booking)->withStatus(__('booking successfully updated.'));
   }

  public function destroy($id) {
    $booking=booking::find($id);
    $booking->delete();
  //  dd($booking);
    return redirect()->route('booking.index',$booking)->withStatus(__('booking successfully deleted.'));
  }

}
