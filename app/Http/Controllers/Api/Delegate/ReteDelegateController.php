<?php

namespace App\Http\Controllers\Api\Delegate;

use App\RateUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ReteDelegateController extends ApiController
{
    public function store(Request $request)
    {
        $rules = ["id"=>"required|numeric","rate"=>"required|numeric|min:1|max:10"];
        $this->validate($request,$rules);
        $user = User::find($request->id);
        if (!$user)
            return $this->errorResponse("select  delegate",422);
        if ($request->user()->role != User::CLIENT)
            return $this->errorResponse("this feature is exclusive for clients",422);

        if ($user->role != User::DELEGATE)
            return $this->errorResponse("this feature is not exist",422);
        RateUser::create(["client_id"=>$request->user()->id,"delegate_id"=>$user->id,"rate"=>$request->rate]);
        return $this->showMessage("the rate is recorded",200);
    }
}
