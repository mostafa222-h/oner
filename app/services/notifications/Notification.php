<?php


namespace App\services\notifications;

/*use App\Models\User;
use App\services\notifications\providers\EmailProvider;
use App\services\notifications\providers\SmsProvider;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;*/

use App\services\notifications\providers\contracts\Provider;

class Notification
{
 /*   public function sendEmail(User $user ,Mailable $mailable)
    {
            $emailprovider = new EmailProvider() ;
            return $emailprovider->send($user,$mailable);
    }

    public function sendSms($mobileNumbers, $messages)
    {
        $sms = new SmsProvider() ;
        return $sms->send($mobileNumbers,$messages);
    }*/
    //الان هر کدوم از providerharo صدا بزنیم به راهتی اجرا میشن و نیاز به تغییر در این کلاس دیگه کلا نیست...
    public function __call($method,$arg)
    {
        //services class adress for crate obj...
        //substr($method,4) . 'Provider' => class name

        $providerPath= __NAMESPACE__ . '\providers\\' . substr($method,4) . 'Provider';
        //اگر کلاس وجود نداشت...
        if(! class_exists($providerPath)){
            throw new \Exception("CLASS DOSE NOT EXIST");
        }
        //create obj for receve to method...
        $providerInstane = new $providerPath(...$arg);
        //اگر وجود داشت و متد send نداشت بازم خطا داریم...
       if (! is_subclass_of($providerInstane,Provider::class)){
            throw new \Exception('class not implements Provider interface App\services\notifications\providers\contracts\Provider');
        }
        return  $providerInstane->send();
    }
}
