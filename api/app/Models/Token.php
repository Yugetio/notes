<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use Notifiable;

    protected $table = 'tokens';
    protected $fillable = [
        'user_id','access_token', 'refresh_token', 'expires_in'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\MyUser');
    }
    public function setData($email,$password){

        $model = new Token();

        $model->email = $email;
        $model->password = $password;
        try{
            $model->save();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    public function loadData($email){

        $model = Token::where('email', '=', $email)->get();

        if (strlen((string)$model) > 2){return true ;}else{ return false; }
    }

    public function deleteData(){

        $model = Token::orderBy('id', 'desc')->first();

        try{
            $model->delete();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
