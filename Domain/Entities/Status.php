<?php

namespace promed\services\WaitingQueueManager\Entities;

abstract class Status
{
    private int $evnQueueStatusId;
    private ?int $evnStatusCauseId;
    private ?int $dirFailTypeId;
    private ?int $queueFailCauseId;
    
    public function __construct(){
        if(!isset($this->evnQueueStatusId)){
            throw new StatusException('Статус должен быть задан!');
        }
    }
    
    public function toArray(): array
    {
        return [
            'evnqueuestatus_id' => $this->evnQueueStatusId,
            'evnstatuscause_id' => $this->evnStatusCauseId,
            'dirfailtype_id' => $this->dirFailTypeId,
            'queuefailcause_id' => $this->queueFailCauseId,
        ];
    }
}
