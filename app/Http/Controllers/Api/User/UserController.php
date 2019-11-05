<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (\request()->user()->id != $id)
            return $this->errorResponse("you dont have permissions",402);
        return $this->showOne("user",\request()->user(),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->id != $request->user()->id)
            return $this->errorResponse("you dont have permissions",402);
        if ($request->has("firstName"))
            $user->firstName = $request->firstName;
        if ($request->has("secondName"))
            $user->secondName = $request->secondName;
        if ($request->has("lastName"))
            $user->lastName = $request->lastName;
        if ($request->has("email"))
            $user->email = $request->email;
        if ($request->has("phone"))
            $user->phone = $request->phone;
        if ($request->has("password"))
            $user->password = Hash::make($request->password);
        if ($request->has("city"))
            $user->city = $request->city;
        if ($request->has("street"))
            $user->street = $request->street;
        if ($request->has("house"))
            $user->house = $request->house;
        if ($request->has("guide"))
            $user->guide = $request->guide;
        if ($request->has("lat"))
            $user->lat = $request->lat;
        if ($request->has("lang"))
            $user->lang = $request->lang;
        if ($request->has("locationName"))
            $user->locationName = $request->locationName;
        if ($request->has("nationality"))
            $user->nationality = $request->nationality;
        if ($request->has("language"))
            $user->language = $request->language;
        if ($request->has("pic1"))
            $user->pic1 = $request->pic1->store('');
        if ($request->has("pic2"))
            $user->pic2 = $request->pic2->store('');
        if ($request->has("pic3"))
            $user->pic3 = $request->pic3->store('');
        if ($request->has("profile"))
            $user->profile = $request->profile->store('');
        if ($request->has("resistanceType"))
            $user->resistanceType = $request->resistanceType;
        if ($request->has("applicationType"))
            $user->applicationType = $request->applicationType;
        if ($request->has("balance"))
            $user->balance = $request->balance;

        if ($user->isClean())
            return $this->errorResponse("you must edit values",422);
        $user->save();
        return $this->showOne("user",$user,200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id != \request()->user()->id)
            return $this->errorResponse("you dont have permissions",402);
        \request()->user()->delete();
        return $this->errorResponse("user deleted successfuly",200);
    }


}
