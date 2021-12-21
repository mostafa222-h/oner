<?php

namespace App\Listeners;

use App\Events\UserRegister;
use App\Mail\VerificationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendVerificationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserRegister  $event
     * @return void
     */
    public function handle(UserRegister $event)
    {
        Mail::to( $event->user->email)->send(new VerificationEmail($event->user));
      //$event->user->sendEmailVerificationNotification();
    }
}
