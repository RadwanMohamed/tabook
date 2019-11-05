<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    const ENABLED  = "enabled";
    const DISABLED = "disabled";
    protected $fillable = ['name', 'price'];
    public function user()
    {
        return $this->belongsToMany("App\User","user_services","service_id","user_id");
    }

}
