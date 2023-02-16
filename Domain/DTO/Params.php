<?php

namespace promed\services\WaitingQueueManager\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class Params extends DataTransferObject {

    /** @var bool $logging влючено логирование */
    public $logging;
    /** @var bool раздавать только что созданные бирки (не ждать 30 мин полсе создания) */
    public $bypassRecordDelay;
    /** @var int максимальное время ожидания подтверждения записи на прием пациентом, ч. */
    public $max_accept_time;
    /** @var int максимальное количество отклонений записи на прием пациентом */
    public $max_decline_count;

    public function __construct($data)
    {
        parent::__construct($data);
    }
}
