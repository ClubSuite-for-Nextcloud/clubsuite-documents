<?php
namespace OCA\ClubSuiteDocuments\Listener;
use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\IEventListener;

use OCA\ClubSuiteDocuments\Events\DokumenteRequestDataEvent;

class DokumenteRequestDataEventListener implements IEventListener {
    public function handle(Event $event): void {
        if (!($event instanceof DokumenteRequestDataEvent)) {
            return;
        }
        $data = ['app' => 'Dokumente', 'templates' => 0];
        $event->respond($data);
    }
}
