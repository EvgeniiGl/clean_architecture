<?php

namespace promed\services\WaitingQueueManager\Entities;

class StatusTransformer
{
    public function toArray(Status $status)
    {
        if ($status instanceof StatusRejected) {
            return [
                'evnqueuestatus_id' => 4,
                'evnstatuscause_id' => 1,
                'dirfailtype_id'    => 5,
                'queuefailcause_id' => 8,
            ];
        }
    }
}
