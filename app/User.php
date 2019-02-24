<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Contracts\Customer;
use App\Traits\HasCart;

class User extends Authenticatable implements Customer
{
    use Notifiable, HasCart;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $dates = ['last_login_at'];
}
