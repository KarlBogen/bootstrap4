<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */


defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

class bs4_tpl_manager {
	var $code, $title, $description, $enabled;

	function __construct() {
		$this->code = 'bs4_tpl_manager';
		$this->title = MODULE_BS4_TPL_MANAGER_TEXT_TITLE;
		$this->description = '';
		if (defined('MODULE_BS4_TPL_MANAGER_STATUS')) $this->description .= '<a class="button btnbox but_green" style="text-align:center;" onclick="this.blur();" href="' . xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system&module=' . $this->code . '&action=update') . '">Update</a><br /><br />';
        $bs4_tpl = defined('BS4_CURRENT_TEMPLATE') && BS4_CURRENT_TEMPLATE != '' ? BS4_CURRENT_TEMPLATE : 'bootstrap4';
		$this->description .= '<a class="button btnbox but_red" style="text-align:center;" onclick="return confirmLink(\''. sprintf(MODULE_BS4_TPL_MANAGER_DELETE_CONFIRM, $bs4_tpl) .'\', \'\' ,this);" href="' . xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system&module=' . $this->code . '&action=custom') . '">'.MODULE_BS4_TPL_MANAGER_DELETE_BUTTON.'</a><br />';
		$this->description .= MODULE_BS4_TPL_MANAGER_TEXT_DESCRIPTION;
		$this->sort_order = defined('MODULE_BS4_TPL_MANAGER_SORT_ORDER') ? MODULE_BS4_TPL_MANAGER_SORT_ORDER : 0;
		$this->enabled = ((MODULE_BS4_TPL_MANAGER_STATUS == 'true') ? true : false);
	}

	function process($file) {
	}

	function display() {
		return array('text' => '<br />'.
			'<div><strong>'.MODULE_BS4_TPL_MANAGER_STATUS_INFO.'</strong></div>'.
			'<br /><br />'.
			'<div align="center">' . xtc_button(BUTTON_SAVE) .
			xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module=bs4_tpl_manager')) . '</div>'
			);
	}

	function check() {
		if (!isset($this->_check)) {
			$check_query = xtc_db_query("SELECT configuration_value
											FROM " . TABLE_CONFIGURATION . "
											WHERE configuration_key = 'MODULE_BS4_TPL_MANAGER_STATUS'");
			$this->_check = xtc_db_num_rows($check_query);
		}
		return $this->_check;
	}
    
	function install() {
		global $messageStack;

		if (!$this->install_table_config())
		{
			$this->remove_tables(1);
			return false;
		}

		if (!$this->install_table_theme())
		{
			$this->remove_tables(2);
			return false;
		}

		if (!$this->install_table_configuration())
		{
			$this->remove_tables(3);
			return false;
		}

		if (!$this->install_table_admin_access())
		{
			$this->remove_tables(4);
			return false;
		}

		if (!$this->install_additional_modules())
		{
			$this->remove_tables(4);
			return false;
		}

		$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_FINISHED, 'success');

	}

	function update() {
		global $messageStack;

		$update = true;
		$update = $this->check_table_configuration();
		$update = $this->update_table_config();
		if($update == true){
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_UPDATE_FINISHED, 'success');
		} else {
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_UPDATE_ERR, 'error');
		}
	}

	function custom() {
		global $messageStack;

        $bs4_tpl = defined('BS4_CURRENT_TEMPLATE') && BS4_CURRENT_TEMPLATE != '' ? BS4_CURRENT_TEMPLATE : 'bootstrap4';

		// Standardtemplate prüfen
		if(CURRENT_TEMPLATE == $bs4_tpl){
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_DELETE_STDTPL_ERR, 'error');
			return false;
		}

		$result = true;
		// Systemmodule deinstallieren
		if (defined('MODULE_BS4_TPL_MANAGER_STATUS') && MODULE_BS4_TPL_MANAGER_STATUS == 'true') {
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_START_DELETE_TABLES, 'success');
			if(!$this->remove()){
				$result = false;
			}
		}

		// Dateien definieren
		$shop_path = DIR_FS_CATALOG;
		$dirs_and_files = array();
		$dirs_and_files[] = $shop_path.DIR_ADMIN.'includes/bs4_template_manager';
		$dirs_and_files[] = $shop_path.DIR_ADMIN.'bs4_customers_remind.php';
		$dirs_and_files[] = $shop_path.DIR_ADMIN.'bs4_tpl_manager_config.php';
		$dirs_and_files[] = $shop_path.DIR_ADMIN.'bs4_tpl_manager_theme.php';
		$dirs_and_files[] = $shop_path.DIR_ADMIN.'bs4_tpl_manager_theme_preview.php';
		$dirs_and_files[] = $shop_path.DIR_ADMIN.'includes/extra/application_top/application_top_begin/bs4_tpl_manager_config.php';
		$dirs_and_files[] = $shop_path.DIR_ADMIN.'includes/extra/filenames/bs4_tpl_manager.php';
		$dirs_and_files[] = $shop_path.DIR_ADMIN.'includes/extra/menu/bs4_tpl_manager.php';

		$dirs_and_files[] = $shop_path.'includes/extra/ajax/bs4_get_subcat.php';
		$dirs_and_files[] = $shop_path.'includes/extra/ajax/bs4_awids_rating.php';
		$dirs_and_files[] = $shop_path.'includes/extra/application_bottom/bs4_customers_remind.php';
		$dirs_and_files[] = $shop_path.'includes/extra/application_top/application_top_begin/bs4_tpl_manager_config.php';
		$dirs_and_files[] = $shop_path.'includes/extra/cart_actions/add_product_before_redirect/bs4_agi_reduce_cart.php';
		$dirs_and_files[] = $shop_path.'includes/extra/default/categories_content/bs4_remove_empty_categories.php';
		$dirs_and_files[] = $shop_path.'includes/extra/checkout/checkout_requirements/bs4_privacy.php';
		$dirs_and_files[] = $shop_path.'includes/extra/database_tables/bs4_tpl_manager.php';
		$dirs_and_files[] = $shop_path.'includes/extra/define_add_select/bs4_define_add_select.php';
		$dirs_and_files[] = $shop_path.'includes/extra/filenames/bs4_additional_modules.php';
		$dirs_and_files[] = $shop_path.'includes/extra/modules/categories_listing/categories_content/bs4_remove_empty_categories.php';
		$dirs_and_files[] = $shop_path.'includes/extra/modules/order_details_cart_attributes/bs4_agi_reduce_cart.php';
		$dirs_and_files[] = $shop_path.'includes/extra/modules/order_details_cart_content/bs4_agi_reduce_cart.php';
		$dirs_and_files[] = $shop_path.'includes/extra/modules/product_info_end/bs4_additional_module_links.php';
		$dirs_and_files[] = $shop_path.'includes/extra/modules/product_info_end/bs4_agi_reduce_cart.php';
		$dirs_and_files[] = $shop_path.'includes/extra/modules/products_attributes_data/bs4_attribute_price_updater.php';
		$dirs_and_files[] = $shop_path.'includes/extra/shopping_cart/cart_requirements/bs4_agi_reduce_cart.php';
		$dirs_and_files[] = $shop_path.'includes/modules/bs4_customers_remind.php';
		$dirs_and_files[] = $shop_path.'includes/modules/product/bs4_checkifnewproduct.php';

		$dirs_and_files[] = $shop_path.'lang/english/admin/bs4_customers_remind.php';
		$dirs_and_files[] = $shop_path.'lang/english/admin/bs4_tpl_manager_config.php';
		$dirs_and_files[] = $shop_path.'lang/english/admin/bs4_tpl_manager_theme.php';
		$dirs_and_files[] = $shop_path.'lang/english/extra/bs4_additional_modules.php';
		$dirs_and_files[] = $shop_path.'lang/english/extra/bs4_agi_reduce_cart.php';
		$dirs_and_files[] = $shop_path.'lang/english/extra/bs4_privacy.php';
		$dirs_and_files[] = $shop_path.'lang/english/extra/bs4_template.php';
		$dirs_and_files[] = $shop_path.'lang/english/extra/admin/bs4_tpl_manager.php';
		$dirs_and_files[] = $shop_path.'lang/english/modules/system/bs4_tpl_manager.php';

		$dirs_and_files[] = $shop_path.'lang/german/admin/bs4_customers_remind.php';
		$dirs_and_files[] = $shop_path.'lang/german/admin/bs4_tpl_manager_config.php';
		$dirs_and_files[] = $shop_path.'lang/german/admin/bs4_tpl_manager_theme.php';
		$dirs_and_files[] = $shop_path.'lang/german/extra/bs4_additional_modules.php';
		$dirs_and_files[] = $shop_path.'lang/german/extra/bs4_agi_reduce_cart.php';
		$dirs_and_files[] = $shop_path.'lang/german/extra/bs4_privacy.php';
		$dirs_and_files[] = $shop_path.'lang/german/extra/bs4_template.php';
		$dirs_and_files[] = $shop_path.'lang/german/extra/admin/bs4_tpl_manager.php';
		$dirs_and_files[] = $shop_path.'lang/german/modules/system/bs4_tpl_manager.php';

		if($bs4_tpl != '') $dirs_and_files[] = $shop_path.'templates/'.$bs4_tpl;

		$dirs_and_files[] = $shop_path.'bs4_cheaply_see.php';
		$dirs_and_files[] = $shop_path.'bs4_product_inquiry.php';
		$dirs_and_files[] = $shop_path.'bs4_reminder.php';
		$dirs_and_files[] = $shop_path.'bs4-popup_reviews.php';

		// Dateien löschen
		foreach ($dirs_and_files as $dir_or_file) {
			if(!$this->rrmdir($dir_or_file)){
				$messageStack->add_session($dir_or_file.MODULE_BS4_TPL_MANAGER_DELETE_FILE_ERR, 'error');
                $result = false;
			}
		}

		if($result == true){
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_DELETE_SUCCESS, 'success');
		} else {
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_DELETE_ERR, 'error');
		}

		// Datei selbst löschen
        unlink($shop_path.DIR_ADMIN.'includes/modules/system/bs4_tpl_manager.php');
	}

	function rrmdir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir") $this->rrmdir($dir."/".$object); else unlink($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
			return true;
		} elseif(is_file($dir)) {
			unlink($dir);
			return true;
		}
	}

	function remove() {
		global $messageStack;
		if($this->remove_tables(4)){
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_DEINSTALL_FINISHED, 'success');
		} else {
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_DEINSTALL_ERR, 'error');
		}
	}

	function keys() {
		$key = array(
			'MODULE_BS4_TPL_MANAGER_STATUS',
		);

		return $key;
	}

	function get_values_config() {
		$values_config = array();

			$values_config[] = "('BS4_SHOW_TOP1', 'true')";
			$values_config[] = "('BS4_SHOW_TOP2', 'true')";
			$values_config[] = "('BS4_SHOW_TOP3', 'true')";
			$values_config[] = "('BS4_SHOW_TOP4', 'true')";
			$values_config[] = "('BS4_EU_COOKIE_PLACE', 'center')";
			$values_config[] = "('BS4_EU_COOKIE_CONTENT', 2)";
			$values_config[] = "('BS4_SHOW_JS_DISABLED', 'true')";
			$values_config[] = "('BS4_SHOP_LOGO', 'img/logo_head.png')";
			$values_config[] = "('BS4_SEARCHFIELD_PERMANENT', 'false')";
			$values_config[] = "('BS4_MENUBAR_FIXEDTOP', 'false')";
			$values_config[] = "('BS4_MENUBAR_FIXEDTOP_CLASSES', 'navbar-light bg-light border-bottom p-0')";
			$values_config[] = "('BS4_LOGOBAR_FIXEDTOP', 'false')";
			$values_config[] = "('BS4_RESPONSIVEMENU_SHOW', 'true')";
			$values_config[] = "('BS4_SUPERFISHMENU_SHOW', 'true')";
			$values_config[] = "('BS4_TOUCH_USE', 'true')";
			$values_config[] = "('BS4_MAXLEVEL_IN_TOPCATMENU', 'false')";
			$values_config[] = "('BS4_SHOW_PRODUCTS_IN_TOPCATMENU', 'false')";
			$values_config[] = "('BS4_SHOW_HOMEBUTTON_IN_TOPCATMENU', 'true')";
			$values_config[] = "('BS4_ADD_LINK_IN_TOPCATMENU_LAST', '')";
			$values_config[] = "('BS4_KK_MEGAS', 'main-3')";
			$values_config[] = "('BS4_CATEGORIESMENU_MAXLEVEL', 'false')";
			$values_config[] = "('BS4_CATEGORIESMENU_AJAX', 'true')";
			$values_config[] = "('BS4_CATEGORIESMENU_AJAX_SCROLL', 'true')";
			$values_config[] = "('BS4_CATEGORIESMENU_POSITION_LEFT', 'true')";
			$values_config[] = "('BS4_SPECIALS_CATEGORIES', 'true')";
			$values_config[] = "('BS4_WHATSNEW_CATEGORIES', 'true')";
			$values_config[] = "('BS4_WHATSNEW_SPECIALS_UPPERCASE', 'false')";
			$values_config[] = "('BS4_HIDE_EMPTY_CATEGORIES', 'false')";
			$values_config[] = "('BS4_CAROUSEL_SHOW', 'column')";
			$values_config[] = "('BS4_CAROUSEL_FADE', 'true')";
			$values_config[] = "('BS4_TOP_PROD_IN_SLIDER', 'true')";
			$values_config[] = "('BS4_TOPCAROUSEL_FADE', 'true')";
			$values_config[] = "('BS4_TOPCAROUSEL_NAME_LINES', 0)";
			$values_config[] = "('BS4_BSCAROUSEL_SHOW', 'true')";
			$values_config[] = "('BS4_BSCAROUSEL_FADE', 'true')";
			$values_config[] = "('BS4_BSCAROUSEL_NAME_LINES', 0)";
			$values_config[] = "('BS4_STARTPAGE_FULLCONTENT', 'false')";
			$values_config[] = "('BS4_PROD_LIST_FULLCONTENT', 'false')";
			$values_config[] = "('BS4_PROD_DETAIL_FULLCONTENT', 'true')";
			$values_config[] = "('BS4_PROD_DETAIL_SHOW_MANUIMAGE', 'true')";
			$values_config[] = "('BS4_PRODUCT_LIST_BOX_STARTPAGE', 'true')";
			$values_config[] = "('BS4_PROD_LIST_BOX', 'true')";
			$values_config[] = "('BS4_PRODUCT_INFO_BOX', 'true')";
			$values_config[] = "('BS4_FLAG_NEW_SHOW', 'true')";
			$values_config[] = "('BS4_FLAG_TOP_SHOW', 'true')";
			$values_config[] = "('BS4_FLAG_SPECIAL_SHOW', 'true')";
			$values_config[] = "('BS4_FLAG_PERCENT_SHOW', 'true')";
			$values_config[] = "('BS4_ADVANCED_JS_VALIDATION', 'true')";
			$values_config[] = "('BS4_USE_EASYZOOM', 'true')";
			$values_config[] = "('BS4_FILTERCOLOR_AKTIV', 'primary')";
			$values_config[] = "('BS4_SEARCHFIELD_ONE_ROW', 'true')";
			$values_config[] = "('BS4_CURRENT_TEMPLATE', 'bootstrap4')";
			$values_config[] = "('BS4_BOOTSTRAP_THEME', 'default')";
			$values_config[] = "('BS4_FONTS_NAME', '')";
			$values_config[] = "('BS4_THEMEMODEL_CUSTOM1', 'default')";
			$values_config[] = "('BS4_THEMEMODEL_CUSTOM2', 'default')";
			$values_config[] = "('BS4_TOP1_NAVBAR', 'navbar-dark')";
			$values_config[] = "('BS4_TOP1_BG', 'dark')";
			$values_config[] = "('BS4_TOP1_TEXT', '')";
			$values_config[] = "('BS4_LOGOBAR_TEXT', 'text-secondary')";
			$values_config[] = "('BS4_TOP2_NAVBAR', 'navbar-light')";
			$values_config[] = "('BS4_TOP2_BG', 'light')";
			$values_config[] = "('BS4_FOOTER_NAVBAR', 'navbar-dark')";
			$values_config[] = "('BS4_FOOTER_BG', 'dark')";
			$values_config[] = "('BS4_CUSTOMERS_REMIND', 'false')";
			$values_config[] = "('BS4_CUSTOMERS_REMIND_SENDMAIL', 'false')";
			$values_config[] = "('BS4_CHEAPLY_SEE', 'false')";
			$values_config[] = "('BS4_PRODUCT_INQUIRY', 'false')";
			$values_config[] = "('BS4_ATTR_PRICE_UPDATER', 'false')";
			$values_config[] = "('BS4_AGI_REDUCE_CART', 'false')";
			$values_config[] = "('BS4_AGI_REDUCE_CART_SHOW_AVAILABLE', 'true')";
			$values_config[] = "('BS4_AWIDSRATINGBREAKDOWN', 'false')";
			$values_config[] = "('BS4_AWIDSRATINGBREAKDOWN_PRODLIST', 'true')";
			$values_config[] = "('BS4_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS', 'true')";
			$values_config[] = "('BS4_AWIDSRATINGBREAKDOWN_URL', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_CATEGORIES', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_ADD_QUICKIE', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_LOGIN', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_WHATSNEW', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_SPECIALS', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_LAST_VIEWED', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_REVIEWS', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_CUSTOM', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_MANUFACTURERS', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_MANUFACTURERS_INFO', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_CURRENCIES', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_INFOBOX', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_HISTORY', 'true')";
			$values_config[] = "('BS4_STARTPAGE_BOX_TRUSTEDSHOPS', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_CATEGORIES', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_ADD_QUICKIE', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_LOGIN', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_WHATSNEW', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_SPECIALS', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_LAST_VIEWED', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_REVIEWS', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_CUSTOM', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_MANUFACTURERS', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_CURRENCIES', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_INFOBOX', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_HISTORY', 'true')";
			$values_config[] = "('BS4_NOT_STARTPAGE_BOX_TRUSTEDSHOPS', 'true')";
			$values_config[] = "('BS4_HIDE_ALL_BOXES', 'false')";

		return $values_config;
	}

	function install_table_config() {
		global $messageStack;
		$install = true;
		$values_config = array();

		xtc_db_query("CREATE TABLE IF NOT EXISTS " . TABLE_BS4_TPL_MANAGER_CONFIG . " (
			`config_id` int(11) NOT NULL AUTO_INCREMENT,
			`config_key` varchar(64) NOT NULL,
			`config_value` text NOT NULL,
			PRIMARY KEY (`config_id`)
		)");

		if(!$this->table_exists(TABLE_BS4_TPL_MANAGER_CONFIG))	{
			$install = false;
		}

		if($install == true){
			$values_config = $this->get_values_config();

			foreach($values_config as $value) {
				$insert_into = "INSERT INTO " . TABLE_BS4_TPL_MANAGER_CONFIG . " (config_key ,config_value) VALUES ";
				$value = encode_utf8($value);
				if(!xtc_db_query($insert_into.$value)){
					$install = false;
				}
			}
		}
		if($install == true){
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_OK.TABLE_BS4_TPL_MANAGER_CONFIG, 'success');
		} else {
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ERR.TABLE_BS4_TPL_MANAGER_CONFIG, 'error');
		}
		return $install;
	}

	function update_table_config() {
		global $messageStack;
		$update = true;
			$values_config = $this->get_values_config();

			foreach($values_config as $value) {
				$value = encode_utf8($value);
				$confkey = explode(',',$value);
				$insert_into = "INSERT INTO " . TABLE_BS4_TPL_MANAGER_CONFIG . " (config_key ,config_value)
				SELECT * FROM (SELECT " . str_replace('(', '', $value) . " AS tmp
				WHERE NOT EXISTS
				(SELECT config_key FROM " . TABLE_BS4_TPL_MANAGER_CONFIG . " WHERE config_key = " . str_replace('(', '', $confkey[0]) . ") LIMIT 1";
				if(!xtc_db_query($insert_into)){
					$update = false;
				}
			}
		return $update;
	}

	function install_table_theme() {
		global $messageStack;
		$install = true;
		$values_theme = array();

		xtc_db_query("CREATE TABLE IF NOT EXISTS " . TABLE_BS4_TPL_MANAGER_THEME . " (
			`theme_id` int(11) NOT NULL AUTO_INCREMENT,
			`theme_key` varchar(64) NOT NULL,
			`defaults` text NOT NULL,
			PRIMARY KEY (`theme_id`)
		)");

		if(!$this->table_exists(TABLE_BS4_TPL_MANAGER_THEME))	{
			$install = false;
		}

		if($install == true){
			$values_theme[] = '(\'custom1\', \'[\"#fff\",\"#f8f9fa\",\"#e9ecef\",\"#dee2e6\",\"#ced4da\",\"#adb5bd\",\"#6c757d\",\"#495057\",\"#343a40\",\"#212529\",\"#000\",\"#007bff\",\"#6610f2\",\"#6f42c1\",\"#e83e8c\",\"#dc3545\",\"#fd7e14\",\"#ffc107\",\"#28a745\",\"#20c997\",\"#17a2b8\",\"$blue\",\"$gray-600\",\"$green\",\"$cyan\",\"$yellow\",\"$red\",\"$gray-100\",\"$gray-800\",\"$white\",\"$gray-900\",\"$primary\",\"darken($link-color, 15%)\",\"2px\",\"$gray-300\",\"$white\",\"$primary\",\"1rem\",\"$font-size-base * 2.5\",\"$font-size-base * 2\",\"$font-size-base * 1.75\",\"$font-size-base * 1.5\",\"$font-size-base * 1.25\",\"inherit\",\"$white\",\"$gray-700\",\"$gray-400\",\"$gray-200\",\"rgba(255, 255, 255, .5)\",\"rgba(255, 255, 255, .75)\",\"#fff\",\"rgba(0, 0, 0, .5)\",\"rgba(0, 0, 0, .7)\",\"rgba(0, 0, 0, .9)\",\"$white\",\"$gray-200\",\"$blue\",\"rgba(0, 0, 0, .125)\",\"rgba(0, 0, 0, .03)\",\"#fff\",\"#fff\",\"rgba(0, 0, 0, .125)\",\"#fff\",\"rgba(0, 0, 0, .2)\",\"#e9ecef\",\"$black\",\"$gray-200\",\"$white\",\"$gray-900\"]\')';
			$values_theme[] = '(\'custom2\', \'[\"#fff\",\"#f8f9fa\",\"#e9ecef\",\"#dee2e6\",\"#ced4da\",\"#adb5bd\",\"#6c757d\",\"#495057\",\"#343a40\",\"#212529\",\"#000\",\"#007bff\",\"#6610f2\",\"#6f42c1\",\"#e83e8c\",\"#dc3545\",\"#fd7e14\",\"#ffc107\",\"#28a745\",\"#20c997\",\"#17a2b8\",\"$blue\",\"$gray-600\",\"$green\",\"$cyan\",\"$yellow\",\"$red\",\"$gray-100\",\"$gray-800\",\"$white\",\"$gray-900\",\"$primary\",\"darken($link-color, 15%)\",\"2px\",\"$gray-300\",\"$white\",\"$primary\",\"1rem\",\"$font-size-base * 2.5\",\"$font-size-base * 2\",\"$font-size-base * 1.75\",\"$font-size-base * 1.5\",\"$font-size-base * 1.25\",\"inherit\",\"$white\",\"$gray-700\",\"$gray-400\",\"$gray-200\",\"rgba(255, 255, 255, .5)\",\"rgba(255, 255, 255, .75)\",\"#fff\",\"rgba(0, 0, 0, .5)\",\"rgba(0, 0, 0, .7)\",\"rgba(0, 0, 0, .9)\",\"$white\",\"$gray-200\",\"$blue\",\"rgba(0, 0, 0, .125)\",\"rgba(0, 0, 0, .03)\",\"#fff\",\"#fff\",\"rgba(0, 0, 0, .125)\",\"#fff\",\"rgba(0, 0, 0, .2)\",\"#e9ecef\",\"$black\",\"$gray-200\",\"$white\",\"$gray-900\"]\')';

			foreach($values_theme as $value) {
				$insert_into = "INSERT INTO " . TABLE_BS4_TPL_MANAGER_THEME . " (theme_key ,defaults) VALUES ";
				$value = encode_utf8($value);
				if(!xtc_db_query($insert_into.$value)){
					$install = false;
				}
			}
		}
		if($install == true){
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_OK.TABLE_BS4_TPL_MANAGER_THEME, 'success');
		} else {
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ERR.TABLE_BS4_TPL_MANAGER_THEME, 'error');
		}
		return $install;
	}

	function install_table_configuration() {
		global $messageStack;
		$install = true;

		// Eintrag Template Manager in Tabelle configuration
		// Klassenerweiterungsmodul "product" - "checkifnewproduct" wird mitinstalliert - wird benötigt für die Prüfung, ob ein Produkt neu ist
		if(!xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_BS4_TPL_MANAGER_STATUS', 'true',  '6', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())")
		|| !xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) values ('MODULE_PRODUCT_BS4_CHECKIFNEWPRODUCT_STATUS', 'true','6', '1','xtc_cfg_select_option(array(\'true\', \'false\'), ', now())")
		|| !xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) values ('MODULE_PRODUCT_BS4_CHECKIFNEWPRODUCT_SORT_ORDER', '10','6', '2', now())")
		)
		{
			$install = false;
		} else {
			$install = $this->check_module_product_installed();
		}

		if($install == true){
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_OK.TABLE_CONFIGURATION, 'success');
		} else {
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_ERR.TABLE_CONFIGURATION, 'error');
		}
		return $install;
	}

	function check_module_product_installed() {
		if (defined('MODULE_PRODUCT_INSTALLED')) {
			$installed = [];
			if (MODULE_PRODUCT_INSTALLED != '') $installed = explode(';', MODULE_PRODUCT_INSTALLED);
			if (!in_array('bs4_checkifnewproduct.php', $installed)) {
				$installed[] =  'bs4_checkifnewproduct.php';
				if (!xtc_db_query("UPDATE ".TABLE_CONFIGURATION." SET configuration_value = '" . implode(';', $installed) . "', last_modified = now() where configuration_key = 'MODULE_PRODUCT_INSTALLED'")) {
					return false;
				}
			}
		} else {
			if (!xtc_db_query("INSERT INTO ".TABLE_CONFIGURATION." (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('MODULE_PRODUCT_INSTALLED', 'bs4_checkifnewproduct.php;', '6', '0', now())")) {
				return false;
			}
		}
		return true;
	}

	function check_table_configuration() {
		global $messageStack;
		$check = true;

		// Klassenerweiterungsmodul "product" - "checkifnewproduct" wird mitinstalliert - wird benötigt für die Prüfung, ob ein Produkt neu ist
		if (!defined('MODULE_PRODUCT_BS4_CHECKIFNEWPRODUCT_STATUS')) {
			xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) values ('MODULE_PRODUCT_BS4_CHECKIFNEWPRODUCT_STATUS', 'true','6', '1','xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		}
		if (!defined('MODULE_PRODUCT_BS4_CHECKIFNEWPRODUCT_SORT_ORDER')) {
			xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) values ('MODULE_PRODUCT_BS4_CHECKIFNEWPRODUCT_SORT_ORDER', '10','6', '2', now())");
		}

		if (!defined('MODULE_PRODUCT_BS4_CHECKIFNEWPRODUCT_STATUS')
		|| !defined('MODULE_PRODUCT_BS4_CHECKIFNEWPRODUCT_SORT_ORDER')
		)
		{
			$check = false;
		} else {
			$check = $this->check_module_product_installed();
		}

		if($check == true){
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_OK.TABLE_CONFIGURATION, 'success');
		} else {
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_ERR.TABLE_CONFIGURATION, 'error');
		}
		return $check;
	}

	function install_table_admin_access() {
		global $messageStack;
		$install = true;

		// Einträge in admin_access
		$admin_access_bs4_tpl_manager_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs4_tpl_manager_theme'"));
		if(!$admin_access_bs4_tpl_manager_exists) {
			xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " ADD `bs4_tpl_manager_theme` INT(1) DEFAULT '0' NOT NULL");
		}
		xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs4_tpl_manager_theme = '8' WHERE customers_id = 'groups' LIMIT 1");
		xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs4_tpl_manager_theme = '1' WHERE customers_id = '1' LIMIT 1");
		if ($_SESSION['customer_id'] > 1) {
			xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs4_tpl_manager_theme = '1' WHERE customers_id = '".$_SESSION['customer_id']."' LIMIT 1") ;
		}
		$admin_access_bs4_tpl_manager_config_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs4_tpl_manager_config'"));
		if(!$admin_access_bs4_tpl_manager_config_exists) {
			xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " ADD `bs4_tpl_manager_config` INT(1) DEFAULT '0' NOT NULL");
		}
		xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs4_tpl_manager_config = '8' WHERE customers_id = 'groups' LIMIT 1");
		xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs4_tpl_manager_config = '1' WHERE customers_id = '1' LIMIT 1");
		if ($_SESSION['customer_id'] > 1) {
			xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs4_tpl_manager_config = '1' WHERE customers_id = '".$_SESSION['customer_id']."' LIMIT 1") ;
		}

		// Einträge in admin_access
		$admin_access_bs4_customers_remind_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM ".TABLE_ADMIN_ACCESS." WHERE Field='bs4_customers_remind'"));
		if(!$admin_access_bs4_customers_remind_exists) {
			xtc_db_query("ALTER TABLE ".TABLE_ADMIN_ACCESS." ADD `bs4_customers_remind` INT(1) DEFAULT '0' NOT NULL");
		}
		xtc_db_query("UPDATE ".TABLE_ADMIN_ACCESS." SET bs4_customers_remind = '2' WHERE customers_id = 'groups' LIMIT 1");
		xtc_db_query("UPDATE ".TABLE_ADMIN_ACCESS." SET bs4_customers_remind = '1' WHERE customers_id = '1' LIMIT 1");
		if ($_SESSION['customer_id'] > 1) {
			xtc_db_query("UPDATE ".TABLE_ADMIN_ACCESS." SET bs4_customers_remind = '1' WHERE customers_id = '".$_SESSION['customer_id']."' LIMIT 1") ;
		}

		$admin_access_bs4_tpl_manager_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs4_tpl_manager_theme'"));
		$admin_access_bs4_tpl_manager_config_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs4_tpl_manager_config'"));
		$admin_access_bs4_customers_remind_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM ".TABLE_ADMIN_ACCESS." WHERE Field='bs4_customers_remind'"));
		if(!$admin_access_bs4_tpl_manager_exists || !$admin_access_bs4_tpl_manager_config_exists || !$admin_access_bs4_customers_remind_exists) {
			$install = false;
		}

		if($install == true){
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_OK.TABLE_ADMIN_ACCESS, 'success');
		} else {
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_ERR.TABLE_ADMIN_ACCESS, 'error');
		}
		return $install;
	}

	function install_additional_modules() {
		global $messageStack;
		$install = true;

		xtc_db_query("CREATE TABLE IF NOT EXISTS " . TABLE_BS4_CUSTOMERS_REMIND . " (
			`remind_id` int(11) NOT NULL AUTO_INCREMENT,
			`customers_id` int(11) NOT NULL DEFAULT '0',
			`customers_gender` char(1) NOT NULL,
			`customers_firstname` varchar(32) NOT NULL DEFAULT '',
			`customers_lastname` varchar(32) NOT NULL DEFAULT '',
			`customers_email_address` varchar(96) NOT NULL DEFAULT '',
			`customers_language` varchar(32) DEFAULT NULL,
			`customers_st` varchar(4) NOT NULL DEFAULT '1',
			`products_id` int(11) NOT NULL DEFAULT '0',
			`products_ean` varchar(128) NOT NULL DEFAULT '',
			`products_name` varchar(255) NOT NULL DEFAULT '',
			`products_model` varchar(64) NOT NULL DEFAULT '',
			`products_image` varchar(64) DEFAULT NULL,
			`mail_head1` varchar(128) NOT NULL,
			`remind_date_added` datetime DEFAULT '0000-00-00 00:00:00',
			PRIMARY KEY (`remind_id`)
		)");

		if(!$this->table_exists(TABLE_BS4_CUSTOMERS_REMIND))	{
			$install = false;
		}
		if($install == true){
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_OK.TABLE_BS4_CUSTOMERS_REMIND, 'success');
		} else {
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ERR.TABLE_BS4_CUSTOMERS_REMIND, 'error');
		}
		// Content for modules product inquiry
		if (!xtc_db_query("INSERT INTO " . TABLE_CONTENT_MANAGER . " (`categories_id`, `parent_id`, `group_ids`, `languages_id`, `content_title`, `content_heading`, `content_text`, `sort_order`, `file_flag`, `content_file`, `content_status`, `content_group`, `content_delete`) VALUES
		(0, 0, '', 1, 'Question to article', 'Question to article', 'Do you have a question about this product? Please fill out the form, we will try to answer your question as soon as possible.<br />\r\n<br />\r\nThis Text can you edit under <b>Content-Manager</b>!', 0, 0, '', 0, 998, 1)"))
		{
			$install = false;
		}
		if (!xtc_db_query("INSERT INTO " . TABLE_CONTENT_MANAGER . " (`categories_id`, `parent_id`, `group_ids`, `languages_id`, `content_title`, `content_heading`, `content_text`, `sort_order`, `file_flag`, `content_file`, `content_status`, `content_group`, `content_delete`) VALUES
		(0, 0, '', 2, 'Frage zum Artikel', 'Frage zum Artikel', 'Sie haben eine Frage zu diesem Artikel? Bitte füllen Sie das Formular aus, wir versuchen Ihre Frage baldmöglichst zu beantworten.<br />\r\n<br />\r\nDiesen Text können sie bequem mit dem <b>Content-Manager</b> bearbeiten!', 0, 0, '', 0, 998, 1)"))
		{
			$install = false;
		}
		// Content for modules cheaply see
		if (!xtc_db_query("INSERT INTO " . TABLE_CONTENT_MANAGER . " (`categories_id`, `parent_id`, `group_ids`, `languages_id`, `content_title`, `content_heading`, `content_text`, `sort_order`, `file_flag`, `content_file`, `content_status`, `content_group`, `content_delete`) VALUES
		(0, 0, '', 1, 'More cheaply seen', 'More cheaply seen', 'Did you see the article at much a favourable price? Please you fill out the form, we try the price to undercut.<br />\r\n<br />\r\nThis Text can you edit under <b>Content-Manager</b>!', 0, 0, '', 0, 999, 1)"))
		{
			$install = false;
		}
		if (!xtc_db_query("INSERT INTO " . TABLE_CONTENT_MANAGER . " (`categories_id`, `parent_id`, `group_ids`, `languages_id`, `content_title`, `content_heading`, `content_text`, `sort_order`, `file_flag`, `content_file`, `content_status`, `content_group`, `content_delete`) VALUES
		(0, 0, '', 2, 'Billiger gesehen', 'Billiger gesehen', 'Haben Sie den Artikel zu einem viel günstigeren Preis gesehen? Bitte füllen Sie das Formular aus, wir versuchen den Preis zu unterbieten.<br />\r\n<br />\r\nDiesen Text können sie bequem mit dem <b>Content-Manager</b> bearbeiten!', 0, 0, '', 0, 999, 1)"))
		{
			$install = false;
		}

		if($install == true){
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_OK.TABLE_CONTENT_MANAGER, 'success');
		} else {
			$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_ERR.TABLE_CONTENT_MANAGER, 'error');
		}
		return $install;
	}

	function remove_tables($x) {
		global $messageStack;
		switch (true) {
			case $x > 3:
				xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " DROP `bs4_tpl_manager_theme`");
				xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " DROP `bs4_tpl_manager_config`");
				xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " DROP `bs4_customers_remind`");
				$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_REMOVED.TABLE_ADMIN_ACCESS, 'success');
			case $x > 2:
				xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key in ('" . implode("', '", $this->keys()) . "')");
				// Klassenerweiterungsmodul (bs4_checkifnewproduct.php) wird zeitgleich deinstalliert
				xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'MODULE_PRODUCT_BS4_CHECKIFNEWPRODUCT_%'");
				if (defined('MODULE_PRODUCT_INSTALLED')) {
					$installed = [];
					if (MODULE_PRODUCT_INSTALLED != '') $installed = explode(';', MODULE_PRODUCT_INSTALLED);
					if (($key = array_search('bs4_checkifnewproduct.php', $installed)) !== false) {
						unset($installed[$key]);
						xtc_db_query("UPDATE ".TABLE_CONFIGURATION." SET configuration_value = '" . implode(';', $installed) . "', last_modified = now() where configuration_key = 'MODULE_PRODUCT_INSTALLED'");
					}
				}
				$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_REMOVED.TABLE_CONFIGURATION, 'success');
			case $x > 1:
				xtc_db_query("DROP TABLE " . TABLE_BS4_TPL_MANAGER_THEME);
				$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_REMOVED.TABLE_BS4_TPL_MANAGER_THEME, 'success');
			case $x > 0:
				xtc_db_query("DROP TABLE " . TABLE_BS4_TPL_MANAGER_CONFIG);
				$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_REMOVED.TABLE_BS4_TPL_MANAGER_CONFIG, 'success');

				// Zusatzmodule entfernen
				xtc_db_query("DROP TABLE " . TABLE_BS4_CUSTOMERS_REMIND);
				$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_REMOVED.TABLE_BS4_CUSTOMERS_REMIND, 'success');
				xtc_db_query("DELETE FROM " . TABLE_CONTENT_MANAGER . " WHERE content_group = 998");
				$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_REMOVED.TABLE_CONTENT_MANAGER, 'success');
				xtc_db_query("DELETE FROM " . TABLE_CONTENT_MANAGER . " WHERE content_group = 999");
				$messageStack->add_session(MODULE_BS4_TPL_MANAGER_INSTALL_TABLE_ENTRY_REMOVED.TABLE_CONTENT_MANAGER, 'success');
		}
		return true;
	}

	function table_exists($table_name)
	{
	  $Table = xtc_db_query("show tables like '" . $table_name . "'");
	  if(xtc_db_fetch_row($Table) === false)
	  {
	    return(false);
	  } else {
	    return(true);
	  }
	}

}
?>