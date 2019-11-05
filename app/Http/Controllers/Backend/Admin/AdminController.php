<?php

namespace App\Http\Controllers\Backend\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = User::all();
        return view("backend.users.index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            "firstName"  => "nullable|string",
            "secondName" => "nullable|string",
            "lastName"   => "nullable|string",
            "email"      => "nullable|email|unique:users",
            "phone"      => "nullable|numeric|unique:users",
            "password"   => "required|confirmed",
            "city"       => "nullable|string",
        ];
        $validator = Validator::make($request->all(),$rule);
        if ($validator->fails()) {
            return redirect(route('admin.create'))
                ->withErrors($validator)
                ->withInput();
        }

        User::create($request->all());
        return redirect(route("admin.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view("backend.users.show",compact("user"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("backend.users.edit",compact("user"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->has("firstName"))
            $user->firstName = $request->firstName;
        if ($request->has("role"))
            $user->role = $request->role;
        if ($request->has("status"))
            $user->status = $request->status;
        if ($request->has("max_order_number"))
            $user->max_order_number = $request->max_order_number;
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
        if ($request->has("resistanceType"))
            $user->resistanceType = $request->resistanceType;
        if ($request->has("applicationType"))
            $user->applicationType = $request->applicationType;
        if ($request->has("balance"))
            $user->balance = $request->balance;

        if ($user->isClean())
             return redirect()->back()->with("status","قم بتغير بعض البيانات لاكمال عملية التحديث");
        $user->save();
        return redirect(route("admin.index"))->with("status","تم التعديل بنجاح");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user)
            return redirect()->back()-with("status","the user is not found");
        $user->delete();
        return redirect(route("admin.index"));
    }
}
