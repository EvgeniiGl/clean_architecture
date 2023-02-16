<?php

namespace promed\repositories\WaitingQueueManager;

use promed\services\WaitingQueueManager\DTO\Params;
use promed\services\WaitingQueueManager\Entities\EvnQueueCollection;
use promed\services\WaitingQueueManager\UseCases\IEvnQueueRepository;

class EvnQueueRepository extends SwModel implements IEvnQueueRepository {
    
    public function getCollectionEvnQueue(
        string $listLpu,
        Params $params): EvnQueueCollection
    {
        $sql = "/**...*/";
        
        $data = [
            'listLpu' => $listLpu
        ];
        
        $result = $this->getFirstRowFromQuery($sql, $data);
        //or
        $result = $this->getListEvnQueue($listLpu, $data);
        
        return new EvnQueueCollection($result, $params);
    }
}
