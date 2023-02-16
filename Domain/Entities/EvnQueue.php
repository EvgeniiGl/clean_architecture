<?php

namespace promed\services\WaitingQueueManager\Entities;

use promed\services\Status;
use promed\services\Person;


class EvnQueue {

    public function __construct(Person $person, Status $status) {

        $this->status = $status;
    }

    public function isReject(): bool
    {
        return $this->status instanceof StatusReject;
    }

    public function isPending(): bool
    {
        return $this->status instanceof StatusPending;
    }

    public function isRefused(): bool
    {
        return $this->status instanceof StatusRefused;
    }

    public function toArray(): array
    {

        $person = new Person();
        $status = new Status();
        $EvnQueue = new EvnQueue($person, $status);


        $EvnQueue = app(EvnQueue::class);


        return array_merge(
            [
                /**...*/
                'DirFailTypeId' => $this->status->getDirFailTypeId(),
            ],
            $this->status->toArray()
        );
    }

    public function refuse(int $maxDeclineCount):self
    {
        ++$this->declineCount;
        if ($this->declineCount >= $maxDeclineCount) {
            return new self($this->id, $this->person, new StatusReject());
        }

        return new self($this->id, $this->person, new StatusPending());
    }

    public function setRejectIfPersonIsDead(Person $person)
    {
        if ($person->getPersonIsDead()) {
            return new self($this->id, $this->person, new StatusReject());
        }

        return $this;
    }

	public function setStatus(Status $status): self
	{
		return new self($this->id, $this->person, $status);
	}

	public function reject(): self
	{
		return new self($this->id, $this->person, new StatusReject());
	}

	public function success(): self
	{
		return new self($this->id, $this->person, new StatusSuccess());
	}
}
