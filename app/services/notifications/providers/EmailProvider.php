<?php


namespace App\services\notifications\providers;


use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class EmailProvider
{
    public function send(User $user ,Mailable $mailable)
    {
        return Mail::to($user)->send($mailable);
    }
}
