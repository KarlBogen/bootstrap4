<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

/* ------------------------------------------------------------
	Module "Kundenerinnerung_Multilingual_advanced_modified-shop-2.0.3.0" made by Karl

	Based on: Kundenerinnerung_Multilingual_advanced_modified-shop-1.06
	Based on: xt-module.de customers remind
	erste Anpassung von: Fishnet Services - Gemsjäger 30.03.2012
	Zusatzfunktionen eingefügt sowie Fehler beseitigt von Ralph_84
	Aufgearbeitet für die Modified 1.06 rev4356 von Ralph_84

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

include ('includes/application_top.php');

if (defined('BS4_CUSTOMERS_REMIND') && BS4_CUSTOMERS_REMIND == 'true') {

	defined('DISPLAY_PRIVACY_CHECK') or define('DISPLAY_PRIVACY_CHECK', 'true');

	// redirect contact form to SSL if available
	if (ENABLE_SSL == true && $request_type == 'NONSSL' && isset($_GET['view']) && $_GET['view'] == 'nonssl') {
	  xtc_redirect(xtc_href_link(FILENAME_CUSTOMERS_REMIND, 'pID='.(int) $_GET['pID'].'&products_id='.(int) $_GET['products_id'].'&view=ssl', 'SSL'));
	}

	require_once (DIR_FS_INC.'xtc_get_products_name.inc.php');
	require_once (DIR_FS_INC . 'xtc_validate_email.inc.php');

	$smarty = new Smarty();

	// include boxes
	require (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/boxes.php');
    // include header
    require (DIR_WS_INCLUDES.'header.php');

	$privacy = isset($_POST['privacy']) && $_POST['privacy'] == 'privacy' ? true : false;
	$error = false;

	if (isset($_SESSION['customer_id'])) {

		$customer_id = (int)$_SESSION['customer_id'];
		$products_id = (int)$_GET['products_id'];
		$products_name = xtc_get_products_name($products_id);
		$smarty->assign('PRODUCTS_NAME', htmlentities($products_name));

		if (isset($_POST['action']) && $_POST['action'] == 'add_remind') {
			// Postcheck
			if(strlen($_POST['customers_input_firstname']) < ENTRY_FIRST_NAME_MIN_LENGTH) {
				$error = true;
				$messageStack->add('customers_remind', ENTRY_FIRST_NAME_ERROR);
			}
			if(strlen($_POST['customers_input_lastname']) < ENTRY_LAST_NAME_MIN_LENGTH) {
				$error = true;
				$messageStack->add('customers_remind', ENTRY_LAST_NAME_ERROR);
			}
			if(strlen($_POST['customers_input_email']) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH) {
				$error = true;
				$messageStack->add('customers_remind', ENTRY_EMAIL_ADDRESS_ERROR);
			}
			elseif(xtc_validate_email($_POST['customers_input_email']) == false) {
				$error = true;
				$messageStack->add('customers_remind', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
			}
	        $_POST['customers_input_st'] = intval($_POST['customers_input_st']);
			if($_POST['customers_input_st'] < 1) {
				$_POST['customers_input_st'] = 1;
	    	}
			if (DISPLAY_PRIVACY_CHECK == 'true' && empty($privacy)) {
				$error = true;
				$messageStack->add('customers_remind', ENTRY_PRIVACY_ERROR);
			}
			// Fehlermeldung anzeigen
			if($messageStack->size('customers_remind') > 0) {
				$smarty->assign('error', $messageStack->output('customers_remind'));
			}
		}

		$reg_query = xtc_db_query("SELECT * FROM ".TABLE_BS4_CUSTOMERS_REMIND." WHERE customers_id =". $customer_id . " AND products_id =".$products_id);
		$registred = xtc_db_fetch_array($reg_query);

		if (isset($_POST['action']) && $_POST['action'] == 'add_remind' && $error === false) {
			$sql_data_array = array (
				'customers_id' => $_SESSION['customer_id'],
				'products_id' => $product->data['products_id'],
				'products_ean' => $product->data['products_ean'],
				'products_name' => $product->data['products_name'],
				'products_model' => $product->data['products_model'],
				'products_image' => $product->data['products_image'],
				'customers_gender' => $_SESSION['customer_gender'],
				'customers_firstname' => xtc_db_prepare_input($_POST['customers_input_firstname']),
				'customers_lastname' => xtc_db_prepare_input($_POST['customers_input_lastname']),
				'customers_email_address' => xtc_db_prepare_input($_POST['customers_input_email']),
				'customers_language' => xtc_db_prepare_input($_POST['language_input']),
				'customers_st' => xtc_db_prepare_input($_POST['customers_input_st']),
				'mail_head1' => xtc_db_prepare_input($_POST['mail_input_head1']),
				'remind_date_added' => 'now()'
			);

			xtc_db_perform(TABLE_BS4_CUSTOMERS_REMIND, $sql_data_array);
			$smarty->assign('SUCCESS_MESSAGE', '2');

			if (defined('BS4_CUSTOMERS_REMIND_SENDMAIL') && BS4_CUSTOMERS_REMIND_SENDMAIL == 'true') {

				$create_html_body = '<h3>'.STORE_NAME.'</h3>';
				$create_html_body .= '<h4>'.CUSTOMERS_REMIND_EMAIL_HEADING.'</h4>';
				$create_html_body .= strip_tags($_POST['customers_input_firstname'])."  ".strip_tags($_POST['customers_input_lastname'])." [".$_SESSION['customer_id']."]<br>";
				$create_html_body .= CUSTOMERS_REMIND_EMAIL_1."<br><br>";
				$create_html_body .= HEADER_ARTICLE.": ".$product->data['products_name']."<br>";
				$create_html_body .= HEADER_MODEL.": ".$product->data['products_model']."<br><br>";
				$create_html_body .= "Link: ".HTTP_SERVER.DIR_WS_CATALOG.FILENAME_PRODUCT_INFO."?products_id=".$product->data['products_id']."<br><br>";

				$create_text_body = STORE_NAME."\n\n";
				$create_text_body .= CUSTOMERS_REMIND_EMAIL_HEADING.":\n--------------------\n";
				$create_text_body .= strip_tags($_POST['customers_input_firstname'])."  ".strip_tags($_POST['customers_input_lastname'])." [".$_SESSION['customer_id']."]\n";
				$create_text_body .= CUSTOMERS_REMIND_EMAIL_1."\n\n";
				$create_text_body .= HEADER_ARTICLE.": ".$product->data['products_name']."\n";
				$create_text_body .= HEADER_MODEL.": ".$product->data['products_model']."\n\n";
				$create_text_body .= "Link: ".HTTP_SERVER.DIR_WS_CATALOG.FILENAME_PRODUCT_INFO."?products_id=".$product->data['products_id']."\n\n";

				// EMAIL GENERIEREN
				xtc_php_mail(EMAIL_SUPPORT_ADDRESS, //von emailadresse
			                   EMAIL_SUPPORT_NAME, //von emailname
			                   CONTACT_US_EMAIL_ADDRESS,  //an emailadresse
			                   CONTACT_US_NAME, //an emailname
			                   CONTACT_US_FORWARDING_STRING, //bcc
			                   '', //antwortadresse
			                   '', //antwortname
			                   '', //anhang 1
			                   '', //antwortname
			                   CUSTOMERS_REMIND, //emailbetreff
			                   $create_html_body, // htmlnachricht
			                   $create_text_body // textnachricht
			                   );
			}
		} else {

			if (!empty($registred)) {
				$smarty->assign('SUCCESS_MESSAGE', '1');
			} else {
				$idStr = '<input type="hidden" name="products_id" value="'.$products_id.'"/><input type="hidden" name="action" value="add_remind"/>';

				$smarty->assign('FORM_ACTION_REMIND', xtc_draw_form('customers_remind', xtc_href_link(FILENAME_CUSTOMERS_REMIND, xtc_get_all_get_params(array('action')), 'SSL')).$idStr);

				$smarty->assign('CUSTOMERS_FIRSTNAME_INPUT', xtc_draw_input_field('customers_input_firstname', isset($_POST['customers_input_firstname']) ? xtc_db_prepare_input($_POST['customers_input_firstname']) :$_SESSION["customer_first_name"], 'class="form-control"'));
				$smarty->assign('CUSTOMERS_LASTNAME_INPUT', xtc_draw_input_field('customers_input_lastname', isset($_POST['customers_input_lastname']) ? xtc_db_prepare_input($_POST['customers_input_lastname']) :$_SESSION["customer_last_name"], 'class="form-control"'));
				$smarty->assign('CUSTOMERS_MAIL_INPUT', xtc_draw_input_field('customers_input_email', isset($_POST['customers_input_email']) ? xtc_db_prepare_input($_POST['customers_input_email']) :$_SESSION['customer_email_address'], 'class="form-control"'));
				$smarty->assign('CUSTOMERS_INPUT_ST', xtc_draw_input_field('customers_input_st', isset($_POST['customers_input_st']) ? xtc_db_prepare_input($_POST['customers_input_st']) : 1, 'class="form-control"'));

				$smarty->assign('FORM_END_REMIND', '</form>');
				$smarty->assign('SUCCESS_MESSAGE', '0');
				$smarty->assign('BUTTON_SUBMIT_REMIND', xtc_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
			}
		}
	}

	$smarty->assign('language', $_SESSION['language']);
	$smarty->caching = 0;

	if (DISPLAY_PRIVACY_CHECK == 'true') {
		$smarty->assign('PRIVACY_CHECKBOX', xtc_draw_checkbox_field('privacy', 'privacy', $privacy, 'id="privacy" class="form-check-input"'));
		$smarty->assign('PRIVACY_LINK', $main->getContentLink(2, MORE_INFO, $request_type));
	}
	if (isset($_GET['view'])) {
		$products_link = xtc_href_link(FILENAME_PRODUCT_INFO, xtc_product_link($product->data['products_id'],$product->data['products_name']));
		$smarty->assign('BUTTON_BACK', '<a href="'.$products_link.'">'. xtc_image_button('button_back.gif', IMAGE_BUTTON_BACK).'</a>');
		$smarty->assign('full', true);
		$main_content = $smarty->fetch(CURRENT_TEMPLATE.'/module/reminder.html');
		$smarty->assign('main_content', $main_content);
		$smarty->display(CURRENT_TEMPLATE.'/index.html');
		include ('includes/application_bottom.php');
	} else {
		$smarty->display(CURRENT_TEMPLATE.'/module/reminder.html');
		include ('includes/application_bottom.php');
	}
}
?>