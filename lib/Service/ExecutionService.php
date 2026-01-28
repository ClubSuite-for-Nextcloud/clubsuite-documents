<?php
namespace OCA\ClubSuiteDocuments\Service;

use OCA\ClubSuiteDocuments\Db\HistoryMapper;

class ExecutionService {
    private HistoryMapper $history;
    public function __construct(HistoryMapper $history) { $this->history = $history; }

    public function recordExecution(array $data) { return $this->history->create($data); }
}
