<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

$lang_array = array(
	'TEXT_BS4_TPL_MANAGER_CONFIG_UPDATE_SYSTEMMODULE_WARNING' => 'Neue Einstellungen sind hinzugekommen - vor den Nutzung muss ein Update des Systemmodules gemacht werden.<br />
		Der Link bringt Sie zum Systemmodul &nbsp;&nbsp;&nbsp;',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HEADING_TITLE' => 'Bootstrap 4 Template Konfiguration',
	'TEXT_BS4_TPL_MANAGER_CONFIG_INFO' => 'Hier gemachte Einstellungen haben direkte Auswirkung auf den Shop!',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_HEADER' => 'Header-Bereich',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1' => 'Top1:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_INFO' => 'Soll die Topleiste mit Top1 angezeigt werden?<br /><br />
		<strong>Hinweis:</strong><br />In der Topleiste k&ouml;nnen vier Spalteneintr&auml;ge angezeigt werden.<br />
		Damit diese Spalten auch mehrsprachig genutzt werden k&ouml;nnen, sind die Texte in eine Sprachdatei ausgelagert.<br />
		Die Texte k&ouml;nnen in der Datei "templates/bootstrap4/lang/lang_german.custom" ge&auml;ndert werden (Englisch -> "lang_english.custom").<br />
		Sprachvariable "BS4_top1" in "templates/bootstrap4/lang/lang_german.custom".',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2' => 'Top2:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_INFO' => 'Soll Top2 angezeigt werden?<br /><br />
		Sprachvariable "BS4_top2" in "templates/bootstrap4/lang/lang_german.custom".',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP3' => 'Top3:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP3_INFO' => 'Soll Top3 angezeigt werden?<br /><br />
		Sprachvariable "BS4_top3" in "templates/bootstrap4/lang/lang_german.custom".',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP4' => 'Top4:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP4_INFO' => 'Soll Top4 angezeigt werden?<br /><br />
		Sprachvariable "BS4_top4" in "templates/bootstrap4/lang/lang_german.custom".',
	'TEXT_BS4_TPL_MANAGER_CONFIG_EU_COOKIE_PLACE1' => 'oben zentriert klein',
	'TEXT_BS4_TPL_MANAGER_CONFIG_EU_COOKIE_PLACE2' => 'oben links klein',
	'TEXT_BS4_TPL_MANAGER_CONFIG_EU_COOKIE_PLACE3' => 'oben rechts klein',
	'TEXT_BS4_TPL_MANAGER_CONFIG_EU_COOKIE_PLACE4' => 'oben volle Breite',
	'TEXT_BS4_TPL_MANAGER_CONFIG_EU_COOKIE_PLACE5' => 'unten links klein',
	'TEXT_BS4_TPL_MANAGER_CONFIG_EU_COOKIE_PLACE6' => 'unten rechts klein',
	'TEXT_BS4_TPL_MANAGER_CONFIG_EU_COOKIE_PLACE7' => 'unten volle Breite',
	'TEXT_BS4_TPL_MANAGER_CONFIG_EU_COOKIE_PLACE' => 'Eu-Cookie:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_EU_COOKIE_PLACE_INFO' => '<strong>Wo</strong> soll der EU-COOKIE Hinweis angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_EU_COOKIE_CONTENT' => 'Eu-Cookie:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_EU_COOKIE_CONTENT_INFO' => 'W&auml;hlen Sie eine Contentseite. Im EU-COOKIE Hinweis wird auf diese Seite verlinkt.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SHOW_JS_DISABLED' => 'JavaScript-Hinweis:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SHOW_JS_DISABLED_INFO' => 'Soll der JavaScript-Hinweis angezeigt werden?<br /><br />
		<strong>Hinweis:</strong><br />
		Der Text ist nur sichtbar, wenn der Kunde im Browser JavaScript deaktiviert hat.<br /><br />
		Sprachvariable "BS4_noscript" in "templates/bootstrap4/lang/lang_german.custom".',
	'TEXT_BS4_TPL_MANAGER_CONFIG_LOGO' => 'Logopfad:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_LOGO_INFO' => 'Relativer Pfad zum Shoplogo.<br /><br />
		<strong>Hinweis:</strong><br />
		Logopfad relativ zum Ordner "shoproot/templates/bootstrap4/" - z.B. shoproot/templates/bootstrap4/img/logo_head.png -> "img/logo_head.png"',
	'TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SEARCHFIELD_PERMANENT' => 'Suchfeld:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SEARCHFIELD_PERMANENT_INFO' => 'Soll das Suchfeld dauerhaft angezeigt werden?<br /><br />
		<strong>Hinweis:</strong><br />
		Das Eingabefeld wird dann oberhalb der Icon-Leiste angezeigt.',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_SUPERFISH' => 'Men&uuml;s',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MENUBAR_SMALLSCREEN' => 'Men&uuml;leiste schmale Bildschirme',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MENUBAR_FIXEDTOP' => 'Men&uuml;leiste oben:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MENUBAR_FIXEDTOP_INFO' => 'Soll die Men&uuml;leiste oben fixiert angezeigt werden?<br />
		Die Men&uuml;leiste scrollt dadurch nicht mehr mit. Das Logo wird in die Men&uuml;leiste verschoben.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FIXEDTOP_CLASSES' => 'CSS-Klassen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FIXEDTOP_CLASSES_INFO' => 'CSS-Klassen bei fixierter Men&uuml;leiste!<br />
		Wird die Men&uuml;leiste bei schmalen Bildschirmen fixiert, werden die normalen Bootstrap-CSS-Klassen entfernt und durch die hier eingegebenen ersetzt.<br />
		Dadurch ist es möglich, der Men&uuml;leiste ein anderes Aussehen zu geben.<br />
		Standard: "navbar-light bg-light border-bottom p-0"',
	'TEXT_BS4_TPL_MANAGER_CONFIG_LOGOBAR_FIXEDTOP' => 'Logoleiste oben:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_LOGOBAR_FIXEDTOP_INFO' => 'Soll die Logoleiste in die fixierte Men&uuml;leiste verschoben werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_RESPONSIVEMENU' => 'Responsive-Men&uuml;',
	'TEXT_BS4_TPL_MANAGER_CONFIG_RESPONSIVE' => 'Men&uuml; anzeigen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_RESPONSIVE_INFO' => 'Soll das Responsive-Men&uuml; angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISHMENU' => 'Superfish-Men&uuml;',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH' => 'Men&uuml; anzeigen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_INFO' => 'Soll das Superfish-Men&uuml; angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOUCH_USE' => 'Touch-Men&uuml;:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOUCH_USE_INFO' => 'Superfishmen&uuml; f&uuml;r Touchscreens nutzbar machen?<br /><br />
		<strong>Hinweis:</strong><br />
		Bei "Ja" wird ein zus&auml;tzliches JavaScript geladen, dass die Bedienung des Men&uuml;s auch ohne PC-Maus erm&ouml;glicht.<br />
		Smartphones und Tablets ben&ouml;tigen dieses Script nicht, nur gro&szlig;e Touchscreenmonitore!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL' => 'Anzeige bis Level:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_INFO' => 'Bis zu welchem Level soll das Superfish-Men&uuml; angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_ALL' => 'alle Level angezeigen',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_1' => 'nur Level 1 wird angezeigt',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_2' => 'nur bis Level 2 angezeigen',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_3' => 'nur bis Level 3 angezeigen',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_4' => 'nur bis Level 4 angezeigen',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_5' => 'nur bis Level 5 angezeigen',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_6' => 'nur bis Level 6 angezeigen',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCTSINCAT' => 'Anzahl Produkte:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCTSINCAT_INFO' => 'Soll die Anzahl der Produkte der Kategorie im Men&uuml; angezeigt werden?<br /><br />
		<strong>Hinweis:</strong><br />
		Einstellung gilt auch f&uuml;r das Responsive-Men&uuml;!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HOMEBUTTON' => 'Startseite-Icon:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HOMEBUTTON_INFO' => 'Soll das Startseite-Icon angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ADD_LINK' => 'Zus&auml;tzliche Links:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ADD_LINK_INFO' => 'Es k&ouml;nnen zus&auml;tzliche Links f&uuml;r das Men&uuml; erfasst werden!<br /><br />
		<strong>Syntax:</strong><br />
		Linkziel1|Linkname1,Linkziel2|Linkname2,Linkziel3|Linkna...<br /><br />
		<strong>Beispiel:</strong><br />
		Die Eingabe "https://www.mein_shop.com/shop_content.php?coID=3|Service,https://www.modified-shop.org|Modified" erzeugt zwei Links,<br />
		Link 1 mit dem Namen "Service" und dem Ziel "https://www.mein_shop.com/shop_content.php?coID=3"<br />
		Link 2 mit dem Namen "Modified" und dem Ziel "https://www.modified-shop.org"<br /><br />
		F&uuml;r Mehrsprachigkeit wird z.B. "https://www.example.com|BS4_Linktext" eingetragen - wichtig ist das "BS4_" am Beginn!<br />
		Zus&auml;tzlich muss in der Datei "templates/bootstrap4/lang/lang_german.custom" eine Sprachvariable angelegt werden - "BS4_Linktext = \'Mein Link\'"',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MEGAS' => 'Mega-Men&uuml;:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MEGAS_INFO' => 'Hier kann das Men&uuml; als Mega-Men&uuml; konfiguriert werden.<br /><br />
		<strong>Das Superfish-Men&uuml; kann als normales Dropdown- aber auch als Mega-Men&uuml; dargestellt werden!<br />
		F&uuml;r die Darstellung als normales Dropdown-Men&uuml; dieses Feld leer lassen!</strong><br /><br />
		<strong>Beispiele:</strong><br />
		Alle Kategorien sollen als Mega-Men&uuml; mit 3 Spalten dargestellt werden.<br />
		Eingabe: "main-3"<br />
		Eingetragen wird die ID der Navbar "main", dahinter die Anzahl der Spalten.<br /><br />
		Alle Kategorien sollen als Mega-Men&uuml; mit 3 Spalten dargestellt werden, ab dem 5. Link der untersten Kategorieebene soll ein Link "mehr anzeigen ..." eingef&uuml;gt werden.<br />
		Eingabe: "main-3-5"<br />
		Eingetragen wird die ID der Navbar "main", dahinter die Anzahl der Spalten und die Stelle (5) an der der Link eingef&uuml;gt werden soll.<br /><br />
		Es sollen die Kategorien mit der ID 5 (3-spaltig) und ID 22 (4-spaltig) als Mega-Men&uuml; dargestellt werden.<br />
		Eingabe: "li5-3,li22-4"<br />
		Eingetragen werden die ID\'s der Kategorielinks "li5" und "li22" - die Schreibweise ist hier wichtig - dahinter die Anzahl der Spalten.<br /><br />
		Es sollen die Kategorien mit der ID 5 (3-spaltig) und ID 22 (4-spaltig) als Mega-Men&uuml; dargestellt werden, ab dem 4. bzw. 5. Link der untersten Kategorieebene soll ein Link "mehr anzeigen ..." eingef&uuml;gt werden.<br />
		Eingabe: "li5-3-4,li22-4-5"<br />
		Eingetragen werden die ID\'s der Kategorielinks "li5" und "li22" - die Schreibweise ist hier wichtig - dahinter die Anzahl der Spalten und die Stelle (4, 5) an der der Link eingef&uuml;gt werden soll.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU' => 'Modified Standard Men&uuml;',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL' => 'Anzeige bis Level:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL_INFO' => 'Bis zu welchem Level soll das Standard-Men&uuml; angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX' => 'Unterkategorien per Ajax nachladen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_INFO' => 'Sollen Unterkategorien per Ajax nachgeladen werden?<br />
		Dazu wird ein zus&auml;tzlicher "+"-Button eingeblendet - bei Klick wird der n&auml;chte Level eingeblendet.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_SCROLL' => 'Scrollen bei Unterkategorie-Klick:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_SCROLL_INFO' => 'Soll nach dem Klick auf den Unterkategorie-Button die geklickte Kategorie nach oben gescrollt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_POSITION_LEFT' => 'Position bei schmalen Bildschirmen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_POSITION_LEFT_INFO' => 'Soll das Men&uuml; auf schmalen Bildschirmen links angezeigt werden?<br /><br />
		<strong>Hinweis:</strong><br />
		Diese Einstellung wirkt sich nur aus, wenn das Responsive-Men&uuml; ausgeschaltet ist!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NONE' => 'keine',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ALL_MENUS' => 'Gilt f&uuml;r alle Men&uuml;s',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SPECIALS' => 'Link Angebote:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SPECIALS_INFO' => 'Soll der Link "Angebote" im Men&uuml; angezeigt werden?<br /><br />
		<strong>Hinweis:</strong><br />
		Diese und die folgenden beiden Einstellungen gelten auch f&uuml;r das Modified-Standard-Men&uuml;!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW' => 'Link Neue Artikel:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW_INFO' => 'Soll der Link "Neue Artikel" im Men&uuml; angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE' => 'Gro&szlig;schreibung:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE_INFO' => 'Sollen die Links "Angebote" und "Neue Artikel" gro&szlig; geschrieben werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES' => 'Leere Kategorien ausblenden:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES_INFO' => 'Sollen leere Kategorien ausblendet werden?<br /><br />
		<strong>Hinweis:</strong><br />
        Bei "Ja" wird sich die Seitenaufbauzeit verlangsamen, denn bei jedem Shopaufruf wird gepr&uuml;ft wieviele Produkte in den einzelnen Kategorien und deren Unterkategorien stecken.<br /><br />
		Ausgeblendet werden die Kategorien wenn kein aktiver Artikel in der Kategorie selbst oder einer ihrer Unterkategorien enthalten ist.<br />
		Aus diesem Grund sollte im Adminbereich Konfiguration -> Lagerverwaltungs Optionen -> Bestellabschluß - Ausverkaufte Artikel deaktivieren auf "Ja" gestellt werden.',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_SLIDER' => 'Slider',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW' => 'Bilderslider:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_INFO' => 'Wo und wie breit soll der Slider angezeigt werden?<br /><br />
		<strong>Hinweis:</strong><br />
		Dieser Slider zeigt Bilder, die im "Banner Manager" der Banner-Gruppe "SLIDER" zugeordnet werden!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_NONE' => 'nicht anzeigen',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SCREEN' => 'gesamte Bildschirmbreite',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SHOP' => 'Contentbreite',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_COLUMN' => 'rechte Spalte',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_FADE' => 'Bilderslider:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_FADE_INFO' => 'Welcher Effekt soll genutzt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP' => 'Topartikel:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_INFO' => 'Sollen die Topartikel als Slider angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_FADE' => 'Topartikel:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_FADE_INFO' => 'Welcher Effekt soll genutzt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_NAME_LINES' => 'Topartikel:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_NAME_LINES_INFO' => 'Anzahl der Zeilen, die der Artikelname belegen soll (0 = auto).',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS' => 'Bestseller:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_INFO' => 'Sollen die Bestseller als Slider angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_FADE' => 'Bestseller:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_FADE_INFO' => 'Welcher Effekt soll genutzt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_NAME_LINES' => 'Bestseller:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_NAME_LINES_INFO' => 'Anzahl der Zeilen, die der Artikelname belegen soll (0 = auto).',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_BOXES' => 'Boxen',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOXES' => 'Boxen auf der Startseite',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CATEGORIES' => 'Box Kategoriemen&uuml;:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CATEGORIES_INFO' => 'Soll in der linken Spalte die Box Kategoriemen&uuml; auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_ADD_QUICKIE' => 'Box Schnellkauf:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_ADD_QUICKIE_INFO' => 'Soll in der linken Spalte die Box Schnellkauf auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LOGIN' => 'Box Login:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LOGIN_INFO' => 'Soll in der linken Spalte die Box Login auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW' => 'Box Neue Artikel:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW_INFO' => 'Soll in der linken Spalte die Box Neue Artikel auf der Startseite angezeigt werden?<br />
		<strong>Hinweis:</strong><br />
		Wird nur angezeigt, wenn im Men&uuml; der Link Neue Artikel nicht angezeigt wird!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS' => 'Box Angebote:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS_INFO' => 'Soll in der linken Spalte die Box Angebote auf der Startseite angezeigt werden?<br />
		<strong>Hinweis:</strong><br />
		Wird nur angezeigt, wenn im Men&uuml; der Link Angebote nicht angezeigt wird!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LAST_VIEWED' => 'Box Zuletzt angesehen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LAST_VIEWED_INFO' => 'Soll in der linken Spalte die Box Zuletzt angesehen auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS' => 'Box Rezensionen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS_INFO' => 'Soll in der linken Spalte die Box Rezensionen auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CUSTOM' => 'Box Benutzerdefiniert (Zusatzbox):',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CUSTOM_INFO' => 'Soll in der linken Spalte die Box Benutzerdefiniert (Zusatzbox) auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS' => 'Box Hersteller:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS_INFO' => 'Soll in der linken Spalte die Box Hersteller auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS_INFOS' => 'Box Hersteller Information:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS_INFO_INFO' => 'Soll in der linken Spalte die Box Hersteller Information auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CURRENCIES' => 'Box W&auml;hrungen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CURRENCIES_INFO' => 'Soll in der linken Spalte die Box W&auml;hrungen auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_INFOBOX' => 'Box Info Kundengruppe:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_INFOBOX_INFO' => 'Soll in der linken Spalte die Box Info Kundengruppe auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_HISTORY' => 'Box Bestell&uuml;bersicht:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_HISTORY_INFO' => 'Soll in der linken Spalte die Box Bestell&uuml;bersicht auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_TRUSTEDSHOPS' => 'Box Trusted Shops:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_TRUSTEDSHOPS_INFO' => 'Soll in der linken Spalte die Box Trusted Shops auf der Startseite angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOXES' => 'Boxen auf anderen Seiten (nicht auf der Startseite)',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CATEGORIES' => 'Box Kategoriemen&uuml;:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CATEGORIES_INFO' => 'Soll in der linken Spalte die Box Kategoriemen&uuml; auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_ADD_QUICKIE' => 'Box Schnellkauf:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_ADD_QUICKIE_INFO' => 'Soll in der linken Spalte die Box Schnellkauf auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LOGIN' => 'Box Login:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LOGIN_INFO' => 'Soll in der linken Spalte die Box Login auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_WHATSNEW' => 'Box Neue Artikel:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_WHATSNEW_INFO' => 'Soll in der linken Spalte die Box Neue Artikel auf anderen Seiten (nicht Startseite) angezeigt werden?<br />
		<strong>Hinweis:</strong><br />
		Wird nur angezeigt, wenn im Men&uuml; der Link Neue Artikel nicht angezeigt wird!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SPECIALS' => 'Box Angebote:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SPECIALS_INFO' => 'Soll in der linken Spalte die Box Angebote auf anderen Seiten (nicht Startseite) angezeigt werden?<br />
		<strong>Hinweis:</strong><br />
		Wird nur angezeigt, wenn im Men&uuml; der Link Angebote nicht angezeigt wird!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED' => 'Box Zuletzt angesehen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED_INFO' => 'Soll in der linken Spalte die Box Zuletzt angesehen auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_REVIEWS' => 'Box Rezensionen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_REVIEWS_INFO' => 'Soll in der linken Spalte die Box Rezensionen auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CUSTOM' => 'Box Benutzerdefiniert (Zusatzbox):',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CUSTOM_INFO' => 'Soll in der linken Spalte die Box Benutzerdefiniert (Zusatzbox) auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS' => 'Box Hersteller:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO' => 'Soll in der linken Spalte die Box Hersteller auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS_INFOS' => 'Box Hersteller Information:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO_INFO' => 'Soll in der linken Spalte die Box Hersteller Information auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CURRENCIES' => 'Box W&auml;hrungen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CURRENCIES_INFO' => 'Soll in der linken Spalte die Box W&auml;hrungen auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_INFOBOX' => 'Box Info Kundengruppe:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_INFOBOX_INFO' => 'Soll in der linken Spalte die Box Info Kundengruppe auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_HISTORY' => 'Box Bestell&uuml;bersicht:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_HISTORY_INFO' => 'Soll in der linken Spalte die Box Bestell&uuml;bersicht auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_TRUSTEDSHOPS' => 'Box Trusted Shops:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_TRUSTEDSHOPS_INFO' => 'Soll in der linken Spalte die Box Trusted Shops auf anderen Seiten (nicht Startseite) angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ALL_BOXES' => 'Alle Boxen',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_ALL_BOXES' => 'Alle Boxen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_ALL_BOXES_INFO' => 'Sollen alle Boxen auf allen Seiten <span class="colorRed"><strong>ausgeblendet</strong></span> werden?<br /><span class="colorRed">Vor der Deaktivierung der Boxen bitte das Superfish-Men&uuml; aktivieren!</span>',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_VIEWS' => 'Ansichten',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_FULLCONTENT' => 'Startseite:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_FULLCONTENT_INFO' => 'Soll die Startseite "fullcontent", d.h. ohne die linke Spalte, angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PROD_LIST_FULLCONTENT' => 'Produktlisten:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PROD_LIST_FULLCONTENT_INFO' => 'Sollen die Produktlisten "fullcontent", d.h. ohne die linke Spalte, angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT' => 'Produktdetailseite:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT_INFO' => 'Sollen die Produktdetailseiten "fullcontent", d.h. ohne die linke Spalte, angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE' => 'Produktdetailseite:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE_INFO' => 'Soll auf der Produktdetailseite das Herstellerbild angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_STARTPAGE' => 'Artikeldarstellung:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_STARTPAGE_INFO' => 'Sollen "Unsere TOP-Artikel" auf der Startseite als Boxen angezeigt werden?<br /><br />
		<strong>Hinweis:</strong><br />
		 Bei "Nein" werden die Artikel in Listenform untereinander angezeigt!<br />
		 Diese Einstellung hat keine Auswirkung, wenn die Topartikel als Slider dargestellt werden.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX' => 'Artikeldarstellung:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_INFO' => 'Sollen Artikel in der Kategorieansicht (Produktlisten) als Boxen angezeigt werden?<br /><br />
		<strong>Hinweis:</strong><br />
		 Bei "Nein" werden die Artikel in Listenform untereinander angezeigt!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX' => 'Artikeldarstellung:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX_INFO' => 'Sollen Artikel im Reiter "Empfehlung" (Cross-Selling-, Reverse-Cross-Selling) und "Kunden-Tipp" (Also-Purchased) auf der Artikel-Detailseite als Boxen angezeigt werden?<br /><br />
		<strong>Hinweis:</strong><br />
		 Bei "Nein" werden die Artikel in Listenform untereinander angezeigt!',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_CLASSES' => 'Klassen',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_NAVBAR' => 'TOP1 Navbar:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_NAVBAR_INFO' => 'Klasse der Navbar ganz oben!<br />
		Schriftklassen zeigen nur Auswirkung, wenn "keine" gew&auml;hlt wird und die Navbar nur Text, keine Links enth&auml;lt.<br />
		Standard: navbar-dark',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_BG' => 'TOP1 Hintergrund:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_BG_INFO' => 'Hintergrundklasse der Navbar ganz oben!<br />
		Mehr dazu finden Sie unter "Documentation->Utilitis->Colors" auf der Seite "https://getbootstrap.com"<br />
		Standard: bg-dark',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_TEXT' => 'TOP1 Schriftfarbe:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_TEXT_INFO' => 'Schrift-/ Textklasse der Navbar ganz oben!<br />
		Standard: keine',
	'TEXT_BS4_TPL_MANAGER_CONFIG_LOGOBAR_TEXT' => 'Logobar Schriftfarbe:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_LOGOBAR_TEXT_INFO' => 'Schrift-/ Textklasse der Navigation rechts neben dem Logo!<br />
		Standard: text-secondary',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_NAVBAR' => 'Main Navbar:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_NAVBAR_INFO' => 'Klasse der Hauptnavigation / des Superfishmen&uuml;s!<br />
		Standard: navbar-light',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_BG' => 'Main Hintergrund:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_BG_INFO' => 'Hintergrundklasse der Hauptnavigation / des Superfishmen&uuml;s!<br />
		Standard: bg-dark',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_NAVBAR' => 'Footer Navbar:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_NAVBAR_INFO' => 'Klasse der Fu&szlig;-/ Footer-Navigation / des Footers!<br />
		Standard: navbar-dark',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_BG' => 'Footer Hintergrund:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_BG_INFO' => 'Hintergrundklasse der Fu&szlig;-/ Footer-Navigation / des Footers!<br />
		Standard: bg-dark',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_MODULES' => 'Module',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND' => 'Kundenerinnerung:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_INFO' => 'Modul "Kundenerinnerung" aktivieren!<br />
		<strong>Hinweis:</strong><br />
		 Dieses Modul bietet Ihren angemeldeten Kunden die M&ouml;glichkeit, sich eine Erinnerungs-E-Mail schicken zu lassen, sobald ein Artikel wieder auf Lager ist.<br /><br />
		 Sobald ein Artikel nicht mehr auf Lager ist, erscheint auf der Produktdetail-Seite ein Button, womit der Kunde sich in die Erinnerungsliste eintragen kann.<br /><br />
		 <strong>Die Erinnerungsliste finden Sie im Adminbereich unter "Kunden -> Kundenerinnerungen".</strong><br /><br />
		 Ist ein Artikel (in ausreichender Anzahl) wieder auf Lager, bekommt der Kunde automatisch eine Erinnerungsmail mit einem Link, der direkt zum Produkt im Shop f&uuml;hrt.<br />
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=12813.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=12813.0</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL' => 'Kundenerinnerung:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL_INFO' => 'E-Mail an den Shopbetreiber (Kontakt - E-Mail-Adresse) senden, wenn sich ein Kunde in die Erinnerungsliste eintr&auml;gt?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CHEAPLY_SEE' => 'Billiger gesehen:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CHEAPLY_SEE_INFO' => 'Modul "Billiger gesehen" aktivieren und den Link in der Produktdetailansicht anzeigen!<br />
		<strong>Hinweis:</strong><br />
		 Der im oberen Bereich angezeigte Text kann im Content Manager ge&auml;ndert werden!<br />
		 Link zum Originalmodul: <a href="http://www.xtc-load.de/2009/02/billiger-gesehen-by-southbridgede" target=”_blank”>http://www.xtc-load.de/2009/02/billiger-gesehen-by-southbridgede</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY' => 'Frage zum Artikel:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY_INFO' => 'Modul "Frage zum Artikel" aktivieren und den Link in der Produktdetailansicht anzeigen!<br />
		<strong>Hinweis:</strong><br />
		 Der im oberen Bereich angezeigte Text kann im Content Manager ge&auml;ndert werden!<br />
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=2153.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=2153.0</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER' => 'Automatische Preisberechnung:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER_INFO' => 'Modul "Automatische Preisberechnung" aktivieren!<br />
		<strong>Hinweis:</strong><br />
		 Aufpreispflichtige Optionen/Attribute werden automatisch zum Artikelpreis hinzugerechnet.<br />
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=20125.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=20125.0</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART' => 'AGI: Anzahl im Warenkorb reduzieren:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART_INFO' => 'Modul "AGI: Anzahl im Warenkorb reduzieren" aktivieren!<br />
		<strong>Hinweis:</strong><br />
		 Das Modul reduziert die Anzahl eines Artikels im Warenkorb auf die maximal verf&uuml;gbare Menge, wenn eine gr&ouml;&szlig;ere Anzahl bestellt werden sollte. Der Kunde wird direkt &uuml;ber die Anpassung informiert und muss die passende Anzahl nicht durch probieren herausfinden<br />&copy; andreas-guder.de.<br />
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=40416.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=40416.0</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_ACTIVATE' => 'Bitte aktivieren Sie: ',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_DEACTIVATE' => 'Bitte deaktivieren Sie: ',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_ALLOW_CHECKOUT' => 'Einkaufen nicht vorr&auml;tiger Ware erlauben',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_CHECK' => '&Uuml;berpr&uuml;fen des Warenbestandes',
	'TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA' => 'AGI: Anzahl im Warenkorb reduzieren:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA_INFO' => 'Anzahl im Warenkorb anzeigen?<br />
		 Zeigt dem Kunden an, welche Anzahl er urspr&uuml;nglich wollte, und auf welche Anzahl reduziert wurde.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1' => 'Awids Rating Breakdown',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_2' => ' - Rezensionsaufgliederung nach vergebenen Sternen',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_INFO' => 'Modul "Rezensionsaufgliederung nach vergebenen Sternen" aktivieren!<br />
		<strong>Hinweis:</strong><br />
		 Dieses Modul gliedert die vergebenen Bewertungen je Sterne-Anzahl in einzelne Progress-Bars auf, sodass der Kunde mit einem Blick erkennen kann, welche Bewertungen am h&auml;ufigsten vergeben wurden.<br />
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=40793.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=40793.0</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_PRODLIST_INFO' => 'Modul auch in Produktlisten anzeigen?<br />
		 Die erweiterte Bewertung kann auch in Produktlisten angezeigt werden.<br />
		 Bei den Bestseller, Neue Artikel und Top-Artikel ist teilweise nur eine einfache Darstellung m&ouml;glich.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS_INFO' => 'Sterne auch <u>ohne</u> gespeicherte Bewertung anzeigen?<br />
		 Damit ist es m&ouml;glich, dass Boxen in Produktlisten &auml;hnliche H&ouml;hen erhalten.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_URL_INFO' => 'Filter-PopUp aktivieren?<br />
		 Diese Einstellung erm&ouml;glicht es, die Bewertungen in einem PopUp anzuzeigen und nach Anzahl der vergebenen Sterne zu filtern.',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_MIXED' => 'Verschiedenes',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_NEW' => 'Fahne/Farbband:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_NEW_INFO' => 'Soll das Farbband "Neu" angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_TOP' => 'Fahne/Farbband:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_TOP_INFO' => 'Soll das Farbband "Top" angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_SPECIAL' => 'Fahne/Farbband:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_SPECIAL_INFO' => 'Soll das Farbband "Angebot" angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_PERCENT' => 'Prozentbutton:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_PERCENT_INFO' => 'Soll der Prozentbutton (z.B. "25%") angezeigt werden?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ADVANCED_JS_VALIDATION' => 'Validierung:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ADVANCED_JS_VALIDATION_INFO' => 'Soll die erweiterte JavaScript-Validierung verwendet werden?<br /><br />
		<strong>Hinweis:</strong><br />
		 Dadurch werden im Registrierungsformular Eingabefehlermeldungen direkt unter dem entsprechendem Eingabefeld angezeigt!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_USE_EASYZOOM' => 'Easyzoom:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_USE_EASYZOOM_INFO' => 'Soll Easyzoom in der Produktdetailansicht verwendet werden?<br /><br />
		<strong>Hinweis:</strong><br />
		 Easyzoom vergr&ouml;&szlig;ert das Produktbild sobald man mit dem Mauszeiger dar&uuml;berf&auml;hrt oder mit dem Finger antippt (smartphonef&auml;hig)!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV' => 'Filterfarbe:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV_INFO' => 'Welche Hintergrundfarbklasse soll ein aktiver Filter erhalten?<br /><br />
		<strong>Hinweis:</strong><br />
		 In der Bootstrap 4 Dokumentation ->Utilities->Background color ("https://getbootstrap.com/docs/4.3/utilities/colors/#background-color") k&ouml;nnen die Farbklassen eingesehen werden!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW' => 'Suchfeld:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW_INFO' => 'Soll das Suchfeld einreihig angezeigt werden?<br /><br />
		<strong>Hinweis:</strong><br />
		 Das zus&auml;tzliche Auswahlfeld f&uuml;r die Kategorie in der gesucht werden soll kann ein- oder zweireihig dargestellt werden, dadurch werden die Kategorienamen nicht abgeschnitten!',
);


foreach ($lang_array as $key => $val) {
  defined($key) or define($key, $val);
}

?>