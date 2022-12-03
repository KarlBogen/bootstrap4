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
		require_once(DIR_FS_INC . 'xtc_get_banners_url.inc.php');

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
											AND banners_group_id IN (".$category['bs4_banner_ids'].")");
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
				$bs4_banner_link = (($bs4_banner['banners_redirect'] == 0) ? xtc_get_banners_url($bs4_banner['banners_url']) : xtc_href_link(FILENAME_REDIRECT, 'action=banner&goto=' . $bs4_banner['banners_id']));
				$bs4_banner_target = (($shop_url['domain'] != $bs4_banner_url['domain']) ? ' target="_blank" rel="noopener"' : '');
				$bs4_banner_image = (($bs4_banner['banners_image'] != '') ? xtc_image(DIR_WS_IMAGES.'banner/'.$bs4_banner['banners_image'], $bs4_banner['banners_title'], '', '', 'title="'.$bs4_banner['banners_title'].'"') : '');
				$bs4_banner_image_mobile = (($bs4_banner['banners_image_mobile'] != '') ? xtc_image(DIR_WS_IMAGES.'banner/'.$bs4_banner['banners_image_mobile'], $bs4_banner['banners_title'], '', '', 'title="'.$bs4_banner['banners_title'].'"') : '');

				$bs4_banner_array[] = array(
					'IMAGE' => ((xtc_not_null($bs4_banner['banners_url'])) ? '<a title="'.$bs4_banner_title.'" href="'.$bs4_banner_link.'"'.$bs4_banner_target.'>'.$bs4_banner_image.'</a>' : $bs4_banner_image),
					'IMAGE_SRC' => (($bs4_banner['banners_image'] != '') ? DIR_WS_BASE.DIR_WS_IMAGES.'banner/'.$bs4_banner['banners_image'] : ''),
					'IMAGE_IMG' => $bs4_banner_image,
					'IMAGE_SRC_MOBILE' => (($bs4_banner['banners_image_mobile'] != '') ? DIR_WS_BASE.DIR_WS_IMAGES.'banner/'.$bs4_banner['banners_image_mobile'] : ''),
					'IMAGE_IMG_MOBILE' => $bs4_banner_image_mobile,
					'LINK' => ((xtc_not_null($bs4_banner['banners_url'])) ? $bs4_banner_link : ''),
					'TARGET' => $bs4_banner_target,
					'TEXT' => $bs4_banner['banners_html_text'],
					'TITLE' => $bs4_banner_title,
					'GROUP' => $bs4_banner['banners_group'],
				);
				xtc_update_banner_display_count($bs4_banner['banners_id']);
			}

			// Slidereinstellungen
			$settings = $category['bs4_banner_settings'] != '' ? $category['bs4_banner_settings'] : BS4_DEFAULT_BANNER_SETTINGS;
			$conv_settings = bs4_convertSettings($settings);

			if (isset($default_smarty) && is_object($default_smarty)) {
				$default_smarty->assign('SLIDER', $bs4_banner_array);
				$default_smarty->assign('SLIDERSETTINGS', $conv_settings);
			}
		}
	}
}
?>