<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

if (defined('BS4_STARTPAGE_SHOW_CATEGORYLIST') && BS4_STARTPAGE_SHOW_CATEGORYLIST == 'true') {
	// MODUL: Kategorien auf der Startseite anzeigen (c_list Modul)
	// Anpassung an modified 1.x: sgei
	// Anpassung an modified 2.x: |Alex|
	// Quelle: xtc-load.de - Autor: unbekannt
	
	require_once(DIR_WS_MODULES . BS4_FILENAME_CATEGORIES_LIST);
	
	$default_smarty->assign('BS4_CATEGORIES_LIST', $module_categories);

}
?>