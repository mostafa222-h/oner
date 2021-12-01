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
