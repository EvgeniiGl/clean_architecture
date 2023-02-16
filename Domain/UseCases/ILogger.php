<?php

namespace promed\services\WaitingQueueManager\UseCases;

interface ILogger {
    public function add(string $message): void;
}
