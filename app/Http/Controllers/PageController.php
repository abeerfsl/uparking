<?php

namespace App\Http\Controllers;
use App\booking;
use App\users;
use App\payment;
use App\parking_lot;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function parking()
    {
        return view('pages.parking',['parking_lot'=>Parking_lot::All()]);

    }
    public function parkingrtl()
    {
        return view('pages.parkingrtl',['parking_lot'=>Parking_lot::All()]);

    }
    public function icons()
    {
        return view('pages.icons');

    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function rtl()
    {
      $user_account =booking::select(DB::raw('YEAR(date) as year'),DB::raw('COUNT(date) as sum')
                                   )->groupby('year')->orderby('year', 'desc')->limit(5)->get();
      $p = DB::table('booking')
           ->selectRaw('YEAR(booking.date) as year1,COUNT(booking.date) as sum1, parking_lot.users_id as sid')
           ->join('parking_lot','parking_lot.id','booking.parking_id')
           ->groupby('year1','sid')->orderby('year1', 'desc')->limit(5)->get();

      //chart profit
      $payment_amount=payment::select(DB::raw('SUM(payment_amount) as profit'))->get();

      $payment_chart=payment::select(DB::raw('YEAR(created_at) as yearpay'),DB::raw('SUM(payment_amount) as total')
                                   )->groupby('yearpay')->get();
        //chart  parking
       $parking =DB::table('parking_lot')
               ->selectRaw('parking_lot.parking_name, COUNT(booking.parking_id) as pid')
               ->join('booking','booking.parking_id','parking_lot.id')
               ->groupby('parking_lot.parking_name')
               ->get();

       $panum=parking_lot::select(DB::raw('COUNT(id) as id '))->get();

       // chart supadmin
       //number of slot Available
       $parkingavailable=DB::table('parking_slot')
               ->selectRaw('COUNT(parking_slot.state) as st , parking_lot.users_id as sid')
               ->join('parking_lot','parking_slot.parking_id','parking_lot.id')
               ->join('users','users.id','parking_lot.users_id')
               ->where('parking_slot.state','like', 'busy%')
               ->groupby('sid')
               ->get();
        // number of users in the parking
        $parkingofusers=DB::table('booking')
                ->selectRaw('COUNT(username) as name , parking_lot.users_id as sid')
                ->join('parking_lot','booking.parking_id','parking_lot.id')
                ->groupby('sid')
                ->get();

        return view('dashboardrtl' , compact('user_account' ,'p','payment_amount','payment_chart','parking','panum','parkingavailable','parkingofusers'));

    }


}
