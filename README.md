# ClubSuite Documents

[![Nextcloud Version](https://img.shields.io/badge/Nextcloud-28--32-blue.svg)](https://nextcloud.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.1--8.3-purple.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-AGPL%20v3-green.svg)](LICENSE)

> 📄 Dokumenten-Workflows und Vorlagenverwaltung für Vereine.

## 📋 Übersicht

ClubSuite Documents automatisiert Ihre Vereinskorrespondenz:

- **Vorlagen**: Word/ODT-Vorlagen mit Platzhaltern
- **Merge**: Automatische Befüllung aus Mitgliederdaten
- **Workflows**: Freigabeprozesse für Dokumente
- **Serienbrief**: Massenerstellung von Schreiben
- **Archiv**: Automatische Ablage erstellter Dokumente

## 🚀 Installation

### Über den Nextcloud App Store
1. **ClubSuite Core** muss installiert sein
2. Apps → Organisation → "ClubSuite Documents" suchen
3. Installieren und aktivieren

### Manuelle Installation
```bash
cd /path/to/nextcloud/apps
git clone https://github.com/clubsuite/clubsuite-documents.git
php occ app:enable clubsuite-documents
```

## 📦 Anforderungen

| Komponente | Version |
|------------|--------|
| Nextcloud | 28 - 32 |
| PHP | 8.1 - 8.3 |
| **clubsuite-core** | erforderlich |

## 🔒 DSGVO / Datenschutz

- Dokumente mit Personenbezug geschützt
- Datenexport über Nextcloud Privacy API
- Aufbewahrungsfristen konfigurierbar

## 📄 Lizenz

AGPL v3 – Siehe [LICENSE](LICENSE)

## 🐛 Bugs & Feature Requests

[GitHub Issues](https://github.com/clubsuite/clubsuite-documents/issues)

---

© 2026 Stefan Schulz
