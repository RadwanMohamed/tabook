<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    protected $fillable = ['service_id', 'user_id', 'activation'];

    public function user()
    {
        return $this->belongsToMany("App\User","user_services","service_id","user_id");
    }
}
