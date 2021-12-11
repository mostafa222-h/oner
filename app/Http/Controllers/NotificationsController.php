<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\TopicCreated;
use App\Models\User;
use App\services\notifications\constant\EmailTypes;
use App\services\notifications\Notification;
use App\services\notifications\providers\EmailProvider;
use App\services\notifications\providers\SmsProvider;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    protected $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //اگر درخاست کاربر شماره مبایل بود خب اس ام اس اگر ایمیل بود دایمیل ارسال بشه...
    //باید درخاست ولیدیت بشه...و مشخص بشه که چیه...
    public function send(Request $request)
    {
       // SendEmail::dispatch() ;
  if ($request->input('mobile-number')) {
            //ولیدیت مبایل
            //$user = User::find(1);
          //  $a = $user['phone_number'] ;
            $b = json_encode($request->input('mobile-number')) ;
            $c =array( '0' . $b);
            $not = new Notification(new SmsProvider($c,'2تست'));
            return $not->processClass(new SmsProvider($c,'2تست'));
        }
        elseif ($request->input('mail')){
            //ولیدیت ایمیل
            $not = new Notification(new EmailProvider(User::find(1),new TopicCreated()));
            return $not->processClass(new EmailProvider(User::find(1),new TopicCreated()));
        }
        else{
            throw new \Exception('this name not allowed');
        }

    }
   /*public function email()
    {
        $users =  User::all() ;
        $emailTypes = EmailTypes::toString();
        return view('notificatins.send-email',compact('users','emailTypes'));
    }

    public function sendEmail(Request $request)
    {

        $request->validate([
            'user' => 'integer | exists : users,id' ,
            'email_type' => ''
        ]);


       $notification = resolve(Notification::class);
        $mailable = EmailTypes::toMail($request->email_type);
       $notification->sendEmail(User::find($request->user),new $mailable);
    } */
}
