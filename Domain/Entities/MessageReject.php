<?php

namespace promed\services\WaitingQueueManager\Entities;

final class MessageReject extends Message{

    protected $title = 'Исключение из листа ожидания';
    protected $push = ':person_fio исключен(а) из листа ожидания к врачу по причине: :cause';
    protected $email = 'Пациент :person_fio исключен из листа ожидания к врачу по причине: :cause';

}
