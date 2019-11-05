<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    use ApiResponser;


//    public function forgetPassword(Request $request)
//    {
//        $user  = UserTrait::where('phone','=',$request->phone);
//        $user->verify = UserTrait::generateVerificationKey();
//        $user->save();
//
//        // phone
//        return $this->showMessage()
//    }
}
