<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use mysql_xdevapi\Exception;

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
    public function setData($parent_id, $caption, $text){

        $model = new Note();

        try{

            if ($model->caption === $caption){ throw new Exception();}
            $model->caption = $caption;
            $model->parent_id = $parent_id;
            $model->text = $text;

            $model->save();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    public function loadData($caption){

        $model = Note::where('caption', '=', $caption)->get();

        $model = array($model);
//        var_dump($model);
        echo "________".sizeof($model);
        if (sizeof($model)){
            return false; }
        else{ return true; }
    }

    public function deleteData(){

        $model = Note::orderBy('id', 'desc')->first();

        try{
            $model->delete();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    public function subfolders(){
        return $this->hasMany(Folder::class, 'parent_id');
    }

}
