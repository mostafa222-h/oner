<?php

use App\services\notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*Route::post('/sends', function (){

    $mobile = '9925961712' ;
    $mobile_numbers = array('0' . $mobile);
    $notification = resolve(Notification::class);
    $notification->sendSms($mobile_numbers,'1تست');

});*/
