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
}
