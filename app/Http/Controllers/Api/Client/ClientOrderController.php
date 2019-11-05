<?php

namespace App\Http\Controllers\Api\Client;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ClientOrderController extends ApiController
{
    public function getPreviousOrders()
    {
        $user = request()->user();
        if ($user->role != User::CLIENT)
            return $this->errorResponse("this feature is exist only for clients",422);
        $orders = Order::with("service")->with("delegate")->where([["client_id",\request()->user()->id],["status",Order::DONE]])->get();
        return $this->showAll("orders",$orders);
    }
    public function getMyOrders()
    {
        $user = request()->user();
        if ($user->role != User::CLIENT)
            return $this->errorResponse("this feature is exist only for clients",422);
        $orders = Order::with("service")->with("delegate")->where([["client_id",\request()->user()->id],["status",Order::NEW]])->get();
        return $this->showAll("orders",$orders);
    }


}
