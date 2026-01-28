<?php
declare(strict_types=1);

namespace OCA\ClubSuiteDocuments\AppInfo;

use OCA\ClubSuiteDocuments\Privacy\Register;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\IContainer;
use OCA\ClubSuiteDocuments\Service\CacheService;
use OCA\ClubSuiteDocuments\Service\EventService;
use OCA\ClubSuiteDocuments\Listener\DokumenteBasicEventListener;
use OCA\ClubSuiteDocuments\Listener\DokumenteCallbackEventListener;
use OCA\ClubSuiteDocuments\Listener\DokumenteRequestDataEventListener;
use OCA\ClubSuiteDocuments\Events\DokumenteBasicEvent;
use OCA\ClubSuiteDocuments\Events\DokumenteCallbackEvent;
use OCA\ClubSuiteDocuments\Events\DokumenteRequestDataEvent;

if (!\class_exists('OCA\ClubSuiteDocuments\AppInfo\Application', false)) {
class Application extends App implements IBootstrap {
    public const APP_ID = 'clubsuite-documents';

    public function __construct(array $urlParams = []) {
        parent::__construct(self::APP_ID, $urlParams);
        $container = $this->getContainer();
        $container->registerService('CacheService', function(IContainer $c){ return new CacheService($c->query('ICache')); });
        $container->registerService('EventService', function(IContainer $c){ return new EventService(\OC::$server->getEventDispatcher()); });
    }

    public function register(IRegistrationContext $context): void {
        $context->registerEventListener(DokumenteBasicEvent::class, DokumenteBasicEventListener::class);
        $context->registerEventListener(DokumenteCallbackEvent::class, DokumenteCallbackEventListener::class);
        $context->registerEventListener(DokumenteRequestDataEvent::class, DokumenteRequestDataEventListener::class);
    }

    public function boot(IBootContext $context): void {
        $context->injectFn(function(\OCP\IContainer $c) {
            if (\interface_exists('\OCP\Privacy\IManager')) {
                $c->get(\OCP\Privacy\IManager::class)->registerProvider(Register::class);
            }
        });
    }
}

}
