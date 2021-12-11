<?php
namespace App\services\notifications\constant;

use function Symfony\Component\Translation\t;

class EmailTypes{
    const USER_REGISTERED =1 ;
    const TOPIC_CREATED = 2 ;
    const FORGET_PASSWORD = 3 ;
    public static function toString(){
        //کلیدش باشه همین ثابت هایی که من دارم...
        return [
            self::USER_REGISTERED => 'ثبت نام یوزر' ,
            self::TOPIC_CREATED => 'ایجاد مقاله جدید' ,
            self::FORGET_PASSWORD => 'فراموشی رمز عبور'
        ];
    }
    public static function toMail($type){
        try {
            return[
                self::USER_REGISTERED => UserRegistered::class ,
                self::TOPIC_CREATED => TopicCreate::class ,
                self::FORGET_PASSWORD =>ForgetPassword::class
            ][$type];
        }catch (\Throwable $th){
            throw new \InvalidArgumentException('mailable class does not exists');
        }


    }
}
