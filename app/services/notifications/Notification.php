<?php


namespace App\services\notifications;
use App\services\notifications\providers\contracts\Provider;

class Notification
{
  private $data ;

    public function __construct($class)
     {
        $this->data = $class ;
     }

    public function processClass(Provider $send)
    {
        return $this->data = $send->send($this->data);
    }

}
