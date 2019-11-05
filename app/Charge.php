<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    const NOTCHARGED  = 'notcharged';
    const CHARGED     = 'charged';
    protected $fillable = ["user_id","image","ID_number"];
}
