<?php

namespace promed\services\WaitingQueueManager\UseCases;

use promed\services\WaitingQueueManager\DTO\Params;
use promed\services\WaitingQueueManager\Entities\EvnQueueCollection;
use promed\services\WaitingQueueManager\Entities\LPU;
use promed\services\WaitingQueueManager\Entities\Person;

interface IEvnQueueRepository {
    /**
     * @return Lpu[]
     */
    public function getCollectionEvnQueue(string $listLpu, Params $params): EvnQueueCollection;
}
