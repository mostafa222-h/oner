<?php

namespace App\Jobs;

use App\Mail\TopicCreated;
use App\Mail\VerificationEmail;
use App\Models\User;
use App\services\notifications\Notification;
use App\services\notifications\providers\EmailProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VeriJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;

    public function __construct(User $user)
    {
        //the user property passed to the constructor through the job dispatch method
        $this->user = $user;
    }

    public function handle($user)
    {
        Mail::to($this->user->email)->send(new VerificationEmail($user));

    }
}
