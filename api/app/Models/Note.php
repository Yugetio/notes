<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Note extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'notes';
    protected $fillable = [
        'caption', 'text'
    ];
}