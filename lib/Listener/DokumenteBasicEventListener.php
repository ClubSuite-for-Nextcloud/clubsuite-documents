<?php
namespace OCA\ClubSuiteDocuments\Listener;
use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\IEventListener;

use OCA\ClubSuiteDocuments\Events\DokumenteBasicEvent;

class DokumenteBasicEventListener implements IEventListener {
    public function handle(Event $event): void {
        if (!($event instanceof DokumenteBasicEvent)) {
            return;
        }
        error_log('DokumenteBasicEvent received in Dokumente: ' . $event->getId());
    }
}
