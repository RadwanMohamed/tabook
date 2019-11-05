<?php

namespace App\Http\Controllers\Api\Service;

use App\Service;
use App\User;
use App\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;

class ServiceController extends ApiController
{
    public function index()
    {
        $services = Service::paginate(30);
        return response()->json(["serviecs"=>$services],200);
    }
    public function enabledServicesforVendors()
    {
        $services = $this->paginate(Service::with("user:user_id")->get());
        return response()->json(["serviecs"=>$services],200);
    }

    public function show(Service $service)
    {
        return $this->showOne("service",$service);
    }
    public  function enabledServicesByVendor(Request $request)
    {
        $user = $request->user();
        if ($user->role != User::DELEGATE)
            return $this->errorResponse("not Vendor",422);
        $services = Service::all();
        foreach ($services as $service)
        {
            $count = UserService::where([["user_id",$user->id],["service_id",$service->id]])->count();
            $service->active = ($count >0)? true : false;
        }
        $services = $this->paginate($services);
        return response()->json(["serviecs"=>$services],200);
    }
}
