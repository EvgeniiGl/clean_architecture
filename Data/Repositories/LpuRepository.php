<?php

namespace promed\repositories\WaitingQueueManager;

use promed\services\WaitingQueueManager\Entities\LPU;
use promed\services\WaitingQueueManager\UseCases\ILpuRepository;
use SwModel;
use promed\services\WaitingQueueManager\Entities\LpuCollection;

class LpuRepository extends SwModel implements ILpuRepository {

    /**
     * @return LPU[]
     */
    public function getLpuWithAllowQueue(): LpuCollection
    {
        $result = $this->queryResult("
                select
                ...
                ");

        return new LpuCollection($result);
    }
}
