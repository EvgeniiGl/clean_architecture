<?php

namespace promed\services\WaitingQueueManager\Entities;
use PhoneException;

class Phone
{
    private $phone;

    public function __construct($phone)
    {
        if (!preg_match('/*[0-9]{10}+$/', $phone)) {
            throw new PhoneException('He корректный номер телефона!');
        }
        $this->phone = $phone;
    }

    public function getValue()
    {
        return $this->phone;
    }
}
