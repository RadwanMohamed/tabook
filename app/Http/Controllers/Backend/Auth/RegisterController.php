<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'secondName' => ['required', 'string', 'max:255'],
            'lastName' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'numeric' , 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $lastName = ($data['lastName']) ? $data['lastName'] : null;
        $email = ($data['email']) ? $data['email'] : null;
        $city = ($data['city']) ? $data['city'] : null;
        $street = ($data['street']) ? $data['street'] : null;
        $house = ($data['house']) ? $data['house'] : null;
        $guide = ($data['guide']) ? $data['guide'] : null;
        $locationName = ($data['locationName']) ? $data['locationName'] : null;
        $nationality = ($data['nationality']) ? $data['nationality'] : null;
        $language = ($data['language']) ? $data['language'] : null;
        $resistanceType = ($data['resistanceType']) ? $data['resistanceType'] : null;
        $applicationType = ($data['applicationType']) ? $data['applicationType'] : null;
        $balance = ($data['balance']) ? $data['balance'] : null;
        $user = User::create([
            'firstName' => $data['firstName'],
            'secondName' => $data['secondName'],
            'lastName' => $lastName,
            'email' => $email,
            'phone' => $data['phone'],
            'city' => $city,
            'street' => $street,
            'house' => $house,
            'guide' => $guide,
            'lat' => $data['lat'],
            'lang' => $data['lang'],
            'locationName' => $locationName,
            'nationality' => $nationality,
            'language' => $language,
            'pic1'     =>($data["pic1"])? $data["pic1"]->store('') : null,
            'pic2'     =>($data["pic2"])? $data["pic2"]->store('') : null,
            'pic3'     =>($data["pic3"])? $data["pic3"]->store('') : null,
            'profile'     =>($data["profile"])? $data["profile"]->store('') : null,
            'resistanceType' => $resistanceType,
            'applicationType' => $applicationType,
            'balance'  => $balance,
            'fcmToken' => $data['fcmToken'],
            'deviceType' => $data['deviceType'],
            'password' => Hash::make($data['password']),
        ]);

        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return $user;
    }
}
