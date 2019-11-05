<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateUser extends Model
{
    protected  $fillable = ['client_id', 'delegate_id', 'rate'];
}
