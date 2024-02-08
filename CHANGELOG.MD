UNRELEASED


- Abfrage Konstanten für Menüpunkte im Adminbereich geändert
- Abstände Sternchen und Checkbox Kontakt, Newsletter, Kundenkonto korrigiert
- Abstände Sternchen und Checkbox im Registrierungsformular und Nutzerkonto korrigiert
- Fehler in templates/bootstrap4/source/boxes/order_history.php behoben

1.2.17 [05.12.2023]
- Fehler in bs4_define_add_select.php behoben
- Änderung new Smarty; zu new Smarty();
- Registrierung Smarty-Plugins hinzugefügt
- config.php vervollständigt
- Check-Funktionen gem. Bug-Tracker Ticket #2422 verändert
- css_button.inc.php verändert

1.2.16 [28.11.2023]
- Update zu Shopversion 3.0.0
- Konstanten in css_button.inc.php korrigiert
- Font-Fehler in Theme "Litera" behoben

1.2.15 [28.09.2023]
- Content für Module "Billiger gesehen" und "Frage zum Artikel" - "content_group" wird jetzt dynamisch gesetzt
- Bei mehreren Produkt-Bildern konnte man im Popup (Modal) nicht blättern
- Slider, "carousel-caption" angepasst - siehe https://www.modified-shop.org/forum/index.php?topic=40190.msg399105#msg399105
- Update Bootstrap-Framework von 4.6.1 zu 4.6.2


1.2.14 [20.05.2023]
- Fehler Fullcontent in Produktlisten behoben
- PHP-Warnung, wenn Produkt Steuer-ID "0" hat in Attribute-Price-Updater behoben
- Kategorie-Listing h1- statt h3-tags für die Kategorie-Überschrift
- Fehler in der erweiterten Validation Registrierungsformular behoben und entsprechende Dateien angepasst

1.2.13 [07.03.2023]
- Verbesserung der Barrierefreiheit
- Performance-Verbesserung - Einbindung JavaScript-Dateien
- Warnung (ab PHP 8.1) in bs4_checkifnewproduct.php behoben
- CSS-Klasse Box Custom geändert


1.2.12 [05.12.2022]
- Bug "BS4 Banner Manager" bei mehreren Sprachen
- Tabs im Bootstrap 4 Template Manager waren nur sichtbar wenn "Sprachtabs bei Kategorien/Artikel" aktiviert waren
- Warnmeldung bei fehlendem Array-Schlüssel in includes/modules/product/bs4_checkifnewproduct.php behoben (danke Gulliver72)


1.2.11 [19.09.2022]
- Fehler Responsivmenü bei ausgeschaltetem Superfishmenü behoben
- javascript/extra/cookieconsent.js.php angepasst an OIL.js Consent Management v1.34
- Fehler in includes/extra/define_add_select/bs4_define_add_select.php behoben

1.2.10 [30.07.2022]
- Caching der Suchbox entfernt
- sobald Boxes in der BS4 Konfiguration abgeschaltet sind, werden die zugehörigen Datendateien nicht mehr ausgeführt
- Modalbox in offline.html ergänzt
- Warnmeldung bei falscher Produkt-ID in bs4_cheaply_see.php und bs4_product_inquiry.php behoben
- JavaScript-Fehler bei gleichzeitiger Nutzung Attribute-Preis-Updater und Lagerampel behoben
- Fehler bei automatischer Auswahl der Versandart behoben
- Konstantenfehler in lang/english/admin/bs4_tpl_manager_config.php behoben

1.2.9 [01.07.2022]
- Update zu Shopversion 2.0.7.1
- Zusatzmodul "Kundenerinnerung" modifiziert
- Fehler behoben - obwohl ausgeschaltet wurden Mini-Bilder bei Listen in der Row-Ansicht angezeigt
- Cache-ID's aktualisiert

1.2.8 [21.05.2022]
- Update zu Shopversion 2.0.7.0

1.2.7 [19.04.2022]
- Template ist nur mit Templatedateien lauffähig (eingeschränkter Funktionsumfang)
- boxes.php geändert
- Datei lang/english/extra/bs4_template.php ins Template verschoben
- Datei lang/german/extra/bs4_template.php ins Template verschoben
- genannte Sprachdateien werden in bootstrap4/config.php aufgerufen

1.2.6 [17.04.2022]
- Admin/Template: Modul CSS Produkt- & Attributlagerampel hinzugefügt - konfigurierbar im Template Manager
- Template: Picture-Tags angepasst
- Template: Update jQuery-Plugin lazysizes - v5.3.1
- Template: Lazyload für Bilder im Top-Slider ergänzt

1.2.5 [07.04.2022]
- Template: Update Bootstrap-Framework 4.6.0 zu 4.6.1
- Template: PHP8-Fehlermeldung Superfishmenü behoben
- Admin/Template: Beschriftung der Icon-/Menüleiste hinzugefügt - schaltbar im Template Manager
- Admin: Update Bootstrap-Framework 4.6.0 zu 4.6.1
- Admin: Update SCSS-Compiler
- Admin: Fehler im BS4 Banner Manager behoben - es konnten nicht alle Banner einer Kategorie deaktiviert werden
- Template: Update oil.min.js - zusätzlicher Button "NUR NOTWENDIGE"

1.2.4 [16.11.2021]

- PHP8-Fehler in Systemmodul behoben
- neu - Option Artikel-Thumbnails durch Mini- bzw. Midibildern ersetzen (schaltbar in BS4-Konfiguration Tab "Verschiedenes")
  dadurch können nach einem Update zu Shopversion 2.0.6.0 Artikelbilder wie bisher als Thumbnail angezeigt werden
  siehe hierzu den Beitrag von Karsta im Forum https://www.modified-shop.org/forum/index.php?topic=41814.msg382471#msg382471
- Darstellung der Zahlungsinformationen bei Lastschrift im Checkout korrigiert
- Pfadfehler bei Einbindung zusätzlicher Schriften über die BS4 Theme-Einstellungen behoben
- Versionsnummer in new_files/admin/includes/modules/system/bs4_tpl_manager.php aktualisiert


1.2.3 [07.10.2021]

- BS4 Theme Manager - Datei "_bootswatch.scss" wird jetzt mit in die Bereiche "eigenes Theme 1 + 2" übernommen
- Lazyload - Lazysizes - W3c Validierungsfehler bearbeitet
- Cookie Consent Link - W3c Validierungsfehler bearbeitet
- Meldung von Google Search Console 'Ungültiger Objekttyp für Feld "brand"' behoben, siehe https://www.modified-shop.org/forum/index.php?topic=42066.msg385485#msg385485

1.2.2 [18.04.2021]

- Fehlerhafte Abfragen der Funktion "strpos()" behoben
- noch vorhandene Abfragen "strstr()" in "strpos()" geändert
- Ansichtsproblem im BS4 Theme Manager behoben
- Breadcrumbs - Leerzeichen eingefügt

1.2.1 [14.04.2021]

- Sliderbilder wurden wegen Lazyload zu spät geladen
- BS4 Banner Manager an Banner Gruppen angepasst
- Fehler im Produktlisting behoben
- mehrere kleine Änderungen

1.2.0 [05.04.2021]

- Updates für Shopversion 2.0.6.0
- Cookie Consent Lösung von OSANO entfernt - es wird nur noch OIL.js unterstützt
- Template unterstützt die zusätzlichen Bildgrössen
- Implementierung Lazyload
- einige Sprachdateien geändert damit Doppeldefinitionen vermieden werden
- Fehler in automatischer Preisberechnung - Division mit 0 - behoben

1.1.3 [05.03.2021]

- Template: Update Bootstrap-Framework 4.4.1 zu 4.6.0
- Template: Update jQuery 3.5.1 zu 3.6.0
- Template: Update Easyzoom
- Admin: Update Bootstrap-Framework 4.4.1 zu 4.6.0
- Admin: Update Bootswatch Themes zu 4.6.0
- Admin: Update JS/CSS Farbauswahlfeld im Theme Manager
- Admin: Update SCSS-Compiler
- Wegfallende Funktionen PHP 8 aktualisiert
- Leere Unterkategorien wurden in Produktlisten angezeigt

1.1.2 [03.02.2021]

- Slider Top-Artikel und Bestseller können mehrzeilig angezeigt werden.
- Fehler in automatischer Preisberechnung behoben

1.1.1 [19.01.2021]

- jquery.cookieconsent-oil.css angepasst
- SCSSPHP-Compiler Update und damit verbundene Änderungen am Theme Manager
- Javascriptdateien bs4.js und bs4.min.js vorbereitet für das Modul "YouTube- & Vimeo-Videos auf der Produktdetailseite (MMLC-Version) by awids 1.0.0"
- Fehler in automatischer Preisberechnung für Attribute(VPE-Preis) behoben
- PHP-Notizen und PHP-Warnungen bearbeitet

1.1.0 [29.11.2020]

- neu - Banner Manager für Bootstrap Slider - Banner können Kategorien zugewiesen werden.
  Jede Kategorie kann eigene Slidereinstellungen erhalten.
- neu - Kategorielisting (Hauptkategorien) auf Startseite (schaltbar in BS4-Konfiguration Tab "Ansichten").

1.0.0 [14.11.2020]

- Übertragung der Dateien zu Github
- Benutzerdefinierte Zusatzbox in linke Spalte eingefügt
- Vorbereitung für das MODUL: OIL.js Cookie Consent Management

28.10.2020

- Templatedatei /module/popup_reviews.html fehlte im Paket
- Fehler in /source/boxes.php behoben (Danke an web-looks)

30.09.2020

- Update des jQuery-Javascript-Framework im Template
- kleinere Fehler behoben


08.08.2020

- Es wurde eine Einstellmöglichkeit für die Zeilenanzahl der Artikelnnamen in den Slidern dem Template Manager hinzugefügt.
  Das Problem mit den springenden TOP-Artikel und Bestseller Slidern bei unterschiedlich langen Artikelnamen kann damit behoben werden.
  Der Lösungsvorschlag kam von Hanspeter Zeller und ist im Forum nachzulesen unter https://www.modified-shop.org/forum/index.php?topic=40190.msg376029#msg376029
- Ein Fehler bei Ansicht der Produktlisten in voller Breite (Fullcontent) wurde behoben.

03.05.2020

- Neues Modul für Rezensionen hinzugefügt
  Das Modul basiert auf dem Modul Rezensionsaufgliederung nach vergebenen Sternen von Awids hier das Original https://www.modified-shop.org/forum/index.php?topic=40793.0
- Einstellmöglichkeit das Suchfeld dauerhaft anzuzeigen wurde hinzugefügt

23.04.2020

- Template aktualisiert für Shopversion 2.5.1

13.04.2020

- Fehler bei der Installation des Klassenerweiterungsmodules "bs4_checkifnewproduct.php" behoben - Dank an Hanspeter Zeller
- Beim AJAX Menü wurden die Unterkategorien nicht in der korrekten Sprache geladen - Dank an web-looks
- Auf den Herstellerseiten wurden die Produktlisten nicht über die volle Breite angezeigt - Dank an web-looks
- Captcha kann jetzt auch bei angemeldeten Kunden angezeigt werden
- Captchaaufruf wurde an die aktuelle Shopversion angepasst - Dank an noRiddle

03.02.2020

- PayPal Cookie-Aktualisierung gem. https://www.modified-shop.org/forum/index.php?topic=40480.msg370479#msg370479
- Anredefeld im Modul "Frage zum Artikel" und "Billiger gesehen" korrigiert
- Eingabefeld "Telefon" in Modul "Frage zum Artikel" aufgenommen
- PayPal-Button wird jetzt korrekt eingebunden
- kleinere Fehler behoben

07.01.2020

- Fehler bei PayPal-Button in Produkt-Info-Ansicht behoben
- PayPal-Button auf CSS-Button umgestellt
- Suchfeld wird jetzt ein- oder zweireihig (Suchkategorien werden dadurch nicht abgeschnitten) dargestellt (einstellbar im Template Manager)

01.01.2020

- Anzeigeproblem bei längeren Namen von Unterkategorien behoben
- bei eingeschalteter JS-Komprimierung ging die erweiterte Validierung im Registrierungsformular nicht mehr
- bei eingeschalteter JS-Komprimierung wurden Leerzeichen bei der Artikelbildanzeige zwischen "Bild 1 von 4" gelöscht
- bei eingeschalteter HTML-Komprimierung wurden Leerzeichen zwischen Checkboxen und Beschriftung gelöscht

18.12.2019

- JQuery Update 3.4.1
- Bootstrap-Framework Update 4.4.1
- Update Shopversion 2.0.5.0 (zahlreiche Änderungen in den Templatedateien)
- Umfangreiche Änderungen des Theme-Managers im Adminbereich, da Modified-Team Dateiberechtigungen im Ordner admin/includes verändert hat
- Pfad zum FSK18 Bild aktualisiert

13.11.2019

- Die Logoleiste (Symbole Home, User, Merkzettel und Warenkorb) lassen sich auf schmalen Bildschirme oben innerhalb der Menüleiste fixieren.
- Das Template, der Template Manager, alle Datenbankeinträge und alle zugehörigen Dateien können auf Knopfdruck entfernt werden,
  dazu wurde ein Button im Systemmodul hinzugefügt
- Die Boxen "Bestellübersicht" und "Trusted Shops" lassen sich jetzt auch im Template Manager ein-/ausschalten
- Im Template Manager ist bei den Boxen ein neuer Schalter "Alle Boxen" hinzugekommen, dadurch können alle Boxen der linken Spalte ausgeschaltet werden.
- Verbesserung der Barrierefreiheit

29.10.2019

- Ansichtenfehler beim Produktlisting auf Mac und iOS behoben
- Aufruf easyzoom aus bs4.js in general_bottom.js.php verlegt, jetzt ist der Aufruf abhängig von der Aktivierung im Template Manager
- Modul "AGI: Anzahl im Warenkorb reduzieren" in Template Manager aufgenommen
- einige kleiner Änderungen

22.10.2019

- Menüleiste für schmale Bildschirme lässt sich inklusive Logo oben fixieren
- Menüleiste für schmale Bildschirme jetzt auch bei $fullcontent sichtbar
- Responsive-Menü abschaltbar
- Standard-Menü neue Einstellmöglichkeiten
- Systemmodul hat jetzt eine Updatefunktion