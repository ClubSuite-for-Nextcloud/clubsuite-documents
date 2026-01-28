<?php
namespace OCA\ClubSuiteDocuments\Controller;

use OCP\AppFramework\OCSController;
use OCP\IRequest;
use OCP\AppFramework\Http\JSONResponse;
use OCA\ClubSuiteDocuments\Service\WorkflowService;
use OCA\ClubSuiteDocuments\Service\ExecutionService;

class WorkflowController extends OCSController {
    private WorkflowService $service;
    private ExecutionService $exec;

    public function __construct(string $appName, IRequest $request, WorkflowService $service, ExecutionService $exec) {
        parent::__construct($appName, $request);
        $this->service = $service;
        $this->exec = $exec;
    }

    public function listWorkflows(): JSONResponse { return new JSONResponse($this->service->listWorkflows()); }

    public function createWorkflow(array $data): JSONResponse {
        try { $w = $this->service->createWorkflow($data); return new JSONResponse(['status' => 'success', 'workflow' => $w]); }
        catch (\Throwable $e) { return new JSONResponse(['status' => 'error', 'message' => $e->getMessage()], 400); }
    }

    // simple execute endpoint to record a run
    public function execute(int $workflowId, int $fileId): JSONResponse {
        try {
            $rec = $this->exec->recordExecution(['workflow_id' => $workflowId, 'file_id' => $fileId, 'executed_at' => (new \DateTime())->format('Y-m-d H:i:s'), 'status' => 'ok']);
            return new JSONResponse(['status' => 'success', 'history' => $rec]);
        } catch (\Throwable $e) {
            return new JSONResponse(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }
}
