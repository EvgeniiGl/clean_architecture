<?php

namespace promed\services\WaitingQueueManager\Entities;


class ID
{
	private string $value;

	public function __construct(string $value)
	{
		if (empty($value)) {
			throw new EmptyException('Ид не может быть пустым!');
		}
		$this->value = $value;
	}

	public static function next(): self
	{
		return new self(Uuid::uuid4()->toString());
	}

	public function getValue(): string
	{
		return $this->value;
	}
}
