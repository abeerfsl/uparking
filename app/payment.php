<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
  protected $table = "payment";
  protected $fillable = [
      'id','payment_state','payment_amount','created_email','booking_id',
  ];

}
