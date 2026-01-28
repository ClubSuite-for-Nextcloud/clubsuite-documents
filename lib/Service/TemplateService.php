<?php
namespace OCA\ClubSuiteDocuments\Service;

use OCA\ClubSuiteDocuments\Db\TemplateMapper;

class TemplateService {
    private $mapper;
    public function __construct(TemplateMapper $mapper) { $this->mapper = $mapper; }

    public function listTemplatesPaginated(int $limit = 25, int $offset = 0, string $sort = 'name', string $order = 'ASC') : array {
        $result = $this->mapper->findAllPaginated($limit, $offset, $sort, $order);
        $rows = array_map(function($t){
            return ['id'=>$t->getId(),'name'=>$t->getName(),'description'=>$t->getDescription(),'created_at'=>$t->getCreatedAt()?->format('c')];
        }, $result['rows']);
        return ['total'=>$result['total'],'limit'=>$limit,'offset'=>$offset,'rows'=>$rows];
    }
}
<?php
namespace OCA\ClubSuiteDocuments\Service;

use OCA\ClubSuiteDocuments\Db\TemplateMapper;

class TemplateService {
    private TemplateMapper $mapper;
    public function __construct(TemplateMapper $mapper) { $this->mapper = $mapper; }

    public function listTemplates(): array { return $this->mapper->findAll(); }
    public function getTemplate(int $id) { return $this->mapper->findById($id); }
    public function createTemplate(array $data) { return $this->mapper->create($data); }
}
