<?php

namespace promed\services\WaitingQueueManager\UseCases;

use promed\services\WaitingQueueManager\DTO\Params;

class DistributeWaitingListsUseCase
{
    private $logger;
    private $lpuRepository;
    private $evnQueueRepository;
    private $timeTableRepository;
    
    public function __construct(
        ILogger $logger,
        ILpuRepository $lpuRepository,
        OptionsUseCase $optionsUseCase,
        IEvnQueueRepository $evnQueueRepository,
        ITimeTableRepository $timeTableRepository,
    ) {
        $this->logger = $logger;
        $this->optionsUseCase = $optionsUseCase;
        $this->lpuRepository = $lpuRepository;
        $this->evnQueueRepository = $evnQueueRepository;
        $this->timeTableRepository = $timeTableRepository;
    }
    
    public function run(Params $params)
    {
        $this->logger->add("Этап 1. Получаем ЛПУ, с включенным автораспределением и обработкой записанных в очередь.");
        $listLpu = $this->lpuRepository->getLpuWithAllowQueue();
	    $globalOptions = $this->optionsUseCase->getOptions();
        if (empty($globalOptions['grant_individual_add_to_wait_list'])) {
            $this->logger->add("Работа с очередью отключена в глобальных настройках системы!");
            return;
        }
        if (empty($listLpu->getListLpu())) {
            $this->logger->add("Задание завершено на Этапе 1: Список ЛПУ пуст.");
            return;
        }
        $this->logger->add("Список ЛПУ для обработки очереди: ".$params->getLpuList());
        $collectionEvnQueue = $this->evnQueueRepository->getCollectionEvnQueue($listLpu->getListIds(), $params);
        $listPersonIdForDistribution = $collectionEvnQueue->getListPersonIdForDistribution();
        $dataTimeTableGraf = $this->timeTableRepository->getDataTimeTableGraf($listPersonIdForDistribution);
        foreach ($collectionEvnQueue->getList() as $evnQueue){
            if($evnQueue->isPending()) {
                /**...*/
            }
            /**...*/
        }
        /**...*/
    }
}
