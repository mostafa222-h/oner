<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $maxAttempts = 2 ;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateForm($request) ;
        if ( $this->hasTooManyLoginAttempts($request))
        {

            //رسپانسی که به کاربر بر میگردونه مثلا شما به مدت 1مین قفل شدی نمیتونی لاگین کنی...
            return $this->sendLockoutResponse($request);
        }

       // Auth::attempt($request->only('email','password'),$request->filled('remember'));
        if ($this->attemptLogin($request)) {
            return $this->sendSuccessResponse();
        }
        $this->incrementLoginAttempts($request);
        return $this->sendLoginFailedResponse();

    }

    protected function sendSuccessResponse(){
        return redirect()->intended();
    }
    protected function sendLoginFailedResponse(){
        return back()->with('wrong Credetials',true);
    }


    protected function validateForm(Request $request)
    {

        return $this->validate($request, [

            'email' => 'required|email|exists:users' ,
            'password' => 'required'

        ]);



    }
    protected function attemptLogin(Request $request)
    {
       return Auth::attempt($request->only('email','password'),$request->filled('remember'));
    }

    public function logout()
    {

        //invalid users session...
        session()->invalidate();
        Auth::logout();
        return redirect(route('home'));
    }
    protected function username(){
        return 'email' ;
    }
}
