<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Users extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    // protected $guard = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
       // protected $guard = 'user';
       protected $table = "user";
       protected $fillable = [
           'username', 'password', 'phone_number','email','otp','verified','gender','code','city','country',
       ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}
