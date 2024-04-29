<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function redirectTo() {
        switch (Auth::user()->role) {
            case 'admin':
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;
            case 'dokter':
                $this->redirectTo = '/doctor';
                return $this->redirectTo;
                break;
            case 'pasien':
                $this->redirectTo = '/patient';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
                break;
        }
    }

//    protected function attemptLogin(Request $request)
//    {
//        if (($user = User::where('username', $request->get('username'))
//            ->where('password', Crypt::encryptString($request->get('password')))
//            ->first()) != null
//        ) {
//            $this->guard()->login($user);
//        }
//    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (($user = User::where('username', $request->get('username'))->first()) != null) {
//            $this->guard()->login($user);
//            dd($user);
//            Auth::login($user);
            if (Crypt::decryptString($user->password) == $request->get('password')) {
                $this->guard()->login($user);
                return $this->sendLoginResponse($request);
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => ['required', 'string'],
            'password' => ['required', 'string']
        ]);
    }

//    protected function authenticated(Request $request, $user)
//    {
//        Auth::logoutOtherDevices($request['password']);
//    }
}
