<?php

namespace App\Http\Controllers;
use App\parking_lot;
use App\users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ParkingController extends Controller
{


public function index() {
  $parking_lot = Parking_lot::select(DB::raw('parking_lot.*'),DB::raw('users.name'))
          ->join('users','parking_lot.users_id','users.id')->orderby('id', 'desc')
          ->paginate(5);
  return view('parking.index',['parking_lot'=>$parking_lot]);
}


public function create() {
    $user=User::All();
  //  dd($user);
    return view('parking.create', compact('user'));
}


public function store(Request $request ,parking_lot $parking_lot) {
  $parking_lot -> parking_name = $request->input('parking_name');
  $parking_lot -> parking_location = $request->input('parking_location');
  $parking_lot -> description = $request->input('description');
  $parking_lot -> number_of_section = $request->input('number_of_section');
  $parking_lot -> users_id = $request->input('users_id');
  $parking_lot->save();
    return redirect()->route('parking.index')->withStatus(__('parking successfully created.'));
}

public function edit( $id) {
$parking_lot = parking_lot::find($id);
    //   $select = User::with('parking_lot')->FindorFail($id);
    //   $idcat = $select->parking_lot->pluck('id');
   return view('parking.edit', compact('parking_lot' ));
}


public function update(Request $request, $id) {
$request->validate([
'parking_name' => 'required',
'parking_location'=> 'required',
'description'=> 'required',
'number_of_section'=> 'required|numeric',
'users_id' => 'required',
]);
$parking_lot = parking_lot::find($id);

$parking_lot->update($request->all());
return redirect()->route('parking.index', $parking_lot)->withStatus(__('parking successfully updated.'));
}

public function destroy(Request $request ,$id) {
    //$parking_lot->delete();
    $parking_lot = parking_lot::where('id', '=', $id)->first();
    $parking_lot->parking_state=!$parking_lot->parking_state;
      if ($parking_lot->save()) {
          return redirect()->route('parking.index')->withStatus(__('parking successfully deactivated.'));
      }
      else{
        return redirect()->route('parking.index')->withStatus(__('Error'));
      }
    //  return redirect()->route('parking.index')->withStatus(__('parking successfully deleted.'));

     // code lama
    // $parking_lot = parking_lot::find($id);
    // $parking_lot->delete();
    //   return redirect()->route('parking.index', $parking_lot)->withStatus(__('parking successfully deleted.'));
    //$parking_lot = parking_lot::find($request->id);

           // $parking_lot->parking_state = $request->status;
           // $parking_lot->save();
}


   } //end of parking controller
