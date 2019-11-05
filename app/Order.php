<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const  NEW  = "new";
    const  DONE = "DONE";
    protected $fillable = ['notesToDelgates', 'address', 'quantity', 'status', 'delay', 'delay_notes', 'delegate_id', 'client_id', 'service_id','price'];
    function delegate()
    {
        return $this->belongsTo("App\User","delegate_id");
    }
    function client()
    {
        return $this->belongsTo("App\User","client_id");
    }
    function service()
    {
        return $this->belongsTo("App\Service","service_id");
    }
}
