<?php

namespace promed\repositories\WaitingQueueManager;

use promed\services\WaitingQueueManager\UseCases\ITimeTableRepository;
use Timetable_model;

class TimeTableRepository extends TimeTable_Model implements ITimeTableRepository
{
    
    public function getDataTimeTableGraf(array $listPersonIdForDistribution): array
    {
    }
}
