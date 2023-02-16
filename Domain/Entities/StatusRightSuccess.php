<?php

namespace promed\services\WaitingQueueManager\Entities;

use ValueObjects\Base\BaseEnum;

class StatusSuccess extends Status
{
    private const SUCCESS = 'success';
}

class StatusPending extends Status
{
    private const PENDING = 'pending';
}

class StatusCreated extends Status
{
    private const CREATED = 'created';
}


class StatusRejected extends Status
{
    private const REJECTED = 'rejected';
}



    private const PENDING = 'pending';
    private const REJECTED = 'rejected';
    private const CREATED = 'created';
