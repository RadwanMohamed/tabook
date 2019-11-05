<?php

namespace App\Http\Controllers\Api\Order;

use App\Order;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;

class OrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return $this->showAll("orders",$orders);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'', 'notesToDelgates', 'address', 'quantity', 'status', 'delegate_id', 'client_id'
        $rules = [
            'service_id' => "required",
            'notesToDelgates' =>"nullable|string",
            'address' => "nullable",
            'quantity' => "required|numeric",
            'delegate_id' => "required|numeric",
        ];
        $this->validate($request,$rules);
        $delegate = User::find($request->delegate_id);

        if (!$delegate || $delegate->role != User::DELEGATE)
            return $this->errorResponse("please choose right delegate",422);
        if ($request->user()->role != User::CLIENT)
            return $this->errorResponse("this feature is exist only for clients",422);
        if (!$request->user()->locationName && !$request->has("address"))
            return $this->errorResponse("you must add the address",422);

        $service = Service::find($request->service_id);
        $order = Order::create([
            "service_id" => $request->service_id,
            "notesToDelgates" => $request->notesToDelgates,
            "address"         => ($request->has("address")) ? $request->address : $request->user()->locationName,
            "quantity"        => $request->quantity,
            "status"          => Order::NEW,
            "delegate_id"     => $request->delegate_id,
            "client_id"     =>   $request->user()->id,
            "price"         =>   $request->quantity *  $service->price
        ]);
        return $this->showOne("order",$order,201);
    }


    public function show(Order $order)
    {
        return $this->showOne("order",$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $rules = [
            'service_id' => "nullable",
            'notesToDelgates' =>"nullable|string",
            'address' => "nullable",
            'quantity' => "nullable|numeric",
            'delegate_id' => "nullable|numeric",
        ];
        $this->validate($request,$rules);
        if ($request->user()->id != $order->client_id)
            return $this->errorResponse("you dont have the permission",422);

        if ($request->has("service_id"))
            $order->service_id   = $request->service_id ;

        if ($request->has("notesToDelgates"))
            $order->notesToDelgates   = $request->notesToDelgates ;

        if ($request->has("address"))
            $order->address   = $request->address ;
        if ($request->has("quantity"))
            $order->quantity   = $request->quantity ;
        if ($request->has("delegate_id"))
            $order->delegate_id   = $request->delegate_id ;

        if ($order->isClean())
            return $this->errorResponse("edit some values",422);
        $order->save();
        return $this->showOne("order",$order,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return $this->showMessage("the order is deleted successfully");
    }
    public function delayOrder(Request $request,Order $order)
    {
        $rules = [
            "delay" => "required|date_format:Y-m-d H:i:S",
            "delay_notes" => "nullable|string"
        ];
        $this->validate($request,$rules);
        $order->update(["delay"=>$request->delay,"delay_notes"=>$request->delay_notes]);
        return $this->showOne("order",$order,200);
    }
    public  function setOrderDone(Request $request)
    {
        $order = $this->isDone($request->id);
        if ($order == false)
            return $this->errorResponse("this order is done already",422);
        if ($order->delegate_id !=$request->user()->id)
            return $this->errorResponse("you dont have the permissions",422);
        $order->status = Order::DONE;
        $order->save();
        return $this->showOne("order",$order,200);
    }
    private function isDone($order)
    {
        $order = Order::where("id",$order)->first();
        if ($order && $order->status != Order::DONE)
            return $order;
        return false;
    }
}
