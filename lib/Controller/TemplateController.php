<?php
namespace OCA\ClubSuiteDocuments\Controller;

use OCP\AppFramework\OCSController;
use OCP\IRequest;
use OCP\AppFramework\Http\JSONResponse;
use OCA\ClubSuiteDocuments\Service\TemplateService;

class TemplateController extends OCSController {
    private TemplateService $service;
    public function __construct(string $appName, IRequest $request, TemplateService $service) { parent::__construct($appName, $request); $this->service = $service; }

    public function listTemplates(): JSONResponse {
        $limit = (int)$this->request->getParam('limit', 25);
        $offset = (int)$this->request->getParam('offset', 0);
        $sort = $this->request->getParam('sort', 'name');
        $order = $this->request->getParam('order', 'ASC');

        $service = new \OCA\ClubSuiteDocuments\Service\TemplateService($this->service->mapper ?? $this->service);
        $result = $service->listTemplatesPaginated($limit, $offset, $sort, $order);
        return new \OCP\AppFramework\Http\JSONResponse($result);
    }

    public function createTemplate(array $data): JSONResponse {
        try { $t = $this->service->createTemplate($data); return new JSONResponse(['status' => 'success', 'template' => $t]); }
        catch (\Throwable $e) { return new JSONResponse(['status' => 'error', 'message' => $e->getMessage()], 400); }
    }
}
