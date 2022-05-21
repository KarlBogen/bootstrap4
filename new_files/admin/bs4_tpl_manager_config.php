<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */


require('includes/application_top.php');

if (defined('MODULE_BS4_TPL_MANAGER_STATUS') && MODULE_BS4_TPL_MANAGER_STATUS == 'true') {

	// include needed classes
	require_once(DIR_FS_ADMIN.'includes/bs4_template_manager/bs4_tpl_manager_config.php');

	$bs4 = new Bs4TplManager();

	if(isset($_POST['action'])){
		switch($_POST['action']) {
			case 'update':
	            $config_data = $_POST['configuration'];
			    $bs4->set_conf($config_data);
				break;
		}
	}

	// get data
	$bs4_conf = $bs4->get_conf();

	// get input options
	$yes_no_array = 	$bs4->get_yes_no();
	$superfish_level = 	$bs4->get_superfish_level();
	$carousel_show = 	$bs4->get_carousel_show();
	$fade_slide = 		$bs4->get_fade_slide();
	$bg_classes =		$bs4->get_bg_classes();
	$navbar_classes =   $bs4->get_navbar_classes();
	$text_classes =    	$bs4->get_text_classes();
	$traffic_styles =   $bs4->get_traffic_styles();

	// tabs
	$tabs_array = array();
	$tabs_array[] = array('id' => 'header', 'name' => TEXT_BS4_TPL_MANAGER_CONFIG_TAB_HEADER);
	$tabs_array[] = array('id' => 'superfish', 'name' => TEXT_BS4_TPL_MANAGER_CONFIG_TAB_SUPERFISH);
	$tabs_array[] = array('id' => 'slider', 'name' => TEXT_BS4_TPL_MANAGER_CONFIG_TAB_SLIDER);
	$tabs_array[] = array('id' => 'boxes', 'name' => TEXT_BS4_TPL_MANAGER_CONFIG_TAB_BOXES);
	$tabs_array[] = array('id' => 'views', 'name' => TEXT_BS4_TPL_MANAGER_CONFIG_TAB_VIEWS);
	$tabs_array[] = array('id' => 'classes', 'name' => TEXT_BS4_TPL_MANAGER_CONFIG_TAB_CLASSES);
	$tabs_array[] = array('id' => 'modules', 'name' => TEXT_BS4_TPL_MANAGER_CONFIG_TAB_MODULES);
	$tabs_array[] = array('id' => 'mixed', 'name' => TEXT_BS4_TPL_MANAGER_CONFIG_TAB_MIXED);

	$langtabs = '<div class="tablangmenu"><ul>';
	$csstabstyle = 'border: 1px solid #aaaaaa; padding: 4px; width: 99%; margin-top: -1px; margin-bottom: 10px; float: left;background: #F3F3F3;';
	$csstab = '<style type="text/css">' .  '#tab_lang_0' . '{display: block;' . $csstabstyle . '}';
	$csstab_nojs = '<style type="text/css">';
	for ($i = 0, $n = count($tabs_array); $i < $n; $i++) {
		$tabtmp = "\'tab_lang_$i\'," ;
		$tabact = "$(\'#activ_tab\').attr(\'value\', $i);" ;
		$langtabs.= '<li onclick="'.$tabact.' showTab('. $tabtmp. $n.');" style="cursor: pointer;" id="tabselect_' . $i .'">' .$tabs_array[$i]['name'].  '</li>';
		if($i > 0) $csstab .= '#tab_lang_' . $i .'{display: none;' . $csstabstyle . '}';
		$csstab_nojs .= '#tab_lang_' . $i .'{display: block;' . $csstabstyle . '}';
	}
	$csstab .= '</style>';
	$csstab_nojs .= '</style>';
	$langtabs.= '</ul></div>';

    $activ_tab = '';
	if (isset($_POST['activ_tab']))
	{
		$activ_tab = '<script type="text/javascript">$( document ).ready(function() {$("#tabselect_'.$_POST['activ_tab'].'").trigger("click");});</script>';
	}

	$lang_code = $_SESSION["language_code"] == 'de' ? 'de' : 'en';

require_once (DIR_WS_INCLUDES.'head.php');
?>

    <link type="text/css" href="includes/bs4_template_manager/assets/css/bs4_tpl_manager.css" rel="stylesheet">
	<script type="text/javascript" src="includes/lang_tabs_menu/lang_tabs_menu.js"></script>

	<?php
		if (USE_ADMIN_LANG_TABS == 'false') {
			echo ($csstab_nojs);
		}
	?>
	<noscript>
		<?php echo ($csstab_nojs);?>
	</noscript>
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
				<?php // updateinfo
					if ($bs4_conf['BS4_STARTPAGE_BOX_SHIPPING_COUNTRY'] == '') {
						echo '<div class="messageStackWarning"><h3>' . TEXT_BS4_TPL_MANAGER_CONFIG_UPDATE_SYSTEMMODULE_WARNING .'<a class="button but_red" href="'. xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system&module=bs4_tpl_manager') . '">Bootstrap 4 Template-Manager</a></h3></div><br />';
					}
				?>
				<div class="pageHeadingImage"><?php echo xtc_image(DIR_WS_ICONS.'heading/icon_configuration.png', TEXT_BS4_TPL_MANAGER_CONFIG_HEADING_TITLE); ?></div>
				<div class="flt-l">
					<div class="pageHeading pdg2"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_HEADING_TITLE; ?></div>
					<p><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_INFO; ?></p>
				</div>
				<div class="admin_container cf clear">
				<?php
					echo xtc_draw_form('config', basename($PHP_SELF), xtc_get_all_get_params(array('action')));
					echo '<input id="activ_tab" type="hidden" value="0" name="activ_tab">';
					echo xtc_draw_hidden_field('action', 'update');
					if (USE_ADMIN_LANG_TABS != 'false') {
					?>
						<script type="text/javascript">
							$.get("includes/lang_tabs_menu/lang_tabs_menu.css", function(css) {
								$("head").append("<style type='text/css'>"+css+"<\/style>");
							});
							document.write('<?php echo ($csstab);?>');
							document.write('<?php echo ($langtabs);?>');
						</script>
					<?php
					}
					for ($i = 0, $n = count($tabs_array); $i < $n; $i++) {
						echo ('<div id="tab_lang_' . $i . '">');
						switch($tabs_array[$i]['id']) {
							case 'header':
					?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP1; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SHOW_TOP1'], 'BS4_SHOW_TOP1'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_INFO; ?></td>
			        		</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP2; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SHOW_TOP2'], 'BS4_SHOW_TOP2'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP3; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SHOW_TOP3'], 'BS4_SHOW_TOP3'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP3_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP4; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SHOW_TOP4'], 'BS4_SHOW_TOP4'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP4_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SHOW_JS_DISABLED; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SHOW_JS_DISABLED'], 'BS4_SHOW_JS_DISABLED'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SHOW_JS_DISABLED_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_LOGO; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS4_SHOP_LOGO]', $bs4_conf['BS4_SHOP_LOGO']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_LOGO_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SEARCHFIELD_PERMANENT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SEARCHFIELD_PERMANENT'], 'BS4_SEARCHFIELD_PERMANENT'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SEARCHFIELD_PERMANENT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SHOW_ICON_WITH_NAMES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SHOW_ICON_WITH_NAMES'], 'BS4_SHOW_ICON_WITH_NAMES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SHOW_ICON_WITH_NAMES_INFO; ?></td>
							</tr>
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs4_template_manager/assets/img/bs4_header_neu_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

								case 'superfish':
					?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_MENUBAR_SMALLSCREEN; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_MENUBAR_FIXEDTOP; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_MENUBAR_FIXEDTOP'], 'BS4_MENUBAR_FIXEDTOP'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_MENUBAR_FIXEDTOP_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FIXEDTOP_CLASSES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS4_MENUBAR_FIXEDTOP_CLASSES]', $bs4_conf['BS4_MENUBAR_FIXEDTOP_CLASSES']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FIXEDTOP_CLASSES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_LOGOBAR_FIXEDTOP; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_LOGOBAR_FIXEDTOP'], 'BS4_LOGOBAR_FIXEDTOP'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_LOGOBAR_FIXEDTOP_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_RESPONSIVEMENU; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_RESPONSIVE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_RESPONSIVEMENU_SHOW'], 'BS4_RESPONSIVEMENU_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_RESPONSIVE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISHMENU; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SUPERFISHMENU_SHOW'], 'BS4_SUPERFISHMENU_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOUCH_USE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_TOUCH_USE'], 'BS4_TOUCH_USE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOUCH_USE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_MAXLEVEL_IN_TOPCATMENU]', $superfish_level, $bs4_conf['BS4_MAXLEVEL_IN_TOPCATMENU']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCTSINCAT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SHOW_PRODUCTS_IN_TOPCATMENU'], 'BS4_SHOW_PRODUCTS_IN_TOPCATMENU'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCTSINCAT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_HOMEBUTTON; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SHOW_HOMEBUTTON_IN_TOPCATMENU'], 'BS4_SHOW_HOMEBUTTON_IN_TOPCATMENU'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_HOMEBUTTON_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_ADD_LINK; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS4_ADD_LINK_IN_TOPCATMENU_LAST]', $bs4_conf['BS4_ADD_LINK_IN_TOPCATMENU_LAST']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_ADD_LINK_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_MEGAS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS4_KK_MEGAS]', $bs4_conf['BS4_KK_MEGAS']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_MEGAS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_CATEGORIESMENU_MAXLEVEL]', $superfish_level, $bs4_conf['BS4_CATEGORIESMENU_MAXLEVEL']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_CATEGORIESMENU_AJAX'], 'BS4_CATEGORIESMENU_AJAX'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_SCROLL; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_CATEGORIESMENU_AJAX_SCROLL'], 'BS4_CATEGORIESMENU_AJAX_SCROLL'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_SCROLL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_POSITION_LEFT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_CATEGORIESMENU_POSITION_LEFT'], 'BS4_CATEGORIESMENU_POSITION_LEFT'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_POSITION_LEFT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_ALL_MENUS; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_SPECIALS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SPECIALS_CATEGORIES'], 'BS4_SPECIALS_CATEGORIES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_SPECIALS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_WHATSNEW_CATEGORIES'], 'BS4_WHATSNEW_CATEGORIES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_WHATSNEW_SPECIALS_UPPERCASE'], 'BS4_WHATSNEW_SPECIALS_UPPERCASE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_HIDE_EMPTY_CATEGORIES'], 'BS4_HIDE_EMPTY_CATEGORIES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs4_template_manager/assets/img/bs4_menu1_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

								case 'slider':
                    ?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_CAROUSEL_SHOW]', $carousel_show, $bs4_conf['BS4_CAROUSEL_SHOW']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_FADE; ?></td>
								<td class="dataTableConfig col-middle"><?php echo draw_on_off_selection('configuration[BS4_CAROUSEL_FADE]', $fade_slide, $bs4_conf['BS4_CAROUSEL_FADE']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_FADE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_TOP_PROD_IN_SLIDER'], 'BS4_TOP_PROD_IN_SLIDER'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_FADE; ?></td>
								<td class="dataTableConfig col-middle"><?php echo draw_on_off_selection('configuration[BS4_TOPCAROUSEL_FADE]', $fade_slide, $bs4_conf['BS4_TOPCAROUSEL_FADE']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_FADE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_NAME_LINES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_TOPCAROUSEL_NAME_LINES]', array(array('id' => 0, 'text' => '0'), array('id' => 1, 'text' => '1'), array('id' => 2, 'text' => '2'), array('id' => 3, 'text' => '3'), array('id' => 4, 'text' => '4')), $bs4_conf['BS4_TOPCAROUSEL_NAME_LINES']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_NAME_LINES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_BSCAROUSEL_SHOW'], 'BS4_BSCAROUSEL_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_FADE; ?></td>
								<td class="dataTableConfig col-middle"><?php echo draw_on_off_selection('configuration[BS4_BSCAROUSEL_FADE]', $fade_slide, $bs4_conf['BS4_BSCAROUSEL_FADE']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_FADE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_NAME_LINES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_BSCAROUSEL_NAME_LINES]', array(array('id' => 0, 'text' => '0'), array('id' => 1, 'text' => '1'), array('id' => 2, 'text' => '2'), array('id' => 3, 'text' => '3'), array('id' => 4, 'text' => '4')), $bs4_conf['BS4_BSCAROUSEL_NAME_LINES']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_NAME_LINES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs4_template_manager/assets/img/bs4_slider_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

								case 'boxes':
                    ?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOXES; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CATEGORIES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_CATEGORIES'], 'BS4_STARTPAGE_BOX_CATEGORIES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CATEGORIES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_ADD_QUICKIE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_ADD_QUICKIE'], 'BS4_STARTPAGE_BOX_ADD_QUICKIE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_ADD_QUICKIE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LOGIN; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_LOGIN'], 'BS4_STARTPAGE_BOX_LOGIN'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LOGIN_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_WHATSNEW'], 'BS4_STARTPAGE_BOX_WHATSNEW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_SPECIALS'], 'BS4_STARTPAGE_BOX_SPECIALS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LAST_VIEWED; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_LAST_VIEWED'], 'BS4_STARTPAGE_BOX_LAST_VIEWED'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LAST_VIEWED_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_REVIEWS'], 'BS4_STARTPAGE_BOX_REVIEWS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CUSTOM; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_CUSTOM'], 'BS4_STARTPAGE_BOX_CUSTOM'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CUSTOM_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_MANUFACTURERS'], 'BS4_STARTPAGE_BOX_MANUFACTURERS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS_INFOS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_MANUFACTURERS_INFO'], 'BS4_STARTPAGE_BOX_MANUFACTURERS_INFO'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS_INFO_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CURRENCIES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_CURRENCIES'], 'BS4_STARTPAGE_BOX_CURRENCIES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CURRENCIES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SHIPPING_COUNTRY; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_SHIPPING_COUNTRY'], 'BS4_STARTPAGE_BOX_SHIPPING_COUNTRY'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SHIPPING_COUNTRY_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_INFOBOX; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_INFOBOX'], 'BS4_STARTPAGE_BOX_INFOBOX'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_INFOBOX_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_HISTORY; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_HISTORY'], 'BS4_STARTPAGE_BOX_HISTORY'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_HISTORY_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_TRUSTEDSHOPS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_BOX_TRUSTEDSHOPS'], 'BS4_STARTPAGE_BOX_TRUSTEDSHOPS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_TRUSTEDSHOPS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOXES; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CATEGORIES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_CATEGORIES'], 'BS4_NOT_STARTPAGE_BOX_CATEGORIES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CATEGORIES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_ADD_QUICKIE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_ADD_QUICKIE'], 'BS4_NOT_STARTPAGE_BOX_ADD_QUICKIE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_ADD_QUICKIE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LOGIN; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_LOGIN'], 'BS4_NOT_STARTPAGE_BOX_LOGIN'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LOGIN_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_WHATSNEW; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_WHATSNEW'], 'BS4_NOT_STARTPAGE_BOX_WHATSNEW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_WHATSNEW_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SPECIALS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_SPECIALS'], 'BS4_NOT_STARTPAGE_BOX_SPECIALS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SPECIALS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_LAST_VIEWED'], 'BS4_NOT_STARTPAGE_BOX_LAST_VIEWED'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_REVIEWS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_REVIEWS'], 'BS4_NOT_STARTPAGE_BOX_REVIEWS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_REVIEWS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CUSTOM; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_CUSTOM'], 'BS4_NOT_STARTPAGE_BOX_CUSTOM'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CUSTOM_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_MANUFACTURERS'], 'BS4_NOT_STARTPAGE_BOX_MANUFACTURERS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS_INFOS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO'], 'BS4_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CURRENCIES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_CURRENCIES'], 'BS4_NOT_STARTPAGE_BOX_CURRENCIES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CURRENCIES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SHIPPING_COUNTRY; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_SHIPPING_COUNTRY'], 'BS4_NOT_STARTPAGE_BOX_SHIPPING_COUNTRY'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SHIPPING_COUNTRY_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_INFOBOX; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_INFOBOX'], 'BS4_NOT_STARTPAGE_BOX_INFOBOX'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_INFOBOX_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_HISTORY; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_HISTORY'], 'BS4_NOT_STARTPAGE_BOX_HISTORY'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_HISTORY_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_TRUSTEDSHOPS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_NOT_STARTPAGE_BOX_TRUSTEDSHOPS'], 'BS4_NOT_STARTPAGE_BOX_TRUSTEDSHOPS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_TRUSTEDSHOPS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_ALL_BOXES; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left bg_notice"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_ALL_BOXES; ?></td>
				                <td class="dataTableConfig col-middle bg_notice"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_HIDE_ALL_BOXES'], 'BS4_HIDE_ALL_BOXES'); ?></td>
				                <td class="dataTableConfig col-right bg_notice"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_ALL_BOXES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs4_template_manager/assets/img/bs4_boxes_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

								case 'views':
                    ?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_FULLCONTENT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_FULLCONTENT'], 'BS4_STARTPAGE_FULLCONTENT'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_FULLCONTENT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_SHOW_CATEGORYLIST; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_STARTPAGE_SHOW_CATEGORYLIST'], 'BS4_STARTPAGE_SHOW_CATEGORYLIST'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_SHOW_CATEGORYLIST_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PROD_LIST_FULLCONTENT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_PROD_LIST_FULLCONTENT'], 'BS4_PROD_LIST_FULLCONTENT'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PROD_LIST_FULLCONTENT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_PROD_DETAIL_FULLCONTENT'], 'BS4_PROD_DETAIL_FULLCONTENT'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_PROD_DETAIL_SHOW_MANUIMAGE'], 'BS4_PROD_DETAIL_SHOW_MANUIMAGE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_STARTPAGE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_PRODUCT_LIST_BOX_STARTPAGE'], 'BS4_PRODUCT_LIST_BOX_STARTPAGE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_STARTPAGE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_PROD_LIST_BOX'], 'BS4_PROD_LIST_BOX'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_PRODUCT_INFO_BOX'], 'BS4_PRODUCT_INFO_BOX'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs4_template_manager/assets/img/bs4_views_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

								case 'classes':
					?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_NAVBAR; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_TOP1_NAVBAR]', $navbar_classes, $bs4_conf['BS4_TOP1_NAVBAR']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_NAVBAR_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_BG; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_TOP1_BG]', $bg_classes, $bs4_conf['BS4_TOP1_BG']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_BG_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_TEXT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_TOP1_TEXT]', $text_classes, $bs4_conf['BS4_TOP1_TEXT']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_TEXT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_LOGOBAR_TEXT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_LOGOBAR_TEXT]', $text_classes, $bs4_conf['BS4_LOGOBAR_TEXT']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_LOGOBAR_TEXT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_NAVBAR; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_TOP2_NAVBAR]', $navbar_classes, $bs4_conf['BS4_TOP2_NAVBAR']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_NAVBAR_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_BG; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_TOP2_BG]', $bg_classes, $bs4_conf['BS4_TOP2_BG']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_BG_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_NAVBAR; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_FOOTER_NAVBAR]', $navbar_classes, $bs4_conf['BS4_FOOTER_NAVBAR']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_NAVBAR_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_BG; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_FOOTER_BG]', $bg_classes, $bs4_conf['BS4_FOOTER_BG']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_BG_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs4_template_manager/assets/img/bs4_classes_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
						<?php
								break;

								case 'modules':
                    ?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_CUSTOMERS_REMIND'], 'BS4_CUSTOMERS_REMIND'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_CUSTOMERS_REMIND_SENDMAIL'], 'BS4_CUSTOMERS_REMIND_SENDMAIL'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CHEAPLY_SEE; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CHEAPLY_SEE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_CHEAPLY_SEE'], 'BS4_CHEAPLY_SEE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_CHEAPLY_SEE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_PRODUCT_INQUIRY'], 'BS4_PRODUCT_INQUIRY'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_ATTR_PRICE_UPDATER'], 'BS4_ATTR_PRICE_UPDATER'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_ATTR_PRICE_UPDATER_UPDATE_PRICE'], 'BS4_ATTR_PRICE_UPDATER_UPDATE_PRICE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER_UPDATE_PRICE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_AGI_REDUCE_CART'], 'BS4_AGI_REDUCE_CART'); ?></td>
				                <td class="dataTableConfig col-right">
								<?php
                            		$txt = '';
									if(STOCK_CHECK == 'false' || STOCK_ALLOW_CHECKOUT == 'true') {
								    	$txt .= '<p style="color:orange">';
								    	if(STOCK_CHECK == 'false') $txt .= TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_ACTIVATE.' <a href="configuration.php?gID=9">'.TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_CHECK.'</a><br />';
								    	if(STOCK_ALLOW_CHECKOUT == 'true') $txt .= TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_DEACTIVATE.' <a href="configuration.php?gID=9">'.TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_ALLOW_CHECKOUT.'</a><br />';
								    	$txt .= '</p>';
								    }
									echo $txt . TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART_INFO;
								?>
								</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_AGI_REDUCE_CART_SHOW_AVAILABLE'], 'BS4_AGI_REDUCE_CART_SHOW_AVAILABLE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1.TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_2; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_AWIDSRATINGBREAKDOWN'], 'BS4_AWIDSRATINGBREAKDOWN'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_AWIDSRATINGBREAKDOWN_PRODLIST'], 'BS4_AWIDSRATINGBREAKDOWN_PRODLIST'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_PRODLIST_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS'], 'BS4_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_AWIDSRATINGBREAKDOWN_URL'], 'BS4_AWIDSRATINGBREAKDOWN_URL'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_URL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_TRAFFIC_LIGHTS'], 'BS4_TRAFFIC_LIGHTS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_TRAFFIC_LIGHTS_PRODLISTING]', $traffic_styles, $bs4_conf['BS4_TRAFFIC_LIGHTS_PRODLISTING']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODLIST_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_TRAFFIC_LIGHTS_PRODINFO]', $traffic_styles, $bs4_conf['BS4_TRAFFIC_LIGHTS_PRODINFO']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODINFO_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_TRAFFIC_LIGHTS_PRODATTRIBUTES]', $traffic_styles, $bs4_conf['BS4_TRAFFIC_LIGHTS_PRODATTRIBUTES']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODATTR_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS4_MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL]', $bs4_conf['BS4_MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_STOCK_RED_YELL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS4_MODULE_TRAFFIC_LIGHTS_STOCK_GREEN]', $bs4_conf['BS4_MODULE_TRAFFIC_LIGHTS_STOCK_GREEN']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_STOCK_GREEN_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs4_template_manager/assets/img/bs4_modules_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

							case 'mixed':
                    ?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PICTURESET_ACTIVE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_PICTURESET_ACTIVE'], 'BS4_PICTURESET_ACTIVE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_PICTURESET_ACTIVE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_NEW; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_FLAG_NEW_SHOW'], 'BS4_FLAG_NEW_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_NEW_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_TOP; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_FLAG_TOP_SHOW'], 'BS4_FLAG_TOP_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_TOP_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_SPECIAL; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_FLAG_SPECIAL_SHOW'], 'BS4_FLAG_SPECIAL_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_SPECIAL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_PERCENT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_FLAG_PERCENT_SHOW'], 'BS4_FLAG_PERCENT_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_PERCENT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_ADVANCED_JS_VALIDATION; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_ADVANCED_JS_VALIDATION'], 'BS4_ADVANCED_JS_VALIDATION'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_ADVANCED_JS_VALIDATION_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_USE_EASYZOOM; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_USE_EASYZOOM'], 'BS4_USE_EASYZOOM'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_USE_EASYZOOM_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_FILTERCOLOR_AKTIV]', $bg_classes, $bs4_conf['BS4_FILTERCOLOR_AKTIV']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs4_conf['BS4_SEARCHFIELD_ONE_ROW'], 'BS4_SEARCHFIELD_ONE_ROW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs4_template_manager/assets/img/bs4_mixed_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

							}
							echo ('</div>');
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
		// setzt den aktiven Tab
		if ($activ_tab != '') echo $activ_tab;
		require(DIR_WS_INCLUDES . 'footer.php');
	?>
	<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php');

}
?>