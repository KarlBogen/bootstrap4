<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

if (defined('MODULE_BS4_TPL_MANAGER_STATUS') && MODULE_BS4_TPL_MANAGER_STATUS == 'true') {

	// Listenpunkt unter 'Erw. Konfiguration'
$add_contents[BOX_HEADING_CONFIGURATION2][MENU_BS4_TPL_MANAGER_MAIN][] = array(
    'admin_access_name' => 'bs4_tpl_manager_config',   //Eintrag fuer Adminrechte
    'filename' => '',        //Dateiname der neuen Admindatei
    'boxname' => MENU_BS4_TPL_MANAGER_MAIN,     //Anzeigename im Menue
    'parameters' => '',                 //zusaetzliche Parameter z.B. 'set=export'
    'ssl' => '',                         //SSL oder NONSSL, kein Eintrag = NONSSL
    'has_subs' => 1                     //wenn Menueeintrag Unterpunkte hat
  );


$add_contents[BOX_HEADING_CONFIGURATION2][MENU_BS4_TPL_MANAGER_MAIN][] = array(
    'admin_access_name' => 'bs4_tpl_manager_config',
    'filename' => FILENAME_BS4_TPL_MANAGER_CONFIG,
    'boxname' => MENU_BS4_TPL_MANAGER_SUB1,
    'parameters' => '',
    'ssl' => ''
  );


$add_contents[BOX_HEADING_CONFIGURATION2][MENU_BS4_TPL_MANAGER_MAIN][] = array(
    'admin_access_name' => 'bs4_tpl_manager_theme',
    'filename' => FILENAME_BS4_TPL_MANAGER_THEME,
    'boxname' => MENU_BS4_TPL_MANAGER_SUB2,
    'parameters' => '',
    'ssl' => ''
  );


$add_contents[BOX_HEADING_CONFIGURATION2][MENU_BS4_TPL_MANAGER_MAIN][] = array(
    'admin_access_name' => 'bs4_banner_manager',
    'filename' => FILENAME_BS4_BANNER_MANAGER,
    'boxname' => MENU_BS4_TPL_MANAGER_SUB3,
    'parameters' => '',
    'ssl' => ''
  );
/* ------------------------------------------------------------
	Module "Attribute Kombination Manager" made by Karl

	inspired by Products Matrix Module (c) Timo Doerr <timo.doerr@work-less.de>

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

	// Listenpunkt unter 'Kunden'
	$add_contents[BOX_HEADING_CUSTOMERS][] = array(
    	'admin_access_name' => 'bs4_customers_remind',   //Eintrag fuer Adminrechte
    	'filename' => 'bs4_customers_remind.php',	//Dateiname der neuen Admindatei
    	'boxname' => BS4_BOX_CUSTOMERS_REMIND,     	//Anzeigename im Menue
    	'parameters' => '',                 	//zusaetzliche Parameter z.B. 'set=export'
    	'ssl' => ''                         	//SSL oder NONSSL, kein Eintrag = NONSSL
  	);

}