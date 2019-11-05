<?php

namespace App\Http\Controllers\Backend\Application;

use App\ApplicationSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = ApplicationSettings::all();
        return view("backend.application.edit",compact("settings"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.application.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
          "name"  => "required|string",
          "slug"  => "required|string",
          "value" => "required|string",
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $app = new ApplicationSettings();
        $app->slug = $request->slug;
        $app->name = $request->name;
        $app->value = $request->value;
        $app->save();
        return redirect(route("application.index"));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = ApplicationSettings::all();
        return view("backend.application.index",compact("settings"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach ($request->all() as $key => $value)
        {
            if ($key == "_token")
                continue;
            ApplicationSettings::where("name",$key)->update(["value"=>$value]);
        }
        return redirect(route("application.index"));
    }


}
