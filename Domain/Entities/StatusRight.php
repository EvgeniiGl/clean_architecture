<?php

namespace promed\services\WaitingQueueManager\Entities;

use ValueObjects\Base\BaseEnum;

final class Status extends BaseEnum
{
    private const SUCCESS = 'success';
    private const PENDING = 'pending';
    private const REJECTED = 'rejected';
    private const CREATED = 'created';
    
    private string $current = 'created';
    
    public function __construct(string $status)
    {
        if (self::isValidName($status)) {
            $this->current = $status;
        }
    }
    
    public function getCurrent(): string
    {
        return $this->current;
    }
}
