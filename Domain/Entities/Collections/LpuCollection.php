<?php

namespace promed\services\WaitingQueueManager\Entities;

class LpuCollection
{
    private array $list = [];
    
    public function __construct(array $data){
        foreach ($data as $lpu) {
            $this->list[] = new Lpu($lpu);
        }
    }
    
    public function getListLpu(): array
    {
        return $this->list;
    }
    
    public function getListIds(): string
    {
        return implode(',', array_column($this->list, 'Lpu_id'));
    }
}
