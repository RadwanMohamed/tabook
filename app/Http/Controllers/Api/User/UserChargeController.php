<?php

namespace App\Http\Controllers\Api\User;

use App\Charge;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class UserChargeController extends ApiController
{
    public function charge(Request $request)
    {
        $rules = [
            "ID_number" => "required|numeric",
            "image" => "required|image"
        ];
        $this->validate($request,$rules);

        $charge = Charge::create([
            "user_id" => $request->user()->id,
            "ID_number"      => $request->ID_number,
            "image"   => $request->image->store('')
        ]);
        return $this->showOne("charge",$charge);
    }
}
