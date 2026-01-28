<?php
namespace OCA\ClubSuiteDocuments\Db;

class TemplateEntity {
    private ?int $id = null;
    private string $name;
    private ?string $description;
    private ?int $fileId;
    private ?string $category;

    public function __construct(array $data = []) {
        foreach ($data as $k => $v) { $this->$k = $v; }
    }

    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getDescription(): ?string { return $this->description; }
    public function getFileId(): ?int { return $this->fileId; }
    public function getCategory(): ?string { return $this->category; }
}
