# Bootstrap4 für Modified Shop 2.x - freies responsive Template

Das Template basiert auf dem Bootstrap-Framework 4 und wird getestet mit der, zum Zeitpunkt des Erscheinens eines neuen Releases, aktuellen Shopversion.

<img src="../images/screenshot_1.png" style="margin:20px 0;" alt="screenshot">

## Eigenschaften:
- responsive Template für PC, Tablet, Smartphone
- unterstützt alle Neuerungen der Shopversion 2.0 (z.B. Komprimierung, Filter)
- zentrales Dropdownmenü für alle Artikel
- bestimmte Kategorien können als Megamenü dargestellt werden
- EU-Cookie-Hinweis
- Bilderslider auf der Startseite, im Banner-Manager befüllbar
- Easyzoom-Vergrößerung in der Produktdetailansicht
- Top-Artikel und Bestseller als Slider anzeigbar
- Farbbänder/Ribbons Top, Neu, Angebot
- Font Awesome Icons integriert
- keine Core-Änderungen nötig

## Systemmodul "Bootstrap 4 Template Manager"

Sobald das Systemmodul installiert ist stehen unter dem Menüpunkt **Erw. Konfiguration - Bootstrap 4 Template Manager** zahlreiche Einstellmöglichkeiten zur Verfügung.

Im Paket enthalten sind die **Module**
	- Kundenerinnerung für vorübergehend nichtverfügbare Artikel
	- Billiger gesehen?
	- Frage zum Artikel?
	- Automatische Preisberechnung bei Attributen
	- AGI: Anzahl im Warenkorb reduzieren
	- Awids Rating Breakdown - Rezensionsaufgliederung nach vergebenen Sternen

*Diese Module sind im Template Manager zuschaltbar.*

Im Template Manager können auch Theme-Einstellungen vorgenommen werden.<br />
So kann aus 22 Templatevorlagen gewählt, oder 2 eigene Themes erstellt werden.<br />
Auf Knopfdruck wird die erstellte Vorlage mit Hilfe eines SASS-Compilers konvertiert, in den Shop übernommen und aktiviert.<br />
Auch die Möglichkeit zusätzliche Schriftarten DSGVO-konform zu integrieren besteht.

## Installation

- Vor jeder Änderung sollte ein Backup gemacht werden!
- Die Dateien aus dem Ordner **new_files/** in den Shop kopieren (evtl. muss der Name des Admin-Ordners vorher angepasst werden).
- Im Adminbereich **Konfiguration->Mein Shop** das Template auswählen.
- Zur Nutzung des Template Managers im Adminbereich **Module->System Module** den *Bootstrap 4 Template Manager* installieren.

## Update Template Manger

Voraussetzung: Dateien sind aktuell - System Modul "Bootstrap 4 Template-Manager" installiert.

- Zur Nutzung neuer Funktionen des Template Managers muss im Adminbereich **Module->System Module** der **Bootstrap 4 Template-Manager** ausgewählt werden.
- Anschließend den Button **Update** klicken und Update ausführen.

*Hinweis: Die bisher gemachten Einstellungen werden nicht überschrieben, es werden nur neue Funktionen mit den Standardwerten hinzugefügt.*

## Bilderslider

Damit man sehen kann wie man den Banner Manager befüllen kann, habe ich ein Modul erstellt.
Diese Modul kann <a href="https://github.com/KarlBogen/sliderbeispiele_bs4" target="_blank" title="KarlBogen/sliderbeispiele_bs4">hier bei Github</a> heruntergeladen werden.

- Die Dateien aus dem Ordner in den Shop kopieren (evtl. muss der Name des Admin-Ordners vorher angepasst werden).
- Anschließend im Adminbereich unter **Module->System Module** das Modul **SLIDER-Beispiele für Template Bootstrap4** installieren.<br />
Dadurch wird der Banner Manger mit Musterdaten (deutsch und englisch) für den Slider befüllt.

*Die Installationsdatei admin/includes/modules/system/aa_slider_installer_system.php löscht sich normalerweise automatisch.*

## Umbenennen des Templates

- Den Ordner "bootstrap4" einfach ändern.
- Im Adminbereich **Konfiguration->Mein Shop** das Template auswählen.

*Im Template Manager gemachte Einstellungen bleiben unverändert, für die Übernahme von Themeinstellungen muss auch dort der neue Name eingestellt werden.*

## Theme-Einstellungen (Kurzanleitung)

- Pfad zum BS4 Template wählen
- Pfad zum BS4 Theme wählen z.B. "eigenes Theme 1" - "Aktualisieren" drücken
- Tab "eigenes Theme 1" - Vorlage wählen und Button "Vorlage laden" klicken => Vorschau wird geladen
- Änderungen machen und "Aktualisieren"
- Zurück zu Tab "Allgemeines" und "Fertig- Theme ins Template übernehmen" klicken
- Caches löschen und Shop Frontend aktualisieren

<br /><br />

### Sollten Sie mit einem Problem nicht weiter kommen, finden sich bestimmt Helfer im Modified-Forum

### [Thema: TEMPLATE: Bootstrap4 für Shop 2.x - freies responsive Template](https://www.modified-shop.org/forum/index.php?topic=40190.0)

<br /><br />

Viel Spaß!<br />
Karl
