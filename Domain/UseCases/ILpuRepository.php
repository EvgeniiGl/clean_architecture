<?php

namespace promed\services\WaitingQueueManager\UseCases;

use promed\services\WaitingQueueManager\Entities\LpuCollection;

interface ILpuRepository
{
    public function getLpuWithAllowQueue(): LpuCollection;
}
