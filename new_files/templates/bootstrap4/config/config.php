<?php
	/* -----------------------------------------------------------------------------------------
	$Id: config.php 14256 2022-04-01 14:43:10Z Tomcraft $

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Copyright (c) 2009 - 2013 [www.modified-shop.org]
	-----------------------------------------------------------------------------------------
	Released under the GNU General Public License
	---------------------------------------------------------------------------------------*/

	/*
	*  template specific defines
	*/

	// laden der templatespezifischen Sprachdatei (dadurch entfallen die Dateien lang/jeweilige_sprache/extra/bs4_template.php
	require_once(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/lang/template_'.$_SESSION['language'].'.php');

	// Topleiste
	defined('BS4_SHOW_TOP1') or define('BS4_SHOW_TOP1', 'true'); // Soll Top1 angezeigt werden? anzeigen = true, ansonsten false
	defined('BS4_SHOW_TOP2') or define('BS4_SHOW_TOP2', 'true'); // Hinweis: In der Topleiste können vier Spalteneinträge angezeigt werden. Damit diese Spalten auch mehrsprachig genutzt werden können, sind die Texte in eine Sprachdatei ausgelagert. Die Texte können in der Datei "templates/bootstrap4/lang/lang_german.custom" geändert werden (Englisch -> "lang_english.custom").
	defined('BS4_SHOW_TOP3') or define('BS4_SHOW_TOP3', 'true');
	defined('BS4_SHOW_TOP4') or define('BS4_SHOW_TOP4', 'true');
	// Javascript im Browser deaktiviert
	defined('BS4_SHOW_JS_DISABLED') or define('BS4_SHOW_JS_DISABLED', 'true'); // Hinweis anzeigen = true, ansonsten false
	// logo
	defined('BS4_SHOP_LOGO') or define('BS4_SHOP_LOGO', 'img/logo_head.png'); // Dieses Logo wird im Template gezeigt z.B. shoproot/templates/bootstrap4/img/logo_head.png -> 'img/logo_head.png'
	// Suchfeld
	defined('BS4_SEARCHFIELD_PERMANENT') or define('BS4_SEARCHFIELD_PERMANENT', 'false'); // Soll das Suchfeld dauerhaft angezeigt werden? - anzeigen = true, ansonsten false
	// Icon-Leiste
	defined('BS4_SHOW_ICON_WITH_NAMES') or define('BS4_SHOW_ICON_WITH_NAMES', 'false'); // Soll auf breiten Bildschirmen der Name zum Icon angezeigt werden? - anzeigen = true, ansonsten false


	// Menüleiste schmale Bildschirme
	defined('BS4_MENUBAR_FIXEDTOP') or define('BS4_MENUBAR_FIXEDTOP', 'false'); // true fixiert die Menüleiste oben. Die Menüleiste scrollt dadurch nicht mehr mit. Das Logo wird in die Menüleiste verschoben.
	defined('BS4_MENUBAR_FIXEDTOP_CLASSES') or define('BS4_MENUBAR_FIXEDTOP_CLASSES', 'navbar-light bg-light border-bottom p-0'); // CSS-Klassen bei fixierter Menüleiste!
		// Wird die Menüleiste bei schmalen Bildschirmen fixiert, werden die normalen Bootstrap-CSS-Klassen entfernt und durch die hier eingegebenen ersetzt. Dadurch ist es möglich, der Menüleiste ein anderes Aussehen zu geben. Standard: "navbar-light bg-light border-bottom p-0"
	defined('BS4_LOGOBAR_FIXEDTOP') or define('BS4_LOGOBAR_FIXEDTOP', 'false'); // true verschiebt die Logoleiste in die Menüleiste oben.
	// Responsivemenü
	defined('BS4_RESPONSIVEMENU_SHOW') or define('BS4_RESPONSIVEMENU_SHOW', 'true'); // true zeigt das Responsivemenü / false zeigt es nicht
	// Superfishmenü
	defined('BS4_SUPERFISHMENU_SHOW') or define('BS4_SUPERFISHMENU_SHOW', 'true'); // true zeigt das Superfishmenü / false zeigt es nicht
	defined('BS4_TOUCH_USE') or define('BS4_TOUCH_USE', 'true'); // Superfishmenü für Touchscreens nutzbar machen? Ja = true, Nein = false
	defined('BS4_MAXLEVEL_IN_TOPCATMENU') or define('BS4_MAXLEVEL_IN_TOPCATMENU', 'false'); // false zeigt alle, ansonsten Zahl der Level z.B. 2
	defined('BS4_SHOW_PRODUCTS_IN_TOPCATMENU') or define('BS4_SHOW_PRODUCTS_IN_TOPCATMENU', 'false'); // true zeigt die Anzahl / false zeigt sie nicht
	defined('BS4_SHOW_HOMEBUTTON_IN_TOPCATMENU') or define('BS4_SHOW_HOMEBUTTON_IN_TOPCATMENU', 'true'); // true zeigt den Button / false zeigt ihn nicht
	defined('BS4_ADD_LINK_IN_TOPCATMENU_LAST') or define('BS4_ADD_LINK_IN_TOPCATMENU_LAST', ''); 	// Zusätzliche Links im Menü z.B. 'https://www.mein_shop.com/shop_content.php?coID=3|Service,https://www.modified-shop.org|Modified'.
																									// Für Mehrsprachigkeit wird z.B. 'https://www.example.com|BS4_Linktext' eingetragen - wichtig ist das "BS4_" am Beginn!
																									// Zusätzlich muss in der Datei "templates/bootstrap4/lang/lang_german.custom" eine Sprachvariable angelegt werden - BS4_Linktext = 'Mein Link'
	// KK-Megamenü
	defined('BS4_KK_MEGAS') or define('BS4_KK_MEGAS', 'main-3'); // Standard "" - falls gewünscht, hier die Kategorien und Anzahl der Reihen gem. den Beispielen eintragen
	/*
	Beispiele KK-Megamenü:

	Alle Kategorien sollen als Mega-Menü mit 3 Spalten dargestellt werden.
	defined('BS4_KK_MEGAS') or define('BS4_KK_MEGAS', 'main-3');
	Eingetragen wird die ID der Navbar 'main', dahinter die Anzahl der Spalten.
	Alle Kategorien sollen als Mega-Menü mit 3 Spalten dargestellt werden, ab dem 5. Link der untersten Kategorieebene soll ein Link "mehr anzeigen ..." eingefügt werden.
	defined('BS4_KK_MEGAS') or define('BS4_KK_MEGAS', 'main-3-5');
	Eingetragen wird die ID der Navbar 'main', dahinter die Anzahl der Spalten und die Stelle an der der Link eingefügt werden soll.

	Es sollen die Kategorien mit der ID 5 (3-spaltig) und ID 22 (4-spaltig) als Mega-Menü dargestellt werden.
	defined('BS4_KK_MEGAS') or define('BS4_KK_MEGAS', 'li5-3,li22-4');
	Eingetragen werden die ID's der Kategorienlinks 'li5' und 'li22' - die Schreibweise ist hier wichtig, dahinter die Anzahl der Spalten.
	Es sollen die Kategorien mit der ID 5 (3-spaltig) und ID 22 (4-spaltig) als Mega-Menü dargestellt werden, ab dem 4. bzw. 5. Link der untersten Kategorieebene soll ein Link "mehr anzeigen ..." eingefügt werden.
	defined('BS4_KK_MEGAS') or define('BS4_KK_MEGAS', 'li5-3-4,li22-4-5');
	Eingetragen werden die ID's der Kategorienlinks 'li5' und 'li22' - die Schreibweise ist hier wichtig, dahinter die Anzahl der Spalten.

	 */
	$KK_MEGAS = array(); // Variable wird definiert - hier nichts eintragen
	if(BS4_KK_MEGAS != '') {
	$KK_MEGAS = explode(',', trim(BS4_KK_MEGAS));
	}
	// Ende KK-Megamenü

	// categories - das Modified Standardmenü
	defined('BS4_CATEGORIESMENU_MAXLEVEL') or define('BS4_CATEGORIESMENU_MAXLEVEL', 'false'); // Bis zu welcher Ebene soll der Kategorien-Baum standardmäßig aufklapptbar sein? // false, wenn er komplett ausgeklappt sein soll, ansonsten eine Zahl.
	defined('BS4_CATEGORIESMENU_AJAX') or define('BS4_CATEGORIESMENU_AJAX', 'true'); // Sollen Unterkategorien per Ajax nachgeladen werden? // true, wenn ja.
	defined('BS4_CATEGORIESMENU_AJAX_SCROLL') or define('BS4_CATEGORIESMENU_AJAX_SCROLL', 'true'); // Soll nach dem Klick auf den "+"-Button die geklickte Kategorie nach oben gescrollt werden? // true, wenn ja.
	defined('BS4_CATEGORIESMENU_POSITION_LEFT') or define('BS4_CATEGORIESMENU_POSITION_LEFT', 'true'); // Soll das Menü auf schmalen Bildschirmen links angezeigt werden? // true, wenn ja. Hinweis: Diese Einstellung wirkt sich nur aus, wenn das Responsive-Menü ausgeschaltet ist!
	// gilt für alle Menüs
	defined('BS4_SPECIALS_CATEGORIES') or define('BS4_SPECIALS_CATEGORIES', 'true'); // 'true' zeigt den Link "Angebote" im Kategoriebaum / 'false' zeigt die "Angebote" als separate Box
	defined('BS4_WHATSNEW_CATEGORIES') or define('BS4_WHATSNEW_CATEGORIES', 'true'); // 'true' zeigt den Link "Neue Artikel" im Kategoriebaum / 'false' zeigt die "Neue Artikel" als separate Box
	defined('BS4_WHATSNEW_SPECIALS_UPPERCASE') or define('BS4_WHATSNEW_SPECIALS_UPPERCASE', 'true'); // Links "Angebote" und "Neue Artikel" in GROßBUCHSTABEN anzeigen = true, ansonsten false
	defined('BS4_HIDE_EMPTY_CATEGORIES') or define('BS4_HIDE_EMPTY_CATEGORIES', 'true'); // Leere Kategorien ausblenden? - ausblenden = true, ansonsten false

	// BS4 Banner Manger
	defined('BS_DEFAULT_BANNER_SETTINGS') or define('BS_DEFAULT_BANNER_SETTINGS', 'n,btn-primary,n,n,btn-primary,n,4000'); // Standardwerteschema 'Controls(n,j1,j2),Controlsclass(Bootstrap-Btn-Klassen),Controlsrounded(n,j),Indicators(n,j1,j2),Indicatorsclass(Bootstrap-Btn-Klassen),Indicatorsrounded(n,j),Sliderduration(4000,5000... Millisekunden)'

	// Karusellslider
	defined('BS4_CAROUSEL_SHOW') or define('BS4_CAROUSEL_SHOW', 'column'); // Bilderslider auf Startseite / nicht anzeigen = 'false', Bildschirmbreite = 'screen', Shopbreite = 'shop', rechte Spalte = 'column'
	defined('BS4_CAROUSEL_FADE') or define('BS4_CAROUSEL_FADE', 'true'); // Fadeeffekt = true, Slideeffekt = false
	// Top-Artikel als Slider anzeigen
	defined('BS4_TOP_PROD_IN_SLIDER') or define('BS4_TOP_PROD_IN_SLIDER', 'true'); // Top-Artikel können auch als Slider angezeigt werden - anzeigen = true, ansonsten false
	defined('BS4_TOPCAROUSEL_FADE') or define('BS4_TOPCAROUSEL_FADE', 'true'); // Fadeeffekt = true, Slideeffekt = false
	defined('BS4_TOPCAROUSEL_NAME_LINES') or define('BS4_TOPCAROUSEL_NAME_LINES', 0); // Anzahl der Zeilen, die der Artikelname belegen soll (0 = auto)
	// Bestsellerslider
	defined('BS4_BSCAROUSEL_SHOW') or define('BS4_BSCAROUSEL_SHOW', 'true'); // Bestseller-Karusell anzeigen = true, ansonsten false
	defined('BS4_BSCAROUSEL_FADE') or define('BS4_BSCAROUSEL_FADE', 'true'); // Fadeeffekt = true, Slideeffekt = false
	defined('BS4_BSCAROUSEL_NAME_LINES') or define('BS4_BSCAROUSEL_NAME_LINES', 0); // Anzahl der Zeilen, die der Artikelname belegen soll (0 = auto)

	// Boxen auf der Startseite
	defined('BS4_STARTPAGE_BOX_CATEGORIES') or define('BS4_STARTPAGE_BOX_CATEGORIES', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_ADD_QUICKIE') or define('BS4_STARTPAGE_BOX_ADD_QUICKIE', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_LOGIN') or define('BS4_STARTPAGE_BOX_LOGIN', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_WHATSNEW') or define('BS4_STARTPAGE_BOX_WHATSNEW', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_SPECIALS') or define('BS4_STARTPAGE_BOX_SPECIALS', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_LAST_VIEWED') or define('BS4_STARTPAGE_BOX_LAST_VIEWED', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_REVIEWS') or define('BS4_STARTPAGE_BOX_REVIEWS', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_CUSTOM') or define('BS4_STARTPAGE_BOX_CUSTOM', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_MANUFACTURERS') or define('BS4_STARTPAGE_BOX_MANUFACTURERS', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_MANUFACTURERS_INFO') or define('BS4_STARTPAGE_BOX_MANUFACTURERS_INFO', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_CURRENCIES') or define('BS4_STARTPAGE_BOX_CURRENCIES', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_SHIPPING_COUNTRY') or define('BS4_STARTPAGE_BOX_SHIPPING_COUNTRY', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_INFOBOX') or define('BS4_STARTPAGE_BOX_INFOBOX', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_HISTORY') or define('BS4_STARTPAGE_BOX_HISTORY', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_STARTPAGE_BOX_TRUSTEDSHOPS') or define('BS4_STARTPAGE_BOX_TRUSTEDSHOPS', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	// Boxen auf anderen Seiten (nicht Startseite)
	defined('BS4_NOT_STARTPAGE_BOX_CATEGORIES') or define('BS4_NOT_STARTPAGE_BOX_CATEGORIES', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_ADD_QUICKIE') or define('BS4_NOT_STARTPAGE_BOX_ADD_QUICKIE', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_LOGIN') or define('BS4_NOT_STARTPAGE_BOX_LOGIN', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_WHATSNEW') or define('BS4_NOT_STARTPAGE_BOX_WHATSNEW', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_SPECIALS') or define('BS4_NOT_STARTPAGE_BOX_SPECIALS', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_LAST_VIEWED') or define('BS4_NOT_STARTPAGE_BOX_LAST_VIEWED', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_REVIEWS') or define('BS4_NOT_STARTPAGE_BOX_REVIEWS', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_CUSTOM') or define('BS4_NOT_STARTPAGE_BOX_CUSTOM', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_MANUFACTURERS') or define('BS4_NOT_STARTPAGE_BOX_MANUFACTURERS', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO') or define('BS4_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_CURRENCIES') or define('BS4_NOT_STARTPAGE_BOX_CURRENCIES', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_SHIPPING_COUNTRY') or define('BS4_NOT_STARTPAGE_BOX_SHIPPING_COUNTRY', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_INFOBOX') or define('BS4_NOT_STARTPAGE_BOX_INFOBOX', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_HISTORY') or define('BS4_NOT_STARTPAGE_BOX_HISTORY', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_NOT_STARTPAGE_BOX_TRUSTEDSHOPS') or define('BS4_NOT_STARTPAGE_BOX_TRUSTEDSHOPS', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
	defined('BS4_HIDE_ALL_BOXES') or define('BS4_HIDE_ALL_BOXES', 'false'); // ausblenden = 'true', anzeigen = 'false'

	// Produktlisten Fullcontent (sollen die Produktansichten fullcontent sein)
	defined('BS4_STARTPAGE_FULLCONTENT') or define('BS4_STARTPAGE_FULLCONTENT', 'false'); // 'true' zeigt die Listen in voller Breite (linke Spalte wird ausgeblendet) / 'false' linke Spalte bleibt sichtbar
	// Produktlisten Fullcontent (sollen die Produktansichten fullcontent sein)
	defined('BS4_PROD_LIST_FULLCONTENT') or define('BS4_PROD_LIST_FULLCONTENT', 'false'); // 'true' zeigt die Listen in voller Breite (linke Spalte wird ausgeblendet) / 'false' linke Spalte bleibt sichtbar
	// Produktdetailansicht Boxen anzeigen oder volle Breite
	defined('BS4_PROD_DETAIL_FULLCONTENT') or define('BS4_PROD_DETAIL_FULLCONTENT', 'true'); // 'true' zeigt die Detailansicht in voller Breite / 'false' zeigt die Detailansicht mit Boxen
	defined('BS4_PROD_DETAIL_SHOW_MANUIMAGE') or define('BS4_PROD_DETAIL_SHOW_MANUIMAGE', 'true'); // 'true' zeigt Herstellerbild / 'false' zeigt Herstellerbild nicht

	defined('BS4_PRODUCT_LIST_BOX_STARTPAGE') or define('BS4_PRODUCT_LIST_BOX_STARTPAGE', 'true'); // 'true' zeigt "Unsere TOP-Artikel" als Box-Ansicht / 'false' zeigt als Listen-Ansicht
	defined('BS4_PROD_LIST_BOX') or define('BS4_PROD_LIST_BOX', 'true'); // 'true' zeigt Artikel in Kategorie-Navigation (product_listing) als Box-Ansicht / 'false' zeigt Listen-Ansicht
	defined('BS4_PRODUCT_LIST_BOX') or define('BS4_PRODUCT_LIST_BOX', ((isset($_SESSION['listbox'])) ? $_SESSION['listbox'] : BS4_PROD_LIST_BOX));
	defined('BS4_PRODUCT_INFO_BOX') or define('BS4_PRODUCT_INFO_BOX', 'true'); // 'true' zeigt Cross-Selling-, Reverse-Cross-Selling- & Also-Purchased-Artikel auf Artikel-Detailseite als Box-Ansicht / 'false' zeigt als Listen-Ansicht

	// default classes
	defined('BS4_TOP1_NAVBAR') or define('BS4_TOP1_NAVBAR', 'navbar-dark');
	defined('BS4_TOP1_BG') or define('BS4_TOP1_BG', 'dark');
	defined('BS4_TOP1_TEXT') or define('BS4_TOP1_TEXT', '');
	defined('BS4_LOGOBAR_TEXT') or define('BS4_LOGOBAR_TEXT', 'text-secondary');
	defined('BS4_TOP2_NAVBAR') or define('BS4_TOP2_NAVBAR', 'navbar-light');
	defined('BS4_TOP2_BG') or define('BS4_TOP2_BG', 'light');
	defined('BS4_FOOTER_NAVBAR') or define('BS4_FOOTER_NAVBAR', 'navbar-dark');
	defined('BS4_FOOTER_BG') or define('BS4_FOOTER_BG', 'dark');

	// Module
	defined('BS4_CUSTOMERS_REMIND') or define('BS4_CUSTOMERS_REMIND', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
		/* Modul "Kundererinnerung" aktivieren!
		Hinweis:
		Dieses Modul bietet Ihren angemeldeten Kunden die Möglichkeit, sich eine Erinnerungs-E-Mail schicken zu lassen, sobald ein Artikel wieder auf Lager ist.
		Sobald ein Artikel nicht mehr auf Lager ist, erscheint auf der Produktdetail-Seite ein Button, womit der Kunde sich in die Erinnerungsliste eintragen kann.
		Die Erinnerungsliste finden Sie im Adminbereich unter "Kunden -> Kundenerinnerungen".
		Ist ein Artikel (in ausreichender Anzahl) wieder auf Lager, bekommt der Kunde automatisch eine Erinnerungsmail mit einem Link, der direkt zum Produkt im Shop führt.
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=12813.0 */
	defined('BS4_CUSTOMERS_REMIND_SENDMAIL') or define('BS4_CUSTOMERS_REMIND_SENDMAIL', 'false'); // 'true' = E-Mail an den Shopbetreiber (Kontakt - E-Mail-Adresse) senden, wenn sich ein Kunde in die Erinnerungsliste einträgt?
	defined('BS4_CHEAPLY_SEE') or define('BS4_CHEAPLY_SEE', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
		/* Modul "Billiger gesehen" aktivieren und den Link in der Produktdetailansicht anzeigen!
		Hinweis:
		Der im oberen Bereich angezeigte Text kann im Content Manager geändert werden!
		Link zum Originalmodul: http://www.xtc-load.de/2009/02/billiger-gesehen-by-southbridgede */
	defined('BS4_PRODUCT_INQUIRY') or define('BS4_PRODUCT_INQUIRY', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
		/* Modul "Frage zum Artikel" aktivieren und den Link in der Produktdetailansicht anzeigen!
		Hinweis:
		Der im oberen Bereich angezeigte Text kann im Content Manager geändert werden!
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=2153.0 */
	defined('BS4_ATTR_PRICE_UPDATER') or define('BS4_ATTR_PRICE_UPDATER', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
	defined('BS4_ATTR_PRICE_UPDATER_UPDATE_PRICE') or define('BS4_ATTR_PRICE_UPDATER_UPDATE_PRICE', 'true'); // der Artikelpreis wird automatisch angepasst - 'false' = deaktiviert / 'true' = aktiviert
		/* Modul "Automatische Preisberechnung" aktivieren!
		Hinweis:
		Aufpreispflichtige Optionen/Attribute werden automatisch zum Artikelpreis hinzugerechnet.
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=20125.0 */
	defined('BS4_AGI_REDUCE_CART') or define('BS4_AGI_REDUCE_CART', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
		/* Modul "AGI: Anzahl im Warenkorb reduzieren" aktivieren!
		Hinweis:
		Das Modul reduziert die Anzahl eines Artikels im Warenkorb auf die maximal verfügbare Menge, wenn eine größere Anzahl bestellt werden sollte. Der Kunde wird direkt über die Anpassung informiert und muss die passende Anzahl nicht durch probieren herausfinden
		© andreas-guder.de.
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=40416.0 */
	defined('BS4_AGI_REDUCE_CART_SHOW_AVAILABLE') or define('BS4_AGI_REDUCE_CART_SHOW_AVAILABLE', 'false'); // 'false' = nein / 'true' = ja / Anzahl im Warenkorb anzeigen? Zeigt dem Kunden an, welche Anzahl er ursprünglich wollte, und auf welche Anzahl reduziert wurde.
		/* Modul "Rezensionsaufgliederung nach vergebenen Sternen" aktivieren!
		Hinweis:
		Dieses Modul gliedert die vergebenen Bewertungen je Sterne-Anzahl in einzelne Progress-Bars auf, sodass der Kunde mit einem Blick erkennen kann, welche Bewertungen am häufigsten vergeben wurden.
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=40793.0 */
	defined('BS4_AWIDSRATINGBREAKDOWN') or define('BS4_AWIDSRATINGBREAKDOWN', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
	defined('BS4_AWIDSRATINGBREAKDOWN_PRODLIST') or define('BS4_AWIDSRATINGBREAKDOWN_PRODLIST', 'true'); // Modul auch in Produktlisten anzeigen? 'false' = deaktiviert / 'true' = aktiviert
	defined('BS4_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS') or define('BS4_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS', 'true'); // Sterne auch ohne gespeicherte Bewertung anzeigen? 'false' = deaktiviert / 'true' = aktiviert
	defined('BS4_AWIDSRATINGBREAKDOWN_URL') or define('BS4_AWIDSRATINGBREAKDOWN_URL', 'true'); // Filter-PopUp aktivieren? Diese Einstellung ermöglicht es, die Bewertungen in einem PopUp anzuzeigen und nach Anzahl der vergebenen Sterne zu filtern. - 'false' = deaktiviert / 'true' = aktiviert
		/* Modul "CSS Produkt- & Attributlagerampel" aktivieren!
		Hinweis:
		Dieses Modul zeigt eine Produkt- und Attribut-Lagerampel, welche wahlweise eine grafische Lagerampel oder den Lagerbestand als Text abbildet.
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=37371.0 */
	defined('BS4_TRAFFIC_LIGHTS') or define('BS4_TRAFFIC_LIGHTS', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
	defined('BS4_TRAFFIC_LIGHTS_PRODLISTING') or define('BS4_TRAFFIC_LIGHTS_PRODLISTING', 'false'); // Anzeige im Listing 'false' = nicht anzeigen, 'l' = light, 'ls' = light and stock, 'lt' = light and text, 'lts' = light and text and stock, 't' = text, 'ts' = text and stock
	defined('BS4_TRAFFIC_LIGHTS_PRODINFO') or define('BS4_TRAFFIC_LIGHTS_PRODINFO', 'false'); // Anzeige Produktdetailseite 'false' = nicht anzeigen, 'l' = light, 'ls' = light and stock, 'lt' = light and text, 'lts' = light and text and stock, 't' = text, 'ts' = text and stock
	defined('BS4_TRAFFIC_LIGHTS_PRODATTRIBUTES') or define('BS4_TRAFFIC_LIGHTS_PRODATTRIBUTES', 'false'); // Anzeige Attribute 'false' = nicht anzeigen, 'l' = light, 'ls' = light and stock, 'lt' = light and text, 'lts' = light and text and stock, 't' = text, 'ts' = text and stock
	defined('BS4_MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL') or define('BS4_MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL', 0); // Minimum-Wert für die gelbe Ampel ein. Dieser Wert und alle Werte darunter werden mit einer roten Ampel versehen.
	defined('BS4_MODULE_TRAFFIC_LIGHTS_STOCK_GREEN') or define('BS4_MODULE_TRAFFIC_LIGHTS_STOCK_GREEN', 10); // Wert ab dem eine grüne Ampel anzeigt werden soll. Alle Werte darunter bis zum Minimum-Wert werden mit einer gelben Ampel versehen.


	// Flag "Neu", "TOP" und "Sonderangebot"
	defined('BS4_FLAG_NEW_SHOW') or define('BS4_FLAG_NEW_SHOW', 'true'); // true zeigt das Flag / false zeigt es nicht
	defined('BS4_FLAG_TOP_SHOW') or define('BS4_FLAG_TOP_SHOW', 'true'); // true zeigt das Flag / false zeigt es nicht
	defined('BS4_FLAG_SPECIAL_SHOW') or define('BS4_FLAG_SPECIAL_SHOW', 'true'); // true zeigt das Flag / false zeigt es nicht
	defined('BS4_FLAG_PERCENT_SHOW') or define('BS4_FLAG_PERCENT_SHOW', 'true'); // true zeigt die Prozentzahl / false zeigt sie nicht
	// Erweiterte Validation im Registrierungsformular - mittels Javascript werden Fehlermeldungen direkt unter dem entsprechendem Eingabefeld angezeigt
	defined('BS4_ADVANCED_JS_VALIDATION') or define('BS4_ADVANCED_JS_VALIDATION', 'true'); // benutzen = true, ansonsten false
	// EasyZoom
	defined('BS4_USE_EASYZOOM') or define('BS4_USE_EASYZOOM', 'true'); // EasyZoom in der Produkt-Info-Ansicht verwenden = true, ansonsten false
	// Filterfarbe, wenn aktiv
	defined('BS4_FILTERCOLOR_AKTIV') or define('BS4_FILTERCOLOR_AKTIV', 'primary'); // primary, secondary, success, danger, warning, info, light oder dark
	// Suchfeld, einreihig oder zweireihig
	defined('BS4_SEARCHFIELD_ONE_ROW') or define('BS4_SEARCHFIELD_ONE_ROW', 'true'); // true einreihig / false zweireihig



	// Bootstrap-Theme
	defined('BS4_BOOTSTRAP_THEME') or define('BS4_BOOTSTRAP_THEME', 'default'); 	// Folgende Themes stehen dank https://bootswatch.com zur Verfügung (dort können Sie auch die Less- und Sass-Dateien finden):
																					// default, cerulean, cosmo, cyborg, darkly, flatly, journal, litera, lumen, lux, materia, minty, pulse, sandstone, simplex, sketchy, slate, solar, spacelab, superhero, united, yeti
																					// einfach den jeweiligen Name einsetzen z.B. "define('BS4_BOOTSTRAP_THEME', 'flatly');" steht für das Theme 'flatly'.


	// check specials
	if (BS4_SPECIALS_CATEGORIES == 'true') {
		require_once (DIR_FS_INC.'check_specials.inc.php');
		defined('SPECIALS_EXISTS') or define('SPECIALS_EXISTS', check_specials());
	}
  
	// check whats new
	/*
	if (BS4_WHATSNEW_CATEGORIES == 'true') {
		require_once (DIR_FS_INC.'check_whatsnew.inc.php');
		define('WHATSNEW_EXISTS', check_whatsnew());
	}
	*/

	//   Wird eingestellt in Erw. Konfiguration -> Bootstrap 4 Template Manager -> BS4 Konfiguration Tab "Verschiedenes" - Wert Artikel-Thumbnails
	//	Seit Shopversion 2.0.6.0 besteht die Möglichkeit Artikelbilder in zusätzlichen Größen (Mini, Midi) zu speichern.
	//	In Konfiguration -> Bild Optionen sind die Maße einzustellen, für bereits vorhanden Bilder muss evtl. das Systemmodul "Bilder Prozessing" ausgeführt werden.
	$pictureset_active = false;
	if (defined('DIR_WS_MINI_IMAGES')) {
		$pictureset_active = (defined('BS4_PICTURESET_ACTIVE') && constant('BS4_PICTURESET_ACTIVE') == 'true') ? true : false;
	}
	// picture set listing box - neu in Shopversion 2.0.6.0
	define('PICTURESET_ACTIVE', $pictureset_active);
// wird für bootstrap4 nicht benötigt	define('PICTURESET_BOX', '576:thumbnail,768:thumbnail,992:thumbnail,1200:thumbnail');
	define('PICTURESET_ROW', '768:thumbnail');

	// -----------------------------------------------------------------------------------
	// 	Ab hier nichts ändern
	// -----------------------------------------------------------------------------------
	// paths
	define('DIR_FS_BOXES', DIR_FS_CATALOG .'templates/'.CURRENT_TEMPLATE. '/source/boxes/');
	define('DIR_FS_BOXES_INC', DIR_FS_CATALOG .'templates/'.CURRENT_TEMPLATE. '/source/inc/');

	// popup
	define('TPL_POPUP_SHIPPING_LINK_PARAMETERS', '');
	define('TPL_POPUP_SHIPPING_LINK_CLASS', 'iframe');
	define('TPL_POPUP_CONTENT_LINK_PARAMETERS', '');
	define('TPL_POPUP_CONTENT_LINK_CLASS', 'iframe');
	define('TPL_POPUP_PRODUCT_LINK_PARAMETERS', '');
	define('TPL_POPUP_PRODUCT_LINK_CLASS', 'iframe');
	define('TPL_POPUP_COUPON_HELP_LINK_PARAMETERS', '');
	define('TPL_POPUP_COUPON_HELP_LINK_CLASS', 'iframe');
	define('TPL_POPUP_PRODUCT_PRINT_SIZE', '');
	define('TPL_POPUP_PRINT_ORDER_SIZE', '');

	// template output
	define('TEMPLATE_ENGINE', 'smarty_4'); // 'smarty_4' oder 'smarty_3' oder 'smarty_2' -> Nicht ändern! (Nur "smarty_4" oder "smarty_3" unterstützt die custom Sprachdateien (lang_english.custom & lang_german.custom) aus dem Ordner "../lang/" des Templates!)
	define('TEMPLATE_HTML_ENGINE', 'html5'); // 'html5' oder 'xhtml' -> Nicht ändern!
	define('TEMPLATE_RESPONSIVE', 'true'); // 'true' oder 'false' -> Nicht ändern!
	defined('COMPRESS_JAVASCRIPT') or define('COMPRESS_JAVASCRIPT', 'false'); // 'true' kombiniert & komprimiert die zusätzliche JS-Dateien / 'false' bindet alle JS-Dateien einzeln ein

	// set base
  defined('DIR_WS_BASE') OR define('DIR_WS_BASE', xtc_href_link('', '', $request_type, false, false));

  // css buttons
  if (is_file(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/inc/css_button.inc.php')) {
    require_once(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/inc/css_button.inc.php');
  }
