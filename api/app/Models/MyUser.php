<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyUser extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'email', 'password',
    ];
}
