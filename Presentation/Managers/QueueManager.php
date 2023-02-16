<?php

namespace Managers;

use DistributeWaitingListsUseCase;
use OptionsUseCase;
use Params;
use promed\repositories\WaitingQueueManager\EvnQueueRepository;
use promed\repositories\WaitingQueueManager\LpuRepository;
use promed\repositories\WaitingQueueManager\TimeTableRepository;
use WaitingQueueManagerLogger;

class QueueManager
{
    public function runManager()
    {
        $data = $this->ProcessInputData('queueManager', true);
        $params = new Params($data);
        $optionsUseCase = new OptionsUseCase();
        $waitingQueueManagerLogger = new WaitingQueueManagerLogger($data);
        $lpuRepository = new LpuRepository($data);
        $evnQueueRepository = new EvnQueueRepository();
        $timeTableRepository = new TimeTableRepository();
        $distributeWaitingListsUseCase = new DistributeWaitingListsUseCase(
            $waitingQueueManagerLogger,
            $optionsUseCase,
            $lpuRepository,
            $evnQueueRepository,
            $timeTableRepository
        );
        $distributeWaitingListsUseCase->run($params);
    }
}
