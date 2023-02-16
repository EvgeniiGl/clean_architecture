<?php

namespace promed\services\WaitingQueueManager\Entities;

final class Person
{
    private int $id;
    private string $fio;
    private Email $email;
    private bool $personIsDead;
    public function __construct(int $id,
        string $fio,
        Email $email,
        bool $personIsDead)
    {
        $this->id = $id;
        $this->fio = $fio;
        $this->email = $email;
        $this->personIsDead = $personIsDead;
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
