<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guarded = [];
    protected $dates = ['updated_at'];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
