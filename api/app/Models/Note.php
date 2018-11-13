<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Note extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'notes';
    protected $fillable = [
        'caption', 'text', 'parent_id'
    ];
    public function notes(){
        return $this->hasMany(Note::class, 'parent_id');
    }
    public function serialize() {
        return [
            'caption' => $this->caption,
            'id' => $this->id,
            'parent_id' => $this->parent_id,
        ];
    }
}
