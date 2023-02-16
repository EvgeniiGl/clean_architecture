<?php

namespace promed\services\WaitingQueueManager\Entities;

final class StatusReject extends Status
{
    private int $evnQueueStatusId = 4;
    private ?int $evnStatusCauseId = 1;
    private ?int $dirFailTypeId = 5;
    private ?int $queueFailCauseId = 8;
}
