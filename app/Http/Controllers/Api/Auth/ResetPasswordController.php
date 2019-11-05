<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\ApiResponser;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Mail;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords,ApiResponser,HelperTrait;

    /**
     * Where to redirect users after resetting their password.
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

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->save();

        event(new PasswordReset($user));
        return true;
    }
    public function newPassword(Request $request)
    {
        $this->validate($request,$this->rules());
        $user = \App\User::where("phone",$request->phone)->first();
        if (!$user)
            return $this->errorResponse("there is no users with this phone ",422);
        $password = $this->generateRandomPassword();
        if ( $user->update(["password"=>bcrypt($password)]))
        {
            $message = "
            تم ارسال هذا البريد بناءا على طلبك لتحديث كلمة السر. كلمة السر الجديدة الخاصة بك :{$password}              ";
    Mail::raw($message,function ($message)use ($request,$user){
        $message->to($user->email)->subject("اعادة تعيين كلمة السر");
    });
            return $this->showMessage("password has reset");
        }

    }
    protected function rules()
    {
        return [
            'phone' => 'required|numeric',
        ];
    }

}
