<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Teacher extends Authenticable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'teachers';

    protected $fillable = [
        'name', 'email', 'password'
    ];
}
