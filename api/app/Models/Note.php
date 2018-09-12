<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Note extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = 'notes';
    protected $fillable = [
        'caption', 'text',
    ];
}