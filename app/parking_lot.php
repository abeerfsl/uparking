<?php

namespace App;
use App\booking;
use Illuminate\Database\Eloquent\Model;

class parking_lot extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = "parking_lot";
  protected  $primaryKey = 'id';

  protected $guarded = [];
  protected $fillable = [
        'parking_name','parking_location', 'description','number_of_section','parking_state','users_id',
  ];

  protected $casts = [

      'created_at' => 'datetime:d/m/Y', // Change your format
      'updated_at' => 'datetime:d/m/Y',
  ];
  public function booking(){
  return $this->hasMany(Booking::class , 'parking_id');
  }
  public function findForPassport($identifier) {
   return parking_lot::orWhere('parking_name', $identifier)->where('parking_state', 0)->first();
   }
}
