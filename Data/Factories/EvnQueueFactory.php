<?php

namespace promed\services\WaitingQueueManager\Entities;

class EvnQueueFactory
{
    public function create(array $data, int $maxDeclineCount): EvnQueueCollection
    {
	    $evnQueueCollection = new EvnQueueCollection();
	    foreach ($data as $item) {
		    $person = new Person(
			    $item['Person_id'],
			    $item['Person_Fio'],
			    $item['Person_IsDead'],
			    $item['Person_deadDT']
		    );
		    $status = $this->getStatus($item, $maxDeclineCount, $person);
		    $evnQueueCollection->add(new EvnQueue($item['EvnQueue_id'], $person, $status));
	    }

	    return $evnQueueCollection;
    }
    
    private function getStatus(array $data, int $maxDeclineCount, Person $person): Status
    {
        if ($data['declineCount'] + 1 >= $maxDeclineCount) {
            return new StatusReject();
        }
        if($person->personIsDead()){
            return new StatusReject();
        }
        if ($data['declineCount'] === 0 && isset($data['TimeTableGraf_id'])) {
            return new StatusRefused();
        }
        /**...*/



        if(Status::isValidName($status))){
            $this->status = Status::getStatus($status);
        }


	}
    
    
}
