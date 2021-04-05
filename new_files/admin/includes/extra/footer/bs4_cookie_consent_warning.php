<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

// Zeigt einen Hinweis an, falls das Cookie Consent Modul nicht aktiv ist

if (defined('MODULE_BS4_TPL_MANAGER_STATUS') && MODULE_BS4_TPL_MANAGER_STATUS == 'true') {
	if (!defined('MODULE_COOKIE_CONSENT_STATUS') || (defined('MODULE_COOKIE_CONSENT_STATUS') && strtolower(MODULE_COOKIE_CONSENT_STATUS) != 'true')) {

		global $messageStack;

		$link = xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system&module=cookie_consent');
        if (isset($_SESSION['language_code']) && $_SESSION['language_code'] == 'de') {
            $messageStack->add_session('Das Cookie Consent Systemmodul ist entweder nicht installiert oder inaktiv - <a href="'.$link.'"><span class="colorRed"><strong>Link zum Modul</strong></span></a>', 'error');
		} else {
            $messageStack->add_session('The Cookie Consent system module is not installed or is inactive - <a href="'.$link.'"><span class="colorRed"><strong>Link to the module</strong></span></a>', 'error');
        }

	}
}
?>