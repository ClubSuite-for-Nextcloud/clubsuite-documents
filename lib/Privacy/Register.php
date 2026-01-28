<?php

declare(strict_types=1);

namespace OCA\ClubSuiteDocuments\Privacy;

use OCP\Privacy\IPersonalDataProvider;
use OCP\IL10N;

class Register implements IPersonalDataProvider {

    public function __construct(
        private IL10N $l10n
    ) {}

    public function getName(): string {
        return $this->l10n->t('ClubSuite Dokumente');
    }

    public function userExport(string $userId): array {
        // TODO: Implement specific data export for ClubSuite Dokumente
        return [];
    }

    public function userDeleted(string $userId): void {
        // TODO: Implement specific data cleanup for ClubSuite Dokumente
    }
}
