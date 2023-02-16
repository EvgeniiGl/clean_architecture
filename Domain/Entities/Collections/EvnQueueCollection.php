<?php

namespace promed\services\WaitingQueueManager\Entities;

use promed\services\WaitingQueueManager\DTO\Params;

class EvnQueueCollection
{
    /**
     * @var EvnQueue[]
     */
    protected array $list = [];
    
    public function __construct(array $data = [])
    {
	    $this->list = $data;
    }
    
    /**
     * @return EvnQueue[]
     */
    public function getList(): array
    {
        return $this->list;
    }
    
    /**
     * Получить список ид ожидающих пациентов
     * @return array
     */
    public function getListPersonIdForDistribution(): array
    {
        $filtered = array_filter(
            $this->list,
            static function ($evnQueue) {
                return $evnQueue->isPending();
            }
        );
        $listPersonIds = array_unique(
            array_map(
                static function ($evnQueue) {
                    return $evnQueue->person->getPersonId();
                },
                $filtered
            )
        );
        
        return $listPersonIds;
    }
}
