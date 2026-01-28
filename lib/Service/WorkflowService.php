<?php
namespace OCA\ClubSuiteDocuments\Service;

use OCA\ClubSuiteDocuments\Db\WorkflowMapper;

class WorkflowService {
    private WorkflowMapper $mapper;
    public function __construct(WorkflowMapper $mapper) { $this->mapper = $mapper; }

    public function listWorkflows(): array { return $this->mapper->findAll(); }
    public function getWorkflow(int $id) { return $this->mapper->findById($id); }
    public function createWorkflow(array $data) { return $this->mapper->create($data); }
}
