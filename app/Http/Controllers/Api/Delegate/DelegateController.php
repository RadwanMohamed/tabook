<?php

namespace App\Http\Controllers\Api\Delegate;

use App\Service;
use App\User;
use App\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DelegateController extends ApiController
{
    public  function index()
    {
        $delegates = User::where([["role",User::DELEGATE],["status","active"]])->select("id","firstName","secondName","lastName","lat","lang","locationName","phone","rate")->get();
        return $this->showAll("Delegates",$delegates);
    }

    public function enableService(Request $request)
    {
        $rules = [
            "service_id" => "required"
        ];
        $this->validate($request,$rules);

        if ($request->user()->role != User::DELEGATE )
            return $this->errorResponse("this feature is not Exist",422);

        if (!$this->isService($request->service_id))
            return $this->errorResponse("this service doesnt exist",404);

        if ($this->hasEnabledServices($request->user()->id,$request->service_id))
            return $this->errorResponse("this service is enabled ",404);

        UserService::create(["service_id"=>$request->service_id,"user_id"=>$request->user()->id,"activation"=>Service::ENABLED]);

        return $this->showMessage("the service is activated successfully");
    }

    public function disableService(Request $request)
    {
        $rules = [
            "service_id" => "required"
        ];
        $this->validate($request,$rules);

        if ($request->user()->role != User::DELEGATE )
            return $this->errorResponse("this feature is not Exist",422);

        if (!$this->isService($request->service_id))
            return $this->errorResponse("this service doesnt exist",404);
        if (!$this->hasEnabledServices($request->user()->id,$request->service_id))
            return $this->errorResponse("this service is disabled by default",404);

        UserService::where([["user_id",$request->user()->id],["service_id",$request->service_id]])->delete();
        return $this->showMessage("the service is disactivated successfully");
    }

    private function getEnabledServices($delegate_id)
    {
        $services = UserService::where("user_id",$delegate_id)->get();
        return $services;
    }
    private function hasEnabledServices($delegate_id,$service)
    {
        return ( UserService::where([["user_id",$delegate_id],["service_id",$service]])->count() > 0);
    }
    private function isService($service)
    {
        return (Service::where("id",$service)->count() > 0);
    }

    public function allEnabledServices(Request $request)
    {

        $user = User::find($request->delegate_id);
//        dd($user->services);
        if (!$user)
          return  $this->errorResponse("not user",422);
        return $this->showAll("services",$user->services);
    }
}
