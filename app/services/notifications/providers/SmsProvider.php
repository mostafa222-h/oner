<?php


namespace App\services\notifications\providers;


class SmsProvider
{
    private $username;
    private $password;
    private $lineNumber;
    public function __construct()
    {
        $this->username = '09143579954';
        $this->password = 'ZXcv*963.';
        $this->lineNumber = '9850001070700407';
    }
    public function send($mobileNumbers, $messages)
    {
        //ای پی ای درخاست اس ام اس ار شرکت خودش با توجه به اطلاعاتی که میخاد...
        try {

            $url = "https://ippanel.com/services.jspd";
            $param = [
                'uname' => $this->username,
                'pass' => $this->password,
                'from' => $this->lineNumber,
                'message' => $messages,
                //  'to' => [$user->phone_number],

                'to' => json_encode($mobileNumbers),
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
