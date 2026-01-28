<?php
namespace OCA\ClubSuiteDocuments\Migrations;

use OCP\Migration\IChange;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\IOutput;

class Version20260104 implements IChange {
    public function changeSchema(ISchemaWrapper $schema, IOutput $output) {
        $table = $schema->createTable('dokumente_template');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('name', 'string', ['length' => 191]);
        $table->addColumn('description', 'text', []);
        $table->addColumn('file_id', 'integer', ['notnull' => false]);
        $table->addColumn('category', 'string', ['length' => 191, 'notnull' => false]);
        $table->setPrimaryKey(['id']);

        $wf = $schema->createTable('dokumente_workflow');
        $wf->addColumn('id', 'integer', ['autoincrement' => true]);
        $wf->addColumn('name', 'string', ['length' => 191]);
        $wf->addColumn('trigger', 'string', ['length' => 191]);
        $wf->addColumn('action', 'string', ['length' => 191]);
        $wf->addColumn('config_json', 'text', ['notnull' => false]);
        $wf->setPrimaryKey(['id']);

        $hist = $schema->createTable('dokumente_history');
        $hist->addColumn('id', 'integer', ['autoincrement' => true]);
        $hist->addColumn('workflow_id', 'integer', []);
        $hist->addColumn('file_id', 'integer', []);
        $hist->addColumn('executed_at', 'datetime', []);
        $hist->addColumn('status', 'string', ['length' => 50]);
        $hist->setPrimaryKey(['id']);
    }

    public function postSchemaChange(ISchemaWrapper $schema, IOutput $output) {
        // no-op
    }
}
