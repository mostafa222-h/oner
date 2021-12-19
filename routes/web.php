<?php

use App\Jobs\SendEmail;
use App\Mail\TopicCreated;
use App\Models\User;
use App\services\notifications\Notification;
use App\services\notifications\providers\EmailProvider;
use App\services\notifications\providers\SmsProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
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

    return view('home');

});



/*Route::get('/', function () {
    $url = URL::temporarySignedRoute('test' ,now()->addMinutes(60),['id'=>12]);
   // return view('home');
    dd($url);
});*/
/*Route::get('/', function ( Request $request) {
    $url = URL::hasValidSignature($request);
   // return view('home');
    dd($url);
});*/
/*Route::get('test',function (){
    return 'hi' ;
})->name('test');*/
/*Route::get('/test', function () {
    return view('layouts.layout');
});*/
/*Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/users', function () {
    $users = User::all();
    return view( 'user' , ['users' => $users ] );
});*/

Route::get('/email', function (){
    //job queue
    SendEmail::dispatch() ;
});
Route::get('/sendmail', function (){
    $not = new Notification(new EmailProvider(User::find(1),new TopicCreated()));
    return $not->processClass(new EmailProvider(User::find(1),new TopicCreated()));
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
/*   $user = User::find(1);
    $a = $user['phone_number'] ;
    $b = json_encode($a) ;
    $c =array( '0' . $b);
   // var_dump(User::find(1));die();
    //$mobile_numbers = array('0' . '9925961712' );
    $notification = resolve(Notification::class);
    $notification->sendSms($c,'1تست');*/
    $user = User::find(1);
    $a = $user['phone_number'] ;
    $b = json_encode($a) ;
    $c =array( '0' . $b);
    $not = new Notification(new SmsProvider($c,'2تست'));
    return $not->processClass(new SmsProvider($c,'2تست'));
});
/*Route::get('/telegram', function (){

    $notification = resolve(Notification::class);
    $notification->sendTelegram(User::find(1),new TopicCreated());

});*/
//هر وقت درخواستمون رفت به notification
//و send email
/*Route::get('/notification/send-email','NotificationsController@email')->name('notification.form.email');
Route::post('/notification/send-email','NotificationsController@Sendemail')->name('notification.send.email');*/
//ارسال داینامیک
Route::get('/notification/sends','NotificationsController@send')->name('notification.form.send');
//Route::get('/register','AuthController@register')->name('register');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');











Route::group(['namespace' => 'Auth','prefix'=>'auth','middleware'=>'auth'], function() {
    Route::get('email/send-verification', 'VerificationController@send')->name('auth.email.send.verify');
    Route::get('email/verify','VerificationController@verify')->name('auth.email.verify');

});














//Route::get('/home', 'HomeController@dashboard')->name('home');

Route::get('logout',function (){
    Auth::logout();
});
