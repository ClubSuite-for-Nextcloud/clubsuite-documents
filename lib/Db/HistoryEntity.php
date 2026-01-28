<?php
namespace OCA\ClubSuiteDocuments\Db;

class HistoryEntity {
    private ?int $id = null;
    private int $workflowId;
    private int $fileId;
    private \DateTime $executedAt;
    private string $status;

    public function __construct(array $data = []) { foreach ($data as $k => $v) { $this->$k = $v; } }

    public function getId(): ?int { return $this->id; }
    public function getWorkflowId(): int { return $this->workflowId; }
    public function getFileId(): int { return $this->fileId; }
    public function getExecutedAt(): \DateTime { return $this->executedAt; }
    public function getStatus(): string { return $this->status; }
}
