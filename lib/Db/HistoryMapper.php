<?php
namespace OCA\ClubSuiteDocuments\Db;

use OCP\IDBConnection;

class HistoryMapper {
    private IDBConnection $db;
    private string $table = 'dokumente_history';

    public function __construct(IDBConnection $db) { $this->db = $db; }

    public function findByWorkflow(int $workflowId): array {
        $qb = $this->db->getQueryBuilder();
        $qb->select('*')->from($this->table)->where($qb->expr()->eq('workflow_id', $qb->createNamedParameter($workflowId)));
        $rows = $qb->executeQuery()->fetchAllAssociative();
        $out = [];
        foreach ($rows as $r) { $out[] = new HistoryEntity($r); }
        return $out;
    }

    public function create(array $data): HistoryEntity {
        $this->db->insert($this->table, $data);
        $data['id'] = (int)$this->db->lastInsertId($this->table);
        return new HistoryEntity($data);
    }
}
