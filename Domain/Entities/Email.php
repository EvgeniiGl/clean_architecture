<?php


namespace promed\services\WaitingQueueManager\Entities;
use EmaiLException;

class Email
{
    private string $address;

    public function __construct($address)
    {
        if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new EmaiLException('He корректный aдрес эл. почты!');
        }
        $this->address = $address;
    }

    public function __toString()
    {
        return $this->address;
    }

    public function equals(string $address)
    {
        return strtolower((string)$this) === strtolower($address);
    }
}

