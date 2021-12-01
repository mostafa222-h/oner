<?php


namespace App\services\notifications;


use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class Notification
{
    public function sendEmail(User $user ,Mailable $mailable)
    {
        return Mail::to($user)->send($mailable);
    }
}
