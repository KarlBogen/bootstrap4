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
	require_once(DIR_FS_ADMIN.'includes/bs4_template_manager/assets/desc/fontinfo.php');


	$bs4 = new Bs4TplManager();

	if(isset($_POST['action'])){
		switch($_POST['action']) {
			case 'copy':
			case 'update':
	            $data = $_POST['data'];
	            $bs4->set_add('font', $_POST['configuration']['BS4_FONTS_NAME'], 'addfontdef');
	            $bs4->set_add('font', $_POST['add_font'], 'addfont');
				if(isset($_POST['custom1_add']) && $_POST['custom1_add'] != ''){
		            $bs4->set_add('custom1', $_POST['custom1_add']);
				}
				if(isset($_POST['custom2_add']) && $_POST['custom2_add'] != ''){
		            $bs4->set_add('custom2', $_POST['custom2_add']);
				}
				break;
			case 'load_thememodel':
				$data =	$bs4->get_theme($_POST['configuration']['BS4_THEMEMODEL_CUSTOM1'], 'custom1');
				$add1 =	$bs4->get_add($_POST['configuration']['BS4_THEMEMODEL_CUSTOM1']);
			    $bs4->set_theme_settings('custom1', $data);
            	$bs4->set_add('custom1', $add1);
				$bs4->copyBootswatch($_POST['configuration']['BS4_THEMEMODEL_CUSTOM1'], 'custom1');
				break;
			case 'load_thememodel2':
				$data =	$bs4->get_theme($_POST['configuration']['BS4_THEMEMODEL_CUSTOM2'], 'custom2');
				$add2 =	$bs4->get_add($_POST['configuration']['BS4_THEMEMODEL_CUSTOM2']);
			    $bs4->set_theme_settings('custom2', $data);
            	$bs4->set_add('custom2', $add2);
				$bs4->copyBootswatch($_POST['configuration']['BS4_THEMEMODEL_CUSTOM2'], 'custom2');
				break;
		}

		$config_data = $_POST['configuration'];
		$bs4->set_conf($config_data);
		$bs4->set_theme($data);
		// Compiler
	    $bs4->compileTheme($config_data['BS4_BOOTSTRAP_THEME']);
		// copy css and fonts to template
	    $bs4->copy2template($_POST['configuration']['BS4_CURRENT_TEMPLATE'], $_POST['action']);
	}

	// get data
	$bs4_conf =			$bs4->get_conf();
	$bs4_settings =		$bs4->get_theme_settings();
	$bs4_add_font =		$bs4->get_add('font', 'addfont'); // get additional font definitions
	$bs4_custom1 =		$bs4->get_theme('custom1', 'custom1');
	$bs4_custom1 =		array_merge($bs4_custom1, $bs4_settings['custom1']);
	$bs4_custom2 =		$bs4->get_theme('custom2', 'custom2');
	$bs4_custom2 =		array_merge($bs4_custom2, $bs4_settings['custom2']);
	$bs4_custom1_add =	$bs4->get_add('custom1');
	$bs4_custom2_add =	$bs4->get_add('custom2');

	// get input options
	$templates_array =	$bs4->get_templates();
	$themes_plus =		$bs4->get_themes(true);
	$themes =			$bs4->get_themes();
	$color_vars =		$bs4->get_color_vars();
	$color_vars_plus =	$bs4->get_color_vars(true);
	$color_classes =    $bs4->get_color_classes();

	// tabs
	$tabs_array = array();
	$tabs_array[] = array('id' => 'basics', 'name' => TEXT_BS4_TPL_MANAGER_THEME_TAB_BASICS);
	$tabs_array[] = array('id' => 'fonts', 'name' => TEXT_BS4_TPL_MANAGER_THEME_TAB_FONTS);
	$tabs_array[] = array('id' => 'custom1_vars', 'name' => TEXT_BS4_TPL_MANAGER_THEME_CUSTOM1);
	$tabs_array[] = array('id' => 'custom2_vars', 'name' => TEXT_BS4_TPL_MANAGER_THEME_CUSTOM2);
	$tabs_array[] = array('id' => 'button', 'name' => TEXT_BS4_TPL_MANAGER_THEME_TAB_BUTTON);

	$langtabs = '<div class="tablangmenu"><ul>';
	$csstabstyle = 'border: 1px solid #aaaaaa; padding: 4px; width: 98%; margin-top: -1px; margin-bottom: 10px; float: left;background: #F3F3F3;';
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

	// begin view
	require_once (DIR_WS_INCLUDES.'head.php');
	require_once('includes/bs4_template_manager/assets/js/bs4_tpl_manager.js.php');
?>
    <link type="text/css" href="includes/bs4_template_manager/assets/css/spectrum.css" rel="stylesheet">
    <link type="text/css" href="includes/bs4_template_manager/assets/css/bs4_tpl_manager.css" rel="stylesheet">
	<script type="text/javascript" src="includes/bs4_template_manager/assets/js/spectrum.js"></script>
	<?php if ($_SESSION["language_code"]=='de') { ?>
		<script type="text/javascript" src="includes/bs4_template_manager/assets/js/jquery.spectrum-de.js"></script>
	<?php } ?>
	<script type="text/javascript" src="includes/lang_tabs_menu/lang_tabs_menu.js"></script>

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
				<div class="pageHeadingImage"><?php echo xtc_image(DIR_WS_ICONS.'heading/icon_configuration.png', TEXT_BS4_TPL_MANAGER_THEME_HEADING_TITLE); ?></div>
				<div class="flt-l">
					<div class="pageHeading pdg2"><?php echo TEXT_BS4_TPL_MANAGER_THEME_HEADING_TITLE; ?></div>
					<p><?php echo TEXT_BS4_TPL_MANAGER_THEME_INFO; ?></p>
				</div>
				<div class="admin_container cf clear theme-manager">
					<div class="admincol_left">
						<?php
						echo xtc_draw_form('config', basename($PHP_SELF), xtc_get_all_get_params(array('action')), 'post', 'id="tpl_manager"');
						echo '<input id="activ_tab" type="hidden" value="0" name="activ_tab">';
						echo '<input id="action" type="hidden" value="update" name="action">';
						?>
							<script type="text/javascript">
								$.get("includes/lang_tabs_menu/lang_tabs_menu.css", function(css) {
									$("head").append("<style type='text/css'>"+css+"<\/style>");
								});
								document.write('<?php echo ($csstab);?>');
								document.write('<?php echo ($langtabs);?>');
							</script>
						<?php
						for ($z = 0, $n = count($tabs_array); $z < $n; $z++) {
							echo ('<div id="tab_lang_' . $z . '">');
							switch($tabs_array[$z]['id']) {

								case 'basics':
						?>
				            <table class="clear tableConfig">
								<tr>
					                <td class="dataTableConfig col-left">&nbsp;</td>
					                <td class="dataTableConfig col-middle"><input type="button" class="button but_red" value="<?php echo BUTTON_COPY_2_TEMPLATE; ?>" onclick="checkAction('copy')" /></td>
					                <td class="dataTableConfig col-right"><strong><?php echo TEXT_BS4_TPL_MANAGER_THEME_COPY_2_TEMPLATE_INFO; ?></strong></td>
								</tr>
								<tr>
				                	<td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS4_TPL_MANAGER_THEME_PATHS; ?></h3></td>
								</tr>
								<tr>
					                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_THEME_CURRENT_TEMPLATE; ?></td>
					                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_CURRENT_TEMPLATE]', $templates_array, $bs4_conf['BS4_CURRENT_TEMPLATE']); ?></td>
					                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_THEME_CURRENT_TEMPLATE_INFO; ?></td>
								</tr>
								<tr>
					                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_THEME_CURRENT_THEME; ?></td>
					                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_BOOTSTRAP_THEME]', $themes_plus, $bs4_conf['BS4_BOOTSTRAP_THEME']); ?></td>
					                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_THEME_CURRENT_THEME_INFO; ?></td>
								</tr>
								<tr>
					                <td class="txta-r" colspan="3" style="border:none;">
										<input type="button" class="button" value="<?php echo BUTTON_UPDATE; ?>" onclick="checkAction('update')" />
					                </td>
								</tr>
				            </table>
						<?php
								break;

								case 'fonts':
						?>
				            <table class="clear tableConfig">
								<tr>
				                	<td class="dataTableConfig" colspan="3"><h4><?php echo TEXT_BS4_TPL_MANAGER_FONTS_INFO; ?></h4></td>
								</tr>
								<tr>
					                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_THEME_FONTS_NAME; ?></td>
									<td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS4_FONTS_NAME]', $bs4_conf['BS4_FONTS_NAME'], 'class="standard" style="width: 300px;"'); ?></td>
						            <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_THEME_FONTS_NAME_INFO; ?></td>
								</tr>
								<tr>
					                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_THEME_FONT_DEFINITION; ?></td>
					                <td class="dataTableConfig col-middle"><?php echo xtc_draw_textarea_field('add_font', 'soft', '40', '5', $bs4_add_font, 'class="textareaModule"'); ?></td>
					                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_THEME_FONT_DEFINITION_INFO; ?></td>
								</tr>
								<tr>
					                <td class="txta-r" colspan="3" style="border:none;">
										<input type="button" class="button" value="<?php echo BUTTON_UPDATE; ?>" onclick="checkAction('update')" />
					                </td>
								</tr>
								<tr>
									<td class="dataTableConfig" colspan="3">
										<?php echo $font_text[$lang_code]; ?>
									</td>
								</tr>
				            </table>
						<?php
								break;

								case 'custom1_vars':
						?>
				            <table class="clear tableConfig">
								<tr>
					                <td class="txta-r" colspan="3" style="border:none;">
										<input type="button" class="button" value="<?php echo BUTTON_UPDATE; ?>" onclick="checkAction('update')" />
					                </td>
								</tr>
								<tr>
					                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_THEME_THEMEMODEL_CUSTOM1; ?></td>
					                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_THEMEMODEL_CUSTOM1]', $themes, $bs4_conf['BS4_THEMEMODEL_CUSTOM1'], 'id="thememodel"'); echo '<input id="last_selected" type="hidden" value="">'; ?></td>
					                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_THEME_THEMEMODEL_CUSTOM1_INFO; ?></td>
								</tr>
								<tr>
					                <td class="dataTableConfig col-left">&nbsp;</td>
					                <td class="dataTableConfig col-middle"><input type="button" class="button but_red" value="<?php echo BUTTON_LOAD_THEMEMODEL; ?>" onclick="checkAction('load_thememodel')" /></td>
					                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_THEME_THEMEMODEL_LOAD_INFO; ?></td>
								</tr>
								<?php
								if (count($bs4_custom1['custom1']) > 0){
	                                for($i=0; $i < count($bs4_custom1['custom1']); $i++){
										foreach($bs4_custom1['custom1'][$i] as $k => $v){
											if ($i < 21 || ($i > 47 && $i < 54) || ($i > 56 && $i < 65)){
								?>
												<tr>
									                <td class="dataTableConfig col-left"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) : TEXT_BS4_TPL_MANAGER_THEME_COLOR; echo defined('COLOR_'.$i) ? constant('COLOR_'.$i) : ''; echo '<small>'.TEXT_BS4_TPL_MANAGER_THEME_VAR.$k.'</small>'; ?></td>
									                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('data[custom1]['.$i.']['.$k.']', $v, 'class="basic_val" style="float: left;"'); echo '<input type="text" class="basic" value="'.$v.'" />'; ?></td>
									                <td class="dataTableConfig col-right"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') : TEXT_BS4_TPL_MANAGER_THEME_COLOR_VARS_STANDARD; echo $bs4_custom1['defaults'][$i]; ?></td>
												</tr>
								<?php
											}
											if (($i > 20 && $i < 31) || $i == 34 || ($i > 43 && $i < 48) || $i == 54 || $i == 55 || $i == 56 || ($i > 64 && $i < 69)){
								?>
												<tr>
									                <td class="dataTableConfig col-left"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) : ''; echo '<small>'.TEXT_BS4_TPL_MANAGER_THEME_VAR.$k.'</small>'; ?></td>
									                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('data[custom1]['.$i.']['.$k.']', $color_vars, $v); ?></td>
									                <td class="dataTableConfig col-right"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') : TEXT_BS4_TPL_MANAGER_THEME_COLOR_VARS_STANDARD; echo $bs4_custom1['defaults'][$i]; ?></td>
												</tr>
								<?php
											}
											if ($i == 32 || $i == 33 || ($i > 36 && $i < 43)){
								?>
												<tr>
									                <td class="dataTableConfig col-left"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) : ''; echo '<small>'.TEXT_BS4_TPL_MANAGER_THEME_VAR.$k.'</small>'; ?></td>
									                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('data[custom1]['.$i.']['.$k.']', $v, 'class="standard" style="width: 300px;"'); ?></td>
									                <td class="dataTableConfig col-right"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') : TEXT_BS4_TPL_MANAGER_THEME_COLOR_VARS_STANDARD; echo $bs4_custom1['defaults'][$i]; ?></td>
												</tr>
								<?php
											}
											if ($i == 31 || $i == 35 || $i == 36){
								?>
												<tr>
									                <td class="dataTableConfig col-left"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) : ''; echo '<small>'.TEXT_BS4_TPL_MANAGER_THEME_VAR.$k.'</small>'; ?></td>
									                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('data[custom1]['.$i.']['.$k.']', $color_classes, $v); ?></td>
									                <td class="dataTableConfig col-right"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') : TEXT_BS4_TPL_MANAGER_THEME_COLOR_VARS_STANDARD; echo $bs4_custom1['defaults'][$i]; ?></td>
												</tr>
								<?php
											}
											if ($i == 43){
								?>
												<tr>
									                <td class="dataTableConfig col-left"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) : ''; echo '<small>'.TEXT_BS4_TPL_MANAGER_THEME_VAR.$k.'</small>'; ?></td>
									                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('data[custom1]['.$i.']['.$k.']', $color_vars_plus, $v); ?></td>
									                <td class="dataTableConfig col-right"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') : TEXT_BS4_TPL_MANAGER_THEME_COLOR_VARS_STANDARD; echo $bs4_custom1['defaults'][$i]; ?></td>
												</tr>
								<?php
											}
										}
									}
								}
								?>
								<tr>
					                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_THEME_VARS_ADD; ?></td>
					                <td class="dataTableConfig col-middle"><?php echo xtc_draw_textarea_field('custom1_add', 'soft', '40', '5', $bs4_custom1_add, 'class="textareaModule"'); ?></td>
					                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_THEME_VARS_ADD_INFO; ?></td>
								</tr>
								<tr>
					                <td class="txta-r" colspan="3" style="border:none;">
										<input type="button" class="button" value="<?php echo BUTTON_UPDATE; ?>" onclick="checkAction('update')" />
					                </td>
								</tr>
				            </table>
						<?php
									break;

								case 'custom2_vars':
						?>
				            <table class="clear tableConfig">
								<tr>
					                <td class="txta-r" colspan="3" style="border:none;">
										<input type="button" class="button" value="<?php echo BUTTON_UPDATE; ?>" onclick="checkAction('update')" />
					                </td>
								</tr>
								<tr>
					                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_THEME_THEMEMODEL_CUSTOM1; ?></td>
					                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS4_THEMEMODEL_CUSTOM2]', $themes, $bs4_conf['BS4_THEMEMODEL_CUSTOM2'], 'id="thememodel2"'); echo '<input id="last_selected2" type="hidden" value="">'; ?></td>
					                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_THEME_THEMEMODEL_CUSTOM1_INFO; ?></td>
								</tr>
								<tr>
					                <td class="dataTableConfig col-left">&nbsp;</td>
					                <td class="dataTableConfig col-middle"><input type="button" class="button but_red" value="<?php echo BUTTON_LOAD_THEMEMODEL; ?>" onclick="checkAction('load_thememodel2')" /></td>
					                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_THEME_THEMEMODEL_LOAD_INFO; ?></td>
								</tr>
								<?php
								if (count($bs4_custom2['custom2']) > 0){
	                                for($i=0; $i < count($bs4_custom2['custom2']); $i++){
										foreach($bs4_custom2['custom2'][$i] as $k => $v){
											if ($i < 21 || ($i > 47 && $i < 54) || ($i > 56 && $i < 65)){
								?>
												<tr>
									                <td class="dataTableConfig col-left"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) : TEXT_BS4_TPL_MANAGER_THEME_COLOR; echo defined('COLOR_'.$i) ? constant('COLOR_'.$i) : ''; echo '<small>'.TEXT_BS4_TPL_MANAGER_THEME_VAR.$k.'</small>'; ?></td>
									                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('data[custom2]['.$i.']['.$k.']', $v, 'class="basic_val" style="float: left;"'); echo '<input type="text" class="basic" value="'.$v.'" />'; ?></td>
									                <td class="dataTableConfig col-right"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') : TEXT_BS4_TPL_MANAGER_THEME_COLOR_VARS_STANDARD; echo $bs4_custom2['defaults'][$i]; ?></td>
												</tr>
								<?php
											}
											if (($i > 20 && $i < 31) || $i == 34 || ($i > 43 && $i < 48) || $i == 54 || $i == 55 || $i == 56 || ($i > 64 && $i < 69)){
								?>
												<tr>
									                <td class="dataTableConfig col-left"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) : ''; echo '<small>'.TEXT_BS4_TPL_MANAGER_THEME_VAR.$k.'</small>'; ?></td>
									                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('data[custom2]['.$i.']['.$k.']', $color_vars, $v); ?></td>
									                <td class="dataTableConfig col-right"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') : TEXT_BS4_TPL_MANAGER_THEME_COLOR_VARS_STANDARD; echo $bs4_custom2['defaults'][$i]; ?></td>
												</tr>
								<?php
											}
											if ($i == 32 || $i == 33 || ($i > 36 && $i < 43)){
								?>
												<tr>
									                <td class="dataTableConfig col-left"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) : ''; echo '<small>'.TEXT_BS4_TPL_MANAGER_THEME_VAR.$k.'</small>'; ?></td>
									                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('data[custom2]['.$i.']['.$k.']', $v, 'class="standard" style="width: 300px;"'); ?></td>
									                <td class="dataTableConfig col-right"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') : TEXT_BS4_TPL_MANAGER_THEME_COLOR_VARS_STANDARD; echo $bs4_custom2['defaults'][$i]; ?></td>
												</tr>
								<?php
											}
											if ($i == 31 || $i == 35 || $i == 36){
								?>
												<tr>
									                <td class="dataTableConfig col-left"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) : ''; echo '<small>'.TEXT_BS4_TPL_MANAGER_THEME_VAR.$k.'</small>'; ?></td>
									                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('data[custom2]['.$i.']['.$k.']', $color_classes, $v); ?></td>
									                <td class="dataTableConfig col-right"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') : TEXT_BS4_TPL_MANAGER_THEME_COLOR_VARS_STANDARD; echo $bs4_custom2['defaults'][$i]; ?></td>
												</tr>
								<?php
											}
											if ($i == 43){
								?>
												<tr>
									                <td class="dataTableConfig col-left"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i) : ''; echo '<small>'.TEXT_BS4_TPL_MANAGER_THEME_VAR.$k.'</small>'; ?></td>
									                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('data[custom2]['.$i.']['.$k.']', $color_vars_plus, $v); ?></td>
									                <td class="dataTableConfig col-right"><?php echo defined('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') ? constant('TEXT_BS4_TPL_MANAGER_THEME_FIELD_'.$i.'_INFO') : TEXT_BS4_TPL_MANAGER_THEME_COLOR_VARS_STANDARD; echo $bs4_custom2['defaults'][$i]; ?></td>
												</tr>
								<?php
											}
										}
									}
								}
								?>
								<tr>
					                <td class="dataTableConfig col-left"><?php echo TEXT_BS4_TPL_MANAGER_THEME_VARS_ADD; ?></td>
					                <td class="dataTableConfig col-middle"><?php echo xtc_draw_textarea_field('custom2_add', 'soft', '40', '5', $bs4_custom2_add, 'class="textareaModule"'); ?></td>
					                <td class="dataTableConfig col-right"><?php echo TEXT_BS4_TPL_MANAGER_THEME_VARS_ADD_INFO; ?></td>
								</tr>
								<tr>
					                <td class="txta-r" colspan="3" style="border:none;">
										<input type="button" class="button" value="<?php echo BUTTON_UPDATE; ?>" onclick="checkAction('update')" />
					                </td>
								</tr>
				            </table>
						<?php
									break;

								case 'button':
						?>
				            <table class="clear tableConfig">
								<tr>
				                	<td class="dataTableConfig"><?php echo TEXT_BS4_TPL_MANAGER_THEME_BUTTONS; ?></td>
								</tr>
				            </table>
						<?php
								break;


								}
								echo ('</div>');
							}
						?>
						</form>
					</div>
					<div class="admincol_right">
						<p class="pageHeading txta-c"><?php echo TEXT_BS4_TPL_MANAGER_THEME_PREVIEW_TITLE ?><strong><span id="preview"></span></strong><?php echo TEXT_BS4_TPL_MANAGER_THEME_PREVIEW_INFO ?></p>
						<div class="admin_contentbox">
							<div class="img_box">
								<iframe id="previewIframe" src="<?php echo FILENAME_BS4_TPL_MANAGER_THEME_PREVIEW ?>?language=<?php echo $lang_code; ?>&bs4_tpl=<?php echo DIR_WS_CATALOG.'templates/'.$bs4_conf['BS4_CURRENT_TEMPLATE']; ?>" height="800" style="width: 100%; border: none;"></iframe>
								<script>
									window.onload = function(){
										var framefenster = document.getElementById("previewIframe");
										if(framefenster.contentWindow.document.body){
											var framefenster_size = framefenster.contentWindow.document.body.offsetHeight;
											if(document.all && !window.opera){
												framefenster_size = framefenster.contentWindow.document.body.scrollHeight;
											}
											framefenster.style.height = (framefenster_size+20) + 'px';
										}
									}
									$('#previewIframe').load(function(){
										$('#previewIframe').contents().find("body").each(function( index ) {
											$(this).find("#top1").addClass('<?php echo $bs4_conf['BS4_TOP1_NAVBAR'].' bg-'.$bs4_conf['BS4_TOP1_BG'].' '.$bs4_conf['BS4_TOP1_TEXT']; ?>');
											$(this).find(".logobar a").addClass('<?php echo $bs4_conf['BS4_LOGOBAR_TEXT']; ?>');
											$(this).find("#navbar").addClass('<?php echo $bs4_conf['BS4_TOP2_NAVBAR'].' bg-'.$bs4_conf['BS4_TOP2_BG']; ?>');
											$(this).find("#layout_footer").addClass('<?php echo 'bg-'.$bs4_conf['BS4_FOOTER_BG']; ?>');
											$(this).find("#layout_footer .config").addClass('<?php echo $bs4_conf['BS4_FOOTER_NAVBAR']; ?>');
										});
									});

								</script>
							</div>
						</div>
					</div>
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