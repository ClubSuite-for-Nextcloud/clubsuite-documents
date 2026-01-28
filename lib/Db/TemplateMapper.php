<?php
namespace OCA\ClubSuiteDocuments\Db;

use OCP\IDBConnection;

class TemplateMapper {
    private IDBConnection $db;
    private string $table = 'dokumente_template';

    public function __construct(IDBConnection $db) { $this->db = $db; }

    public function findAll(): array {
        $qb = $this->db->getQueryBuilder();
        $qb->select('*')->from($this->table);
        $res = $qb->executeQuery();
        $rows = $res->fetchAllAssociative();
        $out = [];
        foreach ($rows as $r) { $out[] = new TemplateEntity($r); }
        return $out;
    }

    /**
     * Paginated listing using QueryBuilder.
     * @return array ['total'=>int,'rows'=>TemplateEntity[]]
     */
    public function findAllPaginated(int $limit = 25, int $offset = 0, string $sort = 'name', string $order = 'ASC'): array {
        $allowed = ['name','created_at'];
        if (!in_array($sort, $allowed, true)) { $sort = 'name'; }
        $order = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';

        $qb = $this->db->getQueryBuilder();
        $qb->select('COUNT(*) AS c')->from($this->table);
        $total = (int)$qb->executeQuery()->fetchAssociative()['c'];

        $qb = $this->db->getQueryBuilder();
        $qb->select('*')->from($this->table)->orderBy($sort, $order)->setFirstResult($offset)->setMaxResults($limit);
        $rows = $qb->executeQuery()->fetchAllAssociative();
        $out = [];
        foreach ($rows as $r) { $out[] = new TemplateEntity($r); }
        return ['total'=>$total,'rows'=>$out];
    }

    public function findById(int $id): ?TemplateEntity {
        $qb = $this->db->getQueryBuilder();
        $qb->select('*')->from($this->table)->where($qb->expr()->eq('id', $qb->createNamedParameter($id)));
        $r = $qb->executeQuery()->fetchAssociative();
        return $r ? new TemplateEntity($r) : null;
    }

    public function create(array $data): TemplateEntity {
        $this->db->insert($this->table, $data);
        $data['id'] = (int)$this->db->lastInsertId($this->table);
        return new TemplateEntity($data);
    }
}
