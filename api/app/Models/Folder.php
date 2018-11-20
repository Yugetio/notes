<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;


class Folder extends Model
{
    protected $table = 'folders';
    protected $fillable = [
         'parent_id', 'title'
    ];

    public function setData($parent_id, $title){
        $model = new Folder();

        $model->title = $title;
        $model->parent_id = $parent_id;

        return (bool)$model->save();
    }

    public function loadData($parent_id, $title){

    }

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
