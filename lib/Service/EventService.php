<?php
namespace OCA\ClubSuiteDocuments\Service;

use OCP\EventDispatcher\IEventDispatcher;
use OCA\ClubSuiteDocuments\Events\DokumenteBasicEvent;
use OCA\ClubSuiteDocuments\Events\DokumenteCallbackEvent;
use OCA\ClubSuiteDocuments\Events\DokumenteRequestDataEvent;

class EventService {
    private IEventDispatcher $dispatcher;

    public function __construct(IEventDispatcher $dispatcher) {
        $this->dispatcher = $dispatcher;
    }

    public function dispatchBasicEvent(array $payload): void {
        $event = new DokumenteBasicEvent(uniqid('doc_', true), time(), $payload);
        $this->dispatcher->dispatch($event);
    }

    public function dispatchCallbackEvent(array $payload, callable $callback): void {
        $event = new DokumenteCallbackEvent(uniqid('doc_cb_', true), time(), $payload, $callback);
        $this->dispatcher->dispatch($event);
    }

    public function dispatchRequestDataEvent(callable $callback): void {
        $event = new DokumenteRequestDataEvent(uniqid('doc_req_', true), time(), [], $callback);
        $this->dispatcher->dispatch($event);
    }
}
