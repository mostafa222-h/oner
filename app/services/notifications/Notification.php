<?php


namespace App\services\notifications;


use App\Models\User;
use App\services\notifications\providers\EmailProvider;
use App\services\notifications\providers\SmsProvider;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class Notification
{
    public function sendEmail(User $user ,Mailable $mailable)
    {
            $emailprovider = new EmailProvider() ;
            return $emailprovider->send($user,$mailable);
    }

    public function sendSms($mobileNumbers, $messages)
    {
        $sms = new SmsProvider() ;
        return $sms->send($mobileNumbers,$messages);
    }

    public function __call($method,$arg)
    {
        $providerPath= __NAMESPACE__ . '\providers\\' . substr($method,4) . 'Provider';
        //dd(...$arg);
        $providerInstane = new $providerPath;
        $providerInstane->send(...$arg);
       // echo($providerPath);
    }
}
