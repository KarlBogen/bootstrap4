<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

// BS4 Banner Manager

if (defined('MODULE_BS4_TPL_MANAGER_STATUS') && MODULE_BS4_TPL_MANAGER_STATUS == 'true') {

	if (MODULE_BANNER_MANAGER_STATUS == 'true'
		&& isset($category['bs4_banner_ids'])
		&& $category['bs4_banner_ids'] != ''
		)
	{
		require_once(DIR_FS_INC . 'xtc_update_banner_display_count.inc.php');

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

		// Bannerdaten
		$bs4_banner_query = xtc_db_query("SELECT *
											FROM " . TABLE_BANNERS . "
											WHERE banners_image != ''
											AND languages_id = '" . (int)$_SESSION['languages_id'] . "'
											AND banners_id IN (".$category['bs4_banner_ids'].")");
		if (xtc_db_num_rows($bs4_banner_query) > 0) {
			$bs4_banner_content = array();
			while ($bs4_banner = xtc_db_fetch_array($bs4_banner_query)) {
				$bs4_banner_content[] = $bs4_banner;
			}

			// aus xtc_display_banner.inc.php
			$shop_url = xtc_get_top_level_domain(HTTP_SERVER);

			$bs4_banner_array = array();
			foreach ($bs4_banner_content as $bs4_banner) {
				$bs4_banner_url = xtc_get_top_level_domain($bs4_banner['banners_url']);
				$bs4_banner_title = xtc_parse_input_field_data($bs4_banner['banners_title'], array('"' => '&quot;'));

				$bs4_banner_array[] = array(
					'IMAGE' => ((xtc_not_null($bs4_banner['banners_url'])) ? '<a title="'.$bs4_banner_title.'" href="' . xtc_href_link(FILENAME_REDIRECT, 'action=banner&goto=' . $bs4_banner['banners_id']) . '"' . (($shop_url['domain'] != $bs4_banner_url['domain']) ? ' target="_blank" rel="noopener"' : '') . '>' . xtc_image(DIR_WS_IMAGES.'banner/'.$bs4_banner['banners_image'], $bs4_banner['banners_title'], '', '', 'title="'.$bs4_banner['banners_title'].'"') . '</a>' : xtc_image(DIR_WS_IMAGES.'banner/'.$bs4_banner['banners_image'], $bs4_banner['banners_title'], '', '', 'title="'.$bs4_banner['banners_title'].'"')),
					'IMAGE_SRC' => DIR_WS_BASE.DIR_WS_IMAGES.'banner/'.$bs4_banner['banners_image'],
					'LINK' => ((xtc_not_null($bs4_banner['banners_url'])) ? xtc_href_link(FILENAME_REDIRECT, 'action=banner&goto=' . $bs4_banner['banners_id']) : ''),
					'TEXT' => $bs4_banner['banners_html_text'],
					'TITLE' => $bs4_banner_title,
				);
				xtc_update_banner_display_count($bs4_banner['banners_id']);
			}

			// Slidereinstellungen
			$settings = $category['bs4_banner_settings'] != '' ? $category['bs4_banner_settings'] : BS4_DEFAULT_BANNER_SETTINGS;
			$conv_settings = bs4_convertSettings($settings);

			if (isset($module_smarty) && is_object($module_smarty)) {
				$module_smarty->assign('SLIDER', $bs4_banner_array);
				$module_smarty->assign('SLIDERSETTINGS', $conv_settings);
			}
		}
	}
}
?>