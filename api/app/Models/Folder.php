<?php

namespace App\Models;

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
}
