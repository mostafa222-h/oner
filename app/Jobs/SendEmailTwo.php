<?php

namespace App\Jobs;

use App\Mail\TopicCreated;
use App\Models\User;
use App\services\notifications\Notification;
use App\services\notifications\providers\EmailProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailTwo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */



    public function __construct( )
    {

    }

    /**
     * Execute the job.
     *
     * @param Request $request
     * @return void
     */
    public function handle()
    {
        $not = new Notification(new EmailProvider(User::find(1),new TopicCreated()));
        return $not->processClass(new EmailProvider(User::find(1),new TopicCreated()));
    }
}
