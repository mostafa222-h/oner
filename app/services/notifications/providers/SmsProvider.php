<?php


namespace App\services\notifications\providers;


use App\services\notifications\providers\contracts\Provider;

class SmsProvider implements Provider
{
    private $username;
    private $password;
    private $lineNumber;
    private $mobileNumbers ;
    private $messages ;
    public function __construct($mobileNumbers,$messages)
    {
        $this->username = '09143579954';
        $this->password = 'ZXcv*963.';
        $this->lineNumber = '9850001070700407';
        $this->mobileNumbers = $mobileNumbers ;
        $this->messages = $messages ;
    }
    public function send()
    {
        //ای پی ای درخاست اس ام اس ار شرکت خودش با توجه به اطلاعاتی که میخاد...
        try {

            $url = "https://ippanel.com/services.jspd";
            $param = [
                'uname' => $this->username,
                'pass' => $this->password,
                'from' => $this->lineNumber,
                'message' => $this->messages,
                //  'to' => [$user->phone_number],

                'to' => json_encode($this->mobileNumbers),
                'op' => 'send'
            ];
            $handler = curl_init($url);
            curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handler);
            //$response_array = json_decode($response);
            //$res_code = $response_array[0];
            //$result = $response_array[1];
            return json_decode($response);
        }catch (\Exception $ex ){

            return $ex->getMessage();
        }

    }
}
