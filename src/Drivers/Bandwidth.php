<?php

namespace Zenapply\Sms\Drivers;

use Catapult\Client as Service;
use Catapult\Credentials;
use Catapult\Message;
use Catapult\PhoneNumber;
use Catapult\TextMessage;
use Catapult\PhoneNumbers;
use Zenapply\Sms\Drivers\Driver;
use Zenapply\Sms\Exceptions\InvalidPhoneNumberException;
use Zenapply\Sms\Responses\Bandwidth as BandwidthResponse;

class Bandwidth extends Driver
{
    protected $handle;

    public function __construct($secret, $token, $user_id)
    {
        $cred = new Credentials($user_id, $token, $secret);
        $this->handle = new Service($cred);
    }

    public function send($msg, $to, $from, $callback = null)
    {
        $message = new Message(array(
            "from" => new PhoneNumber($from),
            "to" => new PhoneNumber($to),
            "text" => new TextMessage($msg),
            "callbackUrl" => $callback,
        ));
        return new BandwidthResponse($message);
    }

    public function searchNumber($areacode, $country = 'US')
    {
        throw new \Exception("Error Processing Request", 1);
    }

    public function buyNumber($phone)
    {
        throw new \Exception("Error Processing Request", 1);
    }

    public function sellNumber($phone)
    {
        throw new \Exception("Error Processing Request", 1);
    }
}
