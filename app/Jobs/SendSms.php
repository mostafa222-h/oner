<?php

namespace App\Jobs;

use App\Models\User;
use App\services\notifications\Notification;
use App\services\notifications\providers\SmsProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */



    public function __construct()
    {

    }


    /**
     * Execute the job.
     *
     * @param Request $request
     * @return void
     */
    public function handle(Request $request)
    {
        $b = json_encode($request->input('mobile-number')) ;
        $c =array( '0' . $b);
        $not = new Notification(new SmsProvider($c,'2تست'));
        return $not->processClass(new SmsProvider($c,'2تست'));
    }
}
