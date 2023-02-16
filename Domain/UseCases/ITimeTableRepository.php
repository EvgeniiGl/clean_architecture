<?php

namespace promed\services\WaitingQueueManager\UseCases;

interface ITimeTableRepository
{
    public function getDataTimeTableGraf(array $listPersonIdForDistribution): array;
}
