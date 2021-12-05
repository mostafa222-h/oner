<?php

use App\Jobs\SendEmail;
use App\Mail\TopicCreated;
use App\Models\User;
use App\services\notifications\Notification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/users', function () {
    $users = User::all();
    return view( 'user' , ['users' => $users ] );
});

Route::get('/email', function (){

    SendEmail::dispatch() ;
  // Mail::to("a.xareian@gmail.com")->send(new TopicCreated());
});

Route::get('/sendmail', function (){

   $notification = resolve(Notification::class);
   $notification->sendEmail(User::find(1),new TopicCreated());

});

/*Route::get('/sends', function (){
    //dd("aaaaaaaaaaaaaa");
   // $mobile = '9925961712' ;
   $mobile = User::all();
   var_dump($mobile);die();
   foreach ($mobile as $mob){
       var_dump($mob['mobile_number']);
   }
    //echo($mobile->phone_number);
   die();
    $mobile_numbers = array('0' . $mobile);
    $notification = resolve(Notification::class);
    $notification->sendSms($mobile_numbers,'1تست');

});*/

Route::get('/sends', function (){
   $user = User::find(1);
    $a = $user['phone_number'] ;
    $b = json_encode($a) ;
    $c =array( '0' . $b);

   // var_dump(User::find(1));die();



    //$mobile_numbers = array('0' . '9925961712' );
    $notification = resolve(Notification::class);
    $notification->sendSms($c,'1تست');

});

Route::get('/telegram', function (){

    $notification = resolve(Notification::class);
    $notification->sendTelegram(User::find(1),new TopicCreated());

});
