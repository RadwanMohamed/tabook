<?php

namespace App\Http\Controllers\Api\Delegate;

use App\Http\Controllers\ApiController;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DelegateOrderController extends ApiController
{
    public function getPreviousOrders()
    {
        $user = request()->user();
        if ($user->role != User::DELEGATE)
            return $this->errorResponse("this feature is exist only for delegates",422);
        $orders = Order::with("service")->with(["client"])->where([["delegate_id",\request()->user()->id],["status",Order::DONE]])->get();
        return $this->showAll("orders",$orders);
    }
    public function getMyOrders()
    {
        $user = request()->user();
        if ($user->role != User::DELEGATE)
            return $this->errorResponse("this feature is exist only for delegates",422);
        $orders = Order::with("service")->where([["delegate_id",\request()->user()->id],["status",Order::NEW]])->with(["client"])->get();
        return $this->showAll("orders",$orders);
    }
}
