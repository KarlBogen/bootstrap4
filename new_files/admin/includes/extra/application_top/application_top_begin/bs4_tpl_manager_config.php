<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

if (defined('MODULE_BS4_TPL_MANAGER_STATUS') && MODULE_BS4_TPL_MANAGER_STATUS == 'true') {

	// Templateconfiguration laden
	$conf_query = xtc_db_query('select config_key, config_value from ' . TABLE_BS4_TPL_MANAGER_CONFIG . '');
	while ($conf = xtc_db_fetch_array($conf_query)) {
		defined($conf['config_key']) OR define($conf['config_key'], $conf['config_value']);
	}

}
?>