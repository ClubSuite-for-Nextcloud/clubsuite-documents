<?php
namespace OCA\ClubSuiteDocuments\Db;

class WorkflowEntity {
    private ?int $id = null;
    private string $name;
    private string $trigger;
    private string $action;
    private ?string $configJson;

    public function __construct(array $data = []) { foreach ($data as $k => $v) { $this->$k = $v; } }

    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getTrigger(): string { return $this->trigger; }
    public function getAction(): string { return $this->action; }
    public function getConfigJson(): ?string { return $this->configJson; }
}
