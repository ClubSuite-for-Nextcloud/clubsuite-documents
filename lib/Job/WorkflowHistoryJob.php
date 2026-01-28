<?php
namespace OCA\ClubSuiteDocuments\Job;

use OCP\BackgroundJob\TimedJob;

class WorkflowHistoryJob extends TimedJob {
    public function __construct() { parent::__construct(); }
    public function run($argument) {
        // placeholder: compact history, warm caches
    }
}
