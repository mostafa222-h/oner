<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Auth\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user ;
    }
    public function build()
    {
        return $this->markdown('emails.verification-email')->with([
            'link' => $this->GenerateUrl(),
            'name' => $this->user->name

        ]);
    }
    protected function GenerateUrl(){
     return URL::temporarySignedRoute('auth.email.verify',now()->addMinutes(120),['email'=>$this->user->email]);
    }
}
