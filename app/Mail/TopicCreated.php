<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TopicCreated extends Mailable
{
    use Queueable, SerializesModels;
    private  $first_name ;
    private $last_name ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->first_name = "mostafa" ;
        $this->last_name = "hekmati" ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //ارجاع به blade topic-created
        return $this->markdown('emails.topic-created')->with([
            'full_name' => $this->first_name . $this->last_name
        ]);
    }
}
