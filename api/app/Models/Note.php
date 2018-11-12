<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Note extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'notes';
    protected $fillable = [
        'caption', 'text', 'parent_id', 'user_id'
    ];
    public function notes(){
        return $this->hasMany(Note::class, 'parent_id');
    }
}
