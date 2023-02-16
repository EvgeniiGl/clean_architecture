<?php

namespace promed\services\WaitingQueueManager\Entities;

class Person
{
	private Id $id;
	private PersonName $personName;
	private Email $email;

	public function __construct(
		Id         $id,
		PersonName $personName,
		Email      $email
	)
	{
		$this->id = $id;
		$this->personName = $personName;
		$this->email = $email;
	}

	/**...*/
    public function personIsDead(): bool
    {
        return $this->personIsDead;
    }
    public function setEmail(Email $email): self
    {
        return new self($this->id, $this->fio, $email, $this->personIsDead);
    }
    /**...*/
}
