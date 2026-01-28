<?php
namespace OCA\ClubSuiteDocuments\Migrations;

use OCP\AppFramework\Db\SchemaTrait;
use OCP\Migration\IMigration;
use OCP\Migration\IOutput;

class Version20260105_AddIndexes implements IMigration {
    use SchemaTrait;

    public function changeSchema(IOutput $output) {
        $schema = $this->getSchema();
        if ($schema->hasTable('dokumente_template')) {
            $t = $schema->getTable('dokumente_template');
            if (!$t->hasIndex('idx_dokumente_template_name')) $t->addIndex(['name'], 'idx_dokumente_template_name');
            if (!$t->hasIndex('idx_dokumente_template_created')) $t->addIndex(['created_at'], 'idx_dokumente_template_created');
        }
    }

    public function up(IOutput $output) { $this->changeSchema($output); }
    public function down(IOutput $output) { }
}
