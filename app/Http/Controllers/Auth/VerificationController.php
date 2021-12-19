<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\VeriJob;
use App\Mail\VerificationEmail;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //هر یوزری خواست به این کنترلر درخواست بزنه حتما باید لاگین باشه
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        //در 1مین بیشتر از 6 تا ارسال نشه
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function send()
    {
        $user = auth()->user();

       // dd();Auth::user()->email_verified_at
       // VeriJob::dispatch();
        //میگه از فساد AUTH و مودل یوزر این متد صدا بزن تا ایمیل وریفیکیشن برای یوزر ارسال بشه...
       //111 Auth::user()->sendEmailVerificationNotification($user) ;
        Mail::to($user->email)->send(new VerificationEmail($user));
    }
}
