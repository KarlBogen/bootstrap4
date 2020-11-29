<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

// BS4 Banner Manager

if (defined('MODULE_BS4_TPL_MANAGER_STATUS') && MODULE_BS4_TPL_MANAGER_STATUS == 'true') {

	if (MODULE_BANNER_MANAGER_STATUS == 'true') {

		function bs4_convertSettings($settings) {
			if (is_string($settings)) {
				$settings = explode(',', $settings);
			}
			$conv_settings = array(
				'bs4_control_position' => $settings[0],
	            'bs4_control_class' => $settings[1],
	            'bs4_control_rounded' => $settings[2],
	            'bs4_indicator_position' => $settings[3],
	            'bs4_indicator_class' => $settings[4],
	            'bs4_indicator_rounded' => $settings[5],
	            'bs4_duration' => $settings[6],
			);
			if (strpos($settings[1], 'text') !== false) {
				$conv_settings['bs4_control_text_class'] = 'text-';
			}
	    	return $conv_settings;
		}

		// Slidereinstellungen
		$settings = BS4_DEFAULT_BANNER_SETTINGS;
		$conv_settings = bs4_convertSettings($settings);

		if (isset($smarty) && is_object($smarty)) {
			$smarty->assign('SLIDERSETTINGS', $conv_settings);
      }
	}

}
?>