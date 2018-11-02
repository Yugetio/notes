<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $table = 'folders';
    protected $fillable = [
        'user_id', 'parent_folder_id', 'title', 'folder-list'
    ];
}
