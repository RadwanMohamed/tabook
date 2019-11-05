<?php

namespace  App\Traits;

use App\Service;
use App\UserService;

trait UserTrait
{
    private  function checkDelegateRole($userRole)
    {
        return $userRole == \App\User::DELEGATE;
    }
    protected  function addNewService($user)
    {
        //'service_id', 'user_id', 'activation'
        if (!$this->checkDelegateRole($user->role))
            return false;
        $services = Service::all();
        foreach ($services as $service)
        {
            UserService::create(["service_id"=>$service->id,"user_id"=>$user->id,"activation"=>Service::DISABLED]);
        }
        return true;
    }
}
