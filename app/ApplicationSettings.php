<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationSettings extends Model
{
    protected  $fillable = ["name","slug","value"];
}
