<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{


   protected $dates = ['date'];
   protected $guarded = [];
   protected $table = "booking";
   protected $fillable = [
     'id', 'date', 'start_time','end_time','plate_number','booking_state','username','parking_id','slot_number','history','payment_id'
 ];
   protected $casts = [
    'start_time', 'end_time','plate_number' , 'user_id' , 'parking_id' , 'slot_number'
 ];
}
