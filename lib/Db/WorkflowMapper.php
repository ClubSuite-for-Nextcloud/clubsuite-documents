<?php
namespace OCA\ClubSuiteDocuments\Db;

use OCP\IDBConnection;

class WorkflowMapper {
    private IDBConnection $db;
    private string $table = 'dokumente_workflow';

    public function __construct(IDBConnection $db) { $this->db = $db; }

    public function findAll(): array {
        $qb = $this->db->getQueryBuilder();
        $qb->select('*')->from($this->table);
        $rows = $qb->executeQuery()->fetchAllAssociative();
        $out = [];
        foreach ($rows as $r) { $out[] = new WorkflowEntity($r); }
        return $out;
    }

    public function findById(int $id): ?WorkflowEntity {
        $qb = $this->db->getQueryBuilder();
        $qb->select('*')->from($this->table)->where($qb->expr()->eq('id', $qb->createNamedParameter($id)));
        $r = $qb->executeQuery()->fetchAssociative();
        return $r ? new WorkflowEntity($r) : null;
    }

    public function create(array $data): WorkflowEntity {
        $this->db->insert($this->table, $data);
        $data['id'] = (int)$this->db->lastInsertId($this->table);
        return new WorkflowEntity($data);
    }
}
