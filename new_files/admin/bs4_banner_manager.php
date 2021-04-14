<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */


require('includes/application_top.php');

if (defined('MODULE_BS4_TPL_MANAGER_STATUS') && MODULE_BS4_TPL_MANAGER_STATUS == 'true') {

	$action = (isset($_GET['action']) ? strip_tags($_GET['action']) : '');
	$set = (isset($_GET['set']) ? strip_tags($_GET['set']) : 'banners');

	if (xtc_not_null($action)) {
		switch ($action) {
			case 'setflag':
				if ( ($_GET['flag'] == '0') || ($_GET['flag'] == '1') ) {
				xtc_set_banner_status($_GET['bID'], $_GET['flag']);
				$messageStack->add_session(SUCCESS_BANNER_STATUS_UPDATED, 'success');
				} else {
					$messageStack->add_session(ERROR_UNKNOWN_STATUS_FLAG, 'error');
				}
				xtc_redirect(xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'set=banners&cID=' . (int)$_GET['cID']));
				break;

			case 'update':
				if (isset($_POST['bs4_banner_update'])) {
					$cat_id = xtc_db_prepare_input($_POST['categories_id']);
                    if (isset($_POST['bs4_banner_ids'])) {
						$bs4_banner_ids = implode(',', xtc_db_prepare_input($_POST['bs4_banner_ids']));
						$sql_data_array = array('bs4_banner_ids' => $bs4_banner_ids);
						xtc_db_perform(TABLE_CATEGORIES, $sql_data_array, 'update', "categories_id = '" . (int)$cat_id . "'");
						$messageStack->add_session(BS4_BANNER_DATA_UPDATED, 'success');
					}
					xtc_redirect(xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'set=banners&cID=' . $cat_id));
				}
				if (isset($_POST['bs4_categories_update'])) {
					$cat_id = xtc_db_prepare_input($_POST['cat_id']);
					$bs4_banner_cat_array = array();
					$bs4_banner_cat_array[] = xtc_db_prepare_input($_POST['bs4_control_position']);
					$bs4_banner_cat_array[] = xtc_db_prepare_input($_POST['bs4_control_class']);
					$bs4_banner_cat_array[] = xtc_db_prepare_input($_POST['bs4_control_rounded']);
					$bs4_banner_cat_array[] = xtc_db_prepare_input($_POST['bs4_indicator_position']);
					$bs4_banner_cat_array[] = xtc_db_prepare_input($_POST['bs4_indicator_class']);
					$bs4_banner_cat_array[] = xtc_db_prepare_input($_POST['bs4_indicator_rounded']);
					$bs4_banner_cat_array[] = xtc_db_prepare_input($_POST['bs4_duration']);
			        $bs4_banner_settings = implode(',', $bs4_banner_cat_array);
					$sql_data_array = array('bs4_banner_settings' => $bs4_banner_settings);
					xtc_db_perform(TABLE_CATEGORIES, $sql_data_array, 'update', "categories_id = '" . (int)$cat_id . "'");
					$messageStack->add_session(BS4_BANNER_DATA_UPDATED, 'success');
					xtc_redirect(xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'set=categories&cID=' . $cat_id));
				}
				if (isset($_POST['bs4_default_update'])) {
					$bs4_banner_defaults_array = array();
					$bs4_banner_defaults_array[] = xtc_db_prepare_input($_POST['bs4_control_position']);
					$bs4_banner_defaults_array[] = xtc_db_prepare_input($_POST['bs4_control_class']);
					$bs4_banner_defaults_array[] = xtc_db_prepare_input($_POST['bs4_control_rounded']);
					$bs4_banner_defaults_array[] = xtc_db_prepare_input($_POST['bs4_indicator_position']);
					$bs4_banner_defaults_array[] = xtc_db_prepare_input($_POST['bs4_indicator_class']);
					$bs4_banner_defaults_array[] = xtc_db_prepare_input($_POST['bs4_indicator_rounded']);
					$bs4_banner_defaults_array[] = xtc_db_prepare_input($_POST['bs4_duration']);
        			$bs4_banner_defaults = implode(',', $bs4_banner_defaults_array);
					$sql_data_array = array('config_value' => $bs4_banner_defaults);
					xtc_db_perform(TABLE_BS4_TPL_MANAGER_CONFIG, $sql_data_array, 'update', "config_key = 'BS4_DEFAULT_BANNER_SETTINGS'");
					$messageStack->add_session(BS4_BANNER_DATA_UPDATED, 'success');
					xtc_redirect(xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'set=default'));
				}
				break;
		}
	}

	//########## FUNCTIONS ##########//

	function bs4_get_banners() {

		$banners_array = array();
		$banners_query = xtDBquery("SELECT banners_id,
											banners_group_id,
											banners_title,
											banners_image,
											banners_group,
											banners_sort,
											languages_id,
											status
									FROM " . TABLE_BANNERS . "
									WHERE languages_id = '".(int)$_SESSION['languages_id']."'
									ORDER BY banners_group, banners_sort, banners_title");
		while ($banners = xtc_db_fetch_array($banners_query,true)) {
			$banners_array[] = $banners;
		}

		return $banners_array;
	}

	function bs4_get_category_tree($parent_id = '0', $spacing = '', $exclude = '', $category_tree_array = '', $include_itself = false, $cPath = '') {

		if ($parent_id == 0){
			$cPath = '';
		} else {
			$cPath .= $parent_id . '_';
		}
		if (!is_array($category_tree_array)) {
			$category_tree_array = array();
		}

		$categories_query = xtDBquery("SELECT c.categories_id,
											cd.categories_name,
											c.parent_id,
											c.categories_image,
											c.bs4_banner_ids,
											c.bs4_banner_settings
									FROM " . TABLE_CATEGORIES . " c
									JOIN " . TABLE_CATEGORIES_DESCRIPTION . " cd
										ON c.categories_id = cd.categories_id
										AND cd.language_id = ".(int)$_SESSION['languages_id']."
										AND trim(cd.categories_name) != ''
									WHERE c.parent_id = '".(int)$parent_id."'
										AND c.categories_status = '1'
									ORDER BY c.sort_order, cd.categories_name");
		while ($categories = xtc_db_fetch_array($categories_query,true)) {
			if ($exclude != $categories['categories_id']) {
				$category_tree_array[] = array(
					'cat_id' => $categories['categories_id'],
					'cat_image' => $categories['categories_image'] ? $categories['categories_image'] : 'noimage.gif',
					'cat_title' => $spacing . $categories['categories_name'],
					'bs4_banner_ids' => $categories['bs4_banner_ids'],
					'bs4_banner_settings' => $categories['bs4_banner_settings'],
				);
				$category_tree_array = bs4_get_category_tree($categories['categories_id'], '>' . $spacing . '&nbsp;&nbsp;&nbsp;', $exclude, $category_tree_array, false, $cPath);
			}
		}

		return $category_tree_array;
	}

	function bs4_get_bannerTable($banners, $active, $cID) {

		$languages = xtc_get_languages();

		$lang_array = array();
		$lang_array_id = array();
		for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
			$lang_array[] = array('id' => $languages[$i]['id'], 'text' => $languages[$i]['name']);
			$lang_array_id[$languages[$i]['id']] = $languages[$i]['name'];
		}

		$haystack = explode(',', $active);

		$banners_string='';
		$banners_string .= '<table class="tableBoxCenter collapse show">';
		$banners_string .= '	<tbody>';
		$banners_string .= '		<tr class="dataTableHeadingRow">';
		$banners_string .= '			<td class="dataTableHeadingContent txta-c" style="width:40px;">&nbsp;</td>';
		$banners_string .= '			<td class="dataTableHeadingContent">' . BS4_TABLE_HEADING_IMAGE . '</td>';
		$banners_string .= '			<td class="dataTableHeadingContent">' . BS4_TABLE_HEADING_BANNERS . '</td>';
		$banners_string .= '			<td class="dataTableHeadingContent txta-c">' . BS4_TABLE_HEADING_GROUPS . '</td>';
		$banners_string .= '			<td class="dataTableHeadingContent txta-c">' . BS4_TABLE_HEADING_STATUS . '</td>';
		$banners_string .= '		</tr>';

		for ($i=0;$n=sizeof($banners),$i<$n;$i++) {
			$checked = '';
			if(in_array($banners[$i]['banners_id'], $haystack)) {
				$checked = ' checked';
			}

			$banners_string .= '		<tr>';
			$banners_string .= '			<td class="dataTableContent txta-c">' . xtc_draw_checkbox_field('bs4_banner_ids[]', $banners[$i]['banners_id'], $checked) . '</td>';
			$banners_string .= '			<td class="dataTableContent"><img style="border:0;max-width:180px;max-height:50px;" src="' . DIR_WS_CATALOG_IMAGES . 'banner/'.(($banners[$i]['banners_image'] != '') ? $banners[$i]['banners_image'] : 'noimage.gif') . '" /></td>';
			$banners_string .= '			<td class="dataTableContent">' . $banners[$i]['banners_title'] . '</td>';
			$banners_string .= '			<td class="dataTableContent txta-c">' . $banners[$i]['banners_group'] . '</td>';
			$banners_string .= '			<td class="dataTableContent txta-c">';
			if ($banners[$i]['status'] == '1') {
				$banners_string .= xtc_image(DIR_WS_IMAGES . 'icon_status_green.gif', IMAGE_ICON_STATUS_GREEN, 10, 10) . '&nbsp;&nbsp;<a href="' . xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'bID=' . $banners[$i]['banners_group_id'] . '&action=setflag&flag=0&cID=' . $cID) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_status_red_light.gif', IMAGE_ICON_STATUS_RED_LIGHT, 10, 10) . '</a>';
			} else {
				$banners_string .= '<a href="' . xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'bID=' . $banners[$i]['banners_group_id'] . '&action=setflag&flag=1&cID=' . $cID) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_status_green_light.gif', IMAGE_ICON_STATUS_GREEN_LIGHT, 10, 10) . '</a>&nbsp;&nbsp;' . xtc_image(DIR_WS_IMAGES . 'icon_status_red.gif', IMAGE_ICON_STATUS_RED, 10, 10);
			}
			$banners_string .= '</td>';
			$banners_string .= '		</tr>';
		}

		$banners_string .= '	</tbody>';
		$banners_string .= '</table>';

		return $banners_string;
	}

	function bs4_get_classNames($for = 'btn') {

		$classNames = array(
			'primary',
			'secondary',
			'success',
			'danger',
			'warning',
			'info',
			'light',
			'dark',
		);
		if ($for != 'btn') $classNames[] = 'white';

    	return $classNames;
	}

	function bs4_get_controlPosition($type = 'control', $active = 'n') {

		$positions = array('n' => BS4_BANNER_CONTROL_NO, 'j1' => BS4_BANNER_CONTROL_INSIDE, 'j2' => BS4_BANNER_CONTROL_OUTSIDE);
		$radios = '';
		foreach ($positions as $key => $val) {
			$radios .= '<span class="d-inline-block mb-1" title="' . $val . '">' . xtc_draw_radio_field('bs4_' . $type . '_position', $key, '', $active) . '&nbsp;<span class="btn-sm">' . $val . '</span>&nbsp;&nbsp;</span>';
		}

    	return $radios;
	}

	function bs4_get_controlRadios($type = 'control', $active = 'btn-primary') {

		$radios = '';
		// Text-Klassen
		if ($type == 'control') {
			$classes = bs4_get_classNames('text');
			foreach ($classes as $class) {
				$radios .= '<span class="d-inline-block mb-1" title="text-' . $class . '">' . xtc_draw_radio_field('bs4_' . $type . '_class', 'text-' . $class, '', $active) . '&nbsp;<span class="text-' . $class . ' btn-sm">&lt;</span>&nbsp;&nbsp;</span>';
			}
		}
		// Button-Klassen
		$classes = bs4_get_classNames();
        if ($type != 'control') $classes[] = 'white';
		foreach ($classes as $class) {
			$radios .= '<span class="d-inline-block mb-1" title="' . ($type == 'control' ? 'btn-' : 'bg-') . $class . '">' . xtc_draw_radio_field('bs4_' . $type . '_class', ($type == 'control' ? 'btn-' : 'bg-') . $class, '', $active) . '&nbsp;<span class="btn btn-' . $class . ' btn-sm">' . ($type == 'control' ? '&lt' : '&nbsp;') . '</span>&nbsp;&nbsp;</span>';
		}
		// Button-Klassen
		if ($type == 'control') {
			$classes = bs4_get_classNames();
			foreach ($classes as $class) {
				$radios .= '<span class="d-inline-block mb-1" title="btn-outline-' . $class . '">' . xtc_draw_radio_field('bs4_' . $type . '_class', 'btn-outline-' . $class, '', $active) . '&nbsp;<span class="btn btn-outline-' . $class . ' btn-sm">&lt;</span>&nbsp;&nbsp;</span>';
			}
		}

    	return $radios;
	}

	function bs4_get_controlRounded($type = 'control', $active = 'n') {

		$radios = '';
		$radios .= '<span class="d-inline-block mb-1" title="' . CFG_TXT_NO . '">' . xtc_draw_radio_field('bs4_' . $type . '_rounded', 'n', '', $active) . '&nbsp;<span class="btn btn-primary btn-sm">' . CFG_TXT_NO . '</span>&nbsp;&nbsp;</span>';
		$radios .= '<span class="d-inline-block mb-1" title="' . CFG_TXT_YES . '">' . xtc_draw_radio_field('bs4_' . $type . '_rounded', 'j', '', $active) . '&nbsp;<span class="btn btn-primary rounded-circle btn-sm">' . CFG_TXT_YES . '</span>&nbsp;&nbsp;</span>';

    	return $radios;
	}

	function bs4_get_Duration($active = '4000') {

		$bs4_duration_data = array();
		for ($i=2;$i<11;$i++) {
			$bs4_duration_data[] = array('id' => $i*1000, 'text' => $i . '&nbsp;' . BS4_BANNER_SECONDS);
		}
		$bs4_duration = '<div class="pdg2">' . xtc_draw_pull_down_menu('bs4_duration', $bs4_duration_data, (int)$active) . '</div>';

    	return $bs4_duration;
	}

	function bs4_convertSettings($settings) {

		$conv_settings = array(
			'bs4_control_position' => $settings[0],
            'bs4_control_class' => $settings[1],
            'bs4_control_rounded' => $settings[2],
            'bs4_indicator_position' => $settings[3],
            'bs4_indicator_class' => $settings[4],
            'bs4_indicator_rounded' => $settings[5],
            'bs4_duration' => $settings[6],
		);

    	return $conv_settings;
	}

	// Kategoriebaum setzen
	$cat_tree_array = bs4_get_category_tree('0','>&nbsp;','0');

// Beginn der Ausgabe
require_once (DIR_WS_INCLUDES.'head.php');
?>
	<link type="text/css" href="includes/bs4_template_manager/assets/css/bs4_banner_manager.css" rel="stylesheet">
</head>
<body>
	<!-- header //-->
	<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
	<!-- header_eof //-->

	<!-- body //-->
	<table class="tableBody bs4">
		<tr>
		<?php //left_navigation
			if (USE_ADMIN_TOP_MENU == 'false') {
				echo '<td class="columnLeft2">'.PHP_EOL;
				echo '<!-- left_navigation //-->'.PHP_EOL;
				require_once(DIR_WS_INCLUDES . 'column_left.php');
				echo '<!-- left_navigation eof //-->'.PHP_EOL;
				echo '</td>'.PHP_EOL;
			}
		?>
			<!-- body_text //-->
			<td class="boxCenter">
				<div class="pageHeadingImage"><?php echo xtc_image(DIR_WS_ICONS.'heading/icon_configuration.png', TEXT_BS4_BANNER_MANAGER_HEADING_TITLE); ?></div>
				<div class="flt-l">
					<div class="pageHeading pdg2"><?php echo TEXT_BS4_BANNER_MANAGER_HEADING_TITLE; ?></div>
					<p><?php echo TEXT_BS4_BANNER_MANAGER_INFO; ?></p>
				</div>
				<div class="tableCenter cf clear">
				<?php
					echo xtc_draw_form('config', FILENAME_BS4_BANNER_MANAGER, 'action=update');
						// Menü
						$bannersactive = $set == 'banners' ? ' activ' : '';
						$categoriesactive = $set == 'categories' ? ' activ' : '';
						$defaultactive = $set == 'default' ? ' activ' : '';
						echo '<div class="submenu cf">';
						echo '	<a class="submenutab'.$bannersactive.'" href="' . xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'set=banners') . '">' . TEXT_BS4_BANNER_MANAGER_TAB_BANNER . '</a>';
						echo '	<a class="submenutab'.$categoriesactive.'" href="' . xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'set=categories') . '">' . TEXT_BS4_BANNER_MANAGER_TAB_CATEGORIES . '</a>';
						echo '	<a class="submenutab'.$defaultactive.'" href="' . xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'set=default') . '">' . TEXT_BS4_BANNER_MANAGER_TAB_DEFAULT . '</a>';
						echo '</div>';

					switch($set) {
						case 'banners':
				?>
					<table class="tableCenter">
						<tbody>
							<tr>
								<td class="box50">
									<table class="tableBoxCenter collapse show">
										<tbody>
											<tr class="dataTableHeadingRow">
												<td class="dataTableHeadingContent txta-c" style="width:40px;">ID</td>
								                <?php
								                if( USE_ADMIN_THUMBS_IN_LIST=='true' ) {
								                ?>
								                  <td class="dataTableHeadingContent txta-c" style="width:15%">
								                    <?php echo BS4_CATEGORIES_TABLE_HEADING_IMAGE; ?>
								                  </td>
								                <?php
								                }
								                ?>
												<td class="dataTableHeadingContent txta-c"><?php echo BS4_CATEGORIES_TABLE_HEADING_CATNAME; ?></td>
												<td class="dataTableHeadingContent txta-r" style="width:15%"><?php echo BS4_CATEGORIES_TABLE_HEADING_ACTION; ?>&nbsp;</td>
											</tr>
											<?php
											$banners = bs4_get_banners();
											$cat_tree = $cat_tree_array;
											foreach ($cat_tree as $cat) {
												if ((!isset($_GET['cID']) || (isset($_GET['cID']) && ($_GET['cID'] == $cat['cat_id']))) && !isset($bInfo)) {
													$bInfo_array = $cat;
													$bInfo = new objectInfo($bInfo_array);
												}
												if (isset($bInfo) && is_object($bInfo) && ($cat['cat_id'] == $bInfo->cat_id) ) {
													$tr_attributes = 'class="dataTableRowSelected" onmouseover="this.style.cursor=\'pointer\'"';
												} else {
													$tr_attributes = 'class="dataTableRow" onmouseover="this.className=\'dataTableRowOver\';this.style.cursor=\'pointer\'" onmouseout="this.className=\'dataTableRow\'" onclick="document.location.href=\'' . xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'set=banners&cID=' . $cat['cat_id']) . '\'"';
												}
												?>
												<tr <?php echo $tr_attributes;?>>
													<td class="dataTableContent txta-c"><?php echo $cat['cat_id'] > 0 ? $cat['cat_id'] : ''; ?></td>
								                   <?php
								                   if ( USE_ADMIN_THUMBS_IN_LIST=='true' ) {
								                    ?>
								                     <td class="dataTableContent txta-c" style="height:43px;">
								                       <?php
								                       echo xtc_info_image_c($cat['cat_image'], $cat['cat_image'], '','','style="max-width: 40px; max-height: 40px;"');
								                    ?>
								                     </td>
								                     <?php
								                   }
								                   ?>
													<td class="dataTableContent"><?php echo $cat['cat_title']; ?></td>
													<td class="dataTableContent txta-r"><?php if (isset($bInfo) && is_object($bInfo) && ($cat['cat_id'] == $bInfo->cat_id) ) { echo xtc_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ICON_ARROW_RIGHT); } else { echo '<a href="' . xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'set=banners&cID=' . $cat['cat_id']) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_arrow_grey.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
												</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								</td>
								<?php
								$heading = array();
								$contents = array();
								if (isset($bInfo) && is_object($bInfo)) {
									$heading[] = array('text' => '<b>' . $bInfo->cat_title . '</b>');
									$contents[] = array('align' => 'center', 'text' => '<input type="submit" class="button" name="bs4_banner_update" onclick="this.blur();" value="' . BUTTON_UPDATE . '"/><input type="hidden" name="categories_id" value="' . $bInfo->cat_id . '"/>');
									// Banner
									$banners_string = bs4_get_bannerTable($banners, $bInfo->bs4_banner_ids, $bInfo->cat_id);
									$contents[] = array('text' => $banners_string.'<br />');
									// Ende Banner
									$contents[] = array('align' => 'center', 'text' => '<input type="submit" class="button" name="bs4_banner_update" onclick="this.blur();" value="' . BUTTON_UPDATE . '"/>');
								}
								if ( (xtc_not_null($heading)) && (xtc_not_null($contents)) ) {
									echo '								<td class="box50">' . "\n";
									$box = new box;
									echo $box->infoBox($heading, $contents);
									echo '								</td>' . "\n";
								}
								?>
							</tr>
						</tbody>
					</table>
					<?php
						break;

					case 'categories':
					?>
					<table class="tableCenter">
						<tbody>
							<tr>
								<td class="boxCenterLeft">
									<table class="tableBoxCenter collapse show">
										<tbody>
											<tr class="dataTableHeadingRow">
												<td class="dataTableHeadingContent txta-c" style="width:40px;">ID</td>
								                <?php
								                if( USE_ADMIN_THUMBS_IN_LIST=='true' ) {
								                ?>
								                  <td class="dataTableHeadingContent txta-c" style="width:15%">
								                    <?php echo BS4_CATEGORIES_TABLE_HEADING_IMAGE; ?>
								                  </td>
								                <?php
								                }
								                ?>
												<td class="dataTableHeadingContent txta-c"><?php echo BS4_CATEGORIES_TABLE_HEADING_CATNAME; ?></td>
												<td class="dataTableHeadingContent txta-r" style="width:15%"><?php echo BS4_CATEGORIES_TABLE_HEADING_ACTION; ?>&nbsp;</td>
											</tr>
											<?php
											$cat_tree = $cat_tree_array;
											foreach ($cat_tree as $cat) {
												$cat_banner_settings = $cat['bs4_banner_settings'] != '' ? $cat['bs4_banner_settings'] : BS4_DEFAULT_BANNER_SETTINGS;
												$cat['bs4_banner_settings'] = bs4_convertSettings(explode(',', $cat_banner_settings));
												if ((!isset($_GET['cID']) || (isset($_GET['cID']) && ($_GET['cID'] == $cat['cat_id']))) && !isset($cInfo)) {
													$cInfo_array = $cat;
													$cInfo = new objectInfo($cInfo_array);
												}
												if (isset($cInfo) && is_object($cInfo) && ($cat['cat_id'] == $cInfo->cat_id) ) {
													$tr_attributes = 'class="dataTableRowSelected" onmouseover="this.style.cursor=\'pointer\'"';
												} else {
													$tr_attributes = 'class="dataTableRow" onmouseover="this.className=\'dataTableRowOver\';this.style.cursor=\'pointer\'" onmouseout="this.className=\'dataTableRow\'" onclick="document.location.href=\'' . xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'set=categories&cID=' . $cat['cat_id']) . '\'"';
												}
											?>
												<tr <?php echo $tr_attributes;?>>
													<td class="dataTableContent txta-c"><?php echo $cat['cat_id'] > 0 ? $cat['cat_id'] : ''; ?></td>
													<?php
													if ( USE_ADMIN_THUMBS_IN_LIST=='true' ) {
													?>
														<td class="dataTableContent txta-c" style="height:43px;">
														<?php
														echo xtc_info_image_c($cat['cat_image'], $cat['cat_image'], '','','style="max-width: 40px; max-height: 40px;"');
														?>
													</td>
							                    	<?php
													}
													?>
													<td class="dataTableContent"><?php echo $cat['cat_title']; ?></td>
													<td class="dataTableContent txta-r"><?php if (isset($cInfo) && is_object($cInfo) && ($cat['cat_id'] == $cInfo->cat_id) ) { echo xtc_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ICON_ARROW_RIGHT); } else { echo '<a href="' . xtc_href_link(FILENAME_BS4_BANNER_MANAGER, 'set=categories&cID=' . $cat['cat_id']) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_arrow_grey.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
												</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								</td>
								<?php
								$heading = array();
								$contents = array();
								if (isset($cInfo) && is_object($cInfo)) {
									$heading[] = array('text' => '<b>' . BS4_BANNER_CATEGORY_SETTINGS . '</b>');
									$contents[] = array('align' => 'left', 'text' => BS4_CLASSES_NOTE . '<br />');
									$contents[] = array('align' => 'center', 'text' => '<input type="submit" class="button" name="bs4_categories_update" onclick="this.blur();" value="' . BUTTON_UPDATE . '"/><input type="hidden" name="cat_id" value="' . $cInfo->cat_id . '"/>');

									// Position für Pfeile vor- / rückwärts
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_CONTROL_POSITIONS . '</b></div>');
									$radios = bs4_get_controlPosition('control', $cInfo->bs4_banner_settings['bs4_control_position']);
									$contents[] = array('text' => '<div class="pdg2">' . $radios . '</div>');
									// Klassen für Pfeile vor- / rückwärts
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_CONTROL_CLASSES . '</b></div>');
									$radios = bs4_get_controlRadios('control', $cInfo->bs4_banner_settings['bs4_control_class']);
									$contents[] = array('text' => '<div class="pdg2" style="background-color:#d9d9d9;">' . $radios . '</div>');
									// Rund Ja/Nein für Pfeile vor- / rückwärts
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_CONTROL_ROUNDED . '</b></div>');
									$radios = bs4_get_controlRounded('control', $cInfo->bs4_banner_settings['bs4_control_rounded']);
									$contents[] = array('text' => '<div class="pdg2">' . $radios . '</div>');

									// Position für Indicators - Bilderregler
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_INDICATOR_POSITIONS . '</b></div>');
									$radios = bs4_get_controlPosition('indicator', $cInfo->bs4_banner_settings['bs4_indicator_position']);
									$contents[] = array('text' => '<div class="pdg2">' . $radios . '</div>');
									// Klassen für Indicators - Bilderregler
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_INDICATOR_CLASSES . '</b></div>');
									$radios = bs4_get_controlRadios('indicator', $cInfo->bs4_banner_settings['bs4_indicator_class']);
									$contents[] = array('text' => '<div class="pdg2" style="background-color:#d9d9d9;">' . $radios . '</div>');
									// Rund Ja/Nein für Indicators - Bilderregler
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_INDICATOR_ROUNDED . '</b></div>');
									$radios = bs4_get_controlRounded('indicator', $cInfo->bs4_banner_settings['bs4_indicator_rounded']);
									$contents[] = array('text' => '<div class="pdg2">' . $radios . '</div>');

									// Bildlaufzeit
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_DURATION . '</b></div>');
									$contents[] = array('text' => bs4_get_Duration($cInfo->bs4_banner_settings['bs4_duration']));

									$contents[] = array('align' => 'center', 'text' => '<input type="submit" class="button" name="bs4_categories_update" onclick="this.blur();" value="' . BUTTON_UPDATE . '"/>');
								}
								if ( (xtc_not_null($heading)) && (xtc_not_null($contents)) ) {
									echo '            <td class="boxRight">' . "\n";
									$box = new box;
									echo $box->infoBox($heading, $contents);
									echo '            </td>' . "\n";
								}
								?>
							</tr>
						</tbody>
					</table>
					<?php
						break;

					case 'default':

					if (defined('BS4_DEFAULT_BANNER_SETTINGS')) {
					?>
					<table class="tableCenter">
						<tbody>
							<tr>
								<td class="boxCenterLeft">
									<table class="tableBoxCenter collapse show">
										<tbody>
											<tr class="dataTableHeadingRow">
												<td class="dataTableHeadingContent txta-c"><?php echo BS4_DEFAULTS_TABLE_HEADING_DESC; ?></td>
											</tr>
											<?php
											$defaults = explode(',', BS4_DEFAULT_BANNER_SETTINGS);
											$conv_settings = bs4_convertSettings($defaults);
											if (!isset($dInfo)) {
												$dInfo_array = $conv_settings;
												$dInfo = new objectInfo($dInfo_array);
											}
											$tr_attributes = 'class="dataTableRowSelected"';
											?>
											<tr <?php echo $tr_attributes;?>>
												<td class="dataTableContent txta-c"><?php echo BS4_BANNER_DEFAULT_SETTINGS; ?></td>
											</tr>
										</tbody>
									</table>
								</td>
								<?php
								$heading = array();
								$contents = array();
								if (isset($dInfo) && is_object($dInfo)) {
									$heading[] = array('text' => '<b>' . BS4_BANNER_DEFAULT_SETTINGS . '</b>');
									$contents[] = array('align' => 'center', 'text' => '<input type="submit" class="button" name="bs4_default_update" onclick="this.blur();" value="' . BUTTON_UPDATE . '"/>');
									$contents[] = array('align' => 'left', 'text' => BS4_CLASSES_NOTE . '<br />');

									// Position für Pfeile vor- / rückwärts
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_CONTROL_POSITIONS . '</b></div>');
									$radios = bs4_get_controlPosition('control', $dInfo->bs4_control_position);
									$contents[] = array('text' => '<div class="pdg2">' . $radios . '</div>');
									// Klassen für Pfeile vor- / rückwärts
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_CONTROL_CLASSES . '</b></div>');
									$radios = bs4_get_controlRadios('control', $dInfo->bs4_control_class);
									$contents[] = array('text' => '<div class="pdg2" style="background-color:#d9d9d9;">' . $radios . '</div>');
									// Rund Ja/Nein für Pfeile vor- / rückwärts
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_CONTROL_ROUNDED . '</b></div>');
									$radios = bs4_get_controlRounded('control', $dInfo->bs4_control_rounded);
									$contents[] = array('text' => '<div class="pdg2">' . $radios . '</div>');

									// Position für Indicators - Bilderregler
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_INDICATOR_POSITIONS . '</b></div>');
									$radios = bs4_get_controlPosition('indicator', $dInfo->bs4_indicator_position);
									$contents[] = array('text' => '<div class="pdg2">' . $radios . '</div>');
									// Klassen für Indicators - Bilderregler
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_INDICATOR_CLASSES . '</b></div>');
									$radios = bs4_get_controlRadios('indicator', $dInfo->bs4_indicator_class);
									$contents[] = array('text' => '<div class="pdg2" style="background-color:#d9d9d9;">' . $radios . '</div>');
									// Rund Ja/Nein für Indicators - Bilderregler
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_INDICATOR_ROUNDED . '</b></div>');
									$radios = bs4_get_controlRounded('indicator', $dInfo->bs4_indicator_rounded);
									$contents[] = array('text' => '<div class="pdg2">' . $radios . '</div>');

									// Bildlaufzeit
									$contents[] = array('text' => '<div style="border-bottom: 1px solid #af417e; margin-bottom: 10px;" class="infoBoxContent"><b>' . BS4_BANNER_DURATION . '</b></div>');
									$contents[] = array('text' => bs4_get_Duration($dInfo->bs4_duration));

									$contents[] = array('align' => 'center', 'text' => '<input type="submit" class="button" name="bs4_default_update" onclick="this.blur();" value="' . BUTTON_UPDATE . '"/>');
								}
								if ( (xtc_not_null($heading)) && (xtc_not_null($contents)) ) {
									echo '            <td class="boxRight">' . "\n";
									$box = new box;
									echo $box->infoBox($heading, $contents);
									echo '            </td>' . "\n";
								}
								?>
							</tr>
						</tbody>
					</table>
					<?php
						} else {
							echo '<h4 class="colorRed">' . BS4_NO_DATA . '</h4>';
						}
						break;

					}
					?>
					</form>
				</div>
			</td>
			<!-- body_text_eof //-->
		</tr>
	</table>
	<!-- body_eof //-->
	<!-- footer //-->
	<?php
		require(DIR_WS_INCLUDES . 'footer.php');
	?>
	<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php');
}
?>