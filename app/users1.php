<?php
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{



  protected $table = "user";
  protected $fillable = [
      'username', 'password', 'first_name',  'last_name','phone_number','email','otp','verified','gender','code','city','country',
  ];

}
