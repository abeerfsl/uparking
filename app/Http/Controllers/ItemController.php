<?php

  namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;


class ItemController extends Controller
{


    public function pdfview(Request $request)
    {
        $parking_lot = DB::table("parking_lot")->get();
        view()->share('parking_lot',$parking_lot);


        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('parkinginfo.pdf');
        }


        return view('pdfview');
    }

}
