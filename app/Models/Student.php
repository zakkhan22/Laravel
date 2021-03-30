<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Student extends Authenticable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'students';

    protected $fillable = [
        'name', 'email', 'password'
    ];

public function  courses(){
return $this->belongsToMany(Lecture::class);
}

}
