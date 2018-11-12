<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $table = 'folders';
    protected $fillable = [
        'user_id', 'parent_id', 'title'
    ];

    public function subfolders(){
        return $this->hasMany(Folder::class, 'parent_id');
    }

    public function serialize() {
        return [
            'title' => $this->title,
            'id' => $this->id,
            'parent_id' => $this->parent_id,
        ];
    }
}
