<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\UserTrait;

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

    use RegistersUsers,UserTrait;

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
            'phone' => ['required', 'numeric' ,  'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            "city" => ['nullable','string'],
            "street" => ['nullable','string'],
            "house" => ['nullable','numeric'],
            "guide" => ['nullable','string'],
            "locationName" => ['nullable','string'],
            "nationality" => ['nullable','string'],
            "language" => ['nullable','string'],
            "pic1" => ['nullable','image'],
            "pic2" => ['nullable','image'],
            "pic3" => ['nullable','image'],
            "profile" => ['nullable','image'],
            "role" => ['required','in:'.User::CLIENT .','.User::DELEGATE],
            "type" => ['nullable','in:'.User::HOME.','.User::HOTEL.','.User::RESTAURANT],
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
        $lastName = isset($data['lastName']) ? $data['lastName'] : null;
        $email = isset($data['email']) ? $data['email'] : null;
        $city = isset($data['city']) ? $data['city'] : null;
        $street = isset($data['street']) ? $data['street'] : null;
        $house = isset($data['house']) ? $data['house'] : null;
        $guide = isset($data['guide']) ? $data['guide'] : null;
        $locationName = isset($data['locationName']) ? $data['locationName'] : null;
        $nationality = isset($data['nationality']) ? $data['nationality'] : null;
        $language = isset($data['language']) ? $data['language'] : null;
        $resistanceType = isset($data['resistanceType']) ? $data['resistanceType'] : null;
        $applicationType = isset($data['applicationType']) ? $data['applicationType'] : null;
        $balance = isset($data['balance']) ? $data['balance'] : null;
        $status  = (isset($data['role'])&&$data['role'] == User::DELEGATE)? User::SUSPENDED : User::ACTIVE;
        $rate  = (isset($data['role'])&&$data['role'] == User::DELEGATE)? 0 : null;
        $user = User::create([
            'firstName' => $data['firstName'],
            'secondName' => $data['secondName'],
            'lastName' => $lastName,
            'role' => $data['role'],
            'type' => isset($data['type'])? $data['type'] : null ,
            'email' => $email,
            'phone' => $data['phone'],
            'city' => $city,
            'street' => $street,
            'house' => $house,
            'guide' => $guide,
            'lat' => isset($data['lat'])?  $data['lat'] : null,
            'lang' => isset($data['lang'])? $data['lang'] : null ,
            'locationName' => $locationName,
            'nationality' => $nationality,
            'language' => $language,
            'pic1'     =>isset($data["pic1"])? $data["pic1"]->store('') : null,
            'pic2'     =>isset($data["pic2"])? $data["pic2"]->store('') : null,
            'pic3'     =>isset($data["pic3"])? $data["pic3"]->store('') : null,
            'profile'     =>isset($data["profile"])? $data["profile"]->store('') : null,
            'resistanceType' => $resistanceType,
            'applicationType' => $applicationType,
            'balance'  => 0,
            'fcmToken' => isset($data['fcmToken'])?  $data['fcmToken'] : null,
            'deviceType' => isset($data['deviceType'])?  $data['deviceType'] : null,
            'password' => bcrypt($data['password']),
            "status" => $status,
            "rate"   => $rate
        ]);
//        $this->addNewService($user);
        return $user;
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->firstName;
        $success['user'] =  $user;
        return response()->json(['success'=>$success],200);

    }
}
