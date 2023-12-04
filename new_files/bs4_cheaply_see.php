<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

/*
	*	Billiger gesehen
	*	17.02.2006
	
	xtended HAPE ( version with Captcha)
*/

// Die Get-Variable "view" wird benutzt um die Ausgabe zu variieren.
// Läuft der Shop komplett auf "https", wird das Anfrageformular in der Modalbox geöffnet, ansonsten wird auf eine "Fullcontentseite" weitergeleitet

	require('includes/application_top.php');

	if (!isset($_GET['pID'])) xtc_redirect(xtc_href_link(FILENAME_DEFAULT));

	defined('DISPLAY_PRIVACY_CHECK') or define('DISPLAY_PRIVACY_CHECK', 'true');

	// redirect contact form to SSL if available
	if (ENABLE_SSL == true && $request_type == 'NONSSL' && isset($_GET['view']) && $_GET['view'] == 'nonssl') {
	  xtc_redirect(xtc_href_link(FILENAME_CHEAPLY_SEE, 'pID='.(int) $_GET['pID'].'&products_id='.(int) $_GET['products_id'].'&view=ssl', 'SSL'));
	}

	//vvcode
	require_once(DIR_WS_CLASSES.'modified_captcha.php');
	$mod_captcha = $_mod_captcha_class::getInstance();
	defined('MODULE_CAPTCHA_CODE_LENGTH') or define('MODULE_CAPTCHA_CODE_LENGTH', 6);
	defined('MODULE_CAPTCHA_LOGGED_IN') or define('MODULE_CAPTCHA_LOGGED_IN', 'True');

	require_once(DIR_FS_INC . 'xtc_validate_email.inc.php');
	require_once(DIR_FS_INC . 'xtc_get_vpe_name.inc.php');
	require_once(DIR_FS_INC . 'get_customers_gender.inc.php');

	$smarty = new Smarty();

	// include boxes
	require (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/boxes.php');

    // include header
    require (DIR_WS_INCLUDES.'header.php');

	// load content
	$shop_content_query = xtc_db_query("SELECT
		content_title,
		content_heading,
		content_text
		FROM ".TABLE_CONTENT_MANAGER."
		WHERE content_group = ".BS4_CHEAPLY_SEE_CONTENT_GROUP."
		AND languages_id = '".(int)$_SESSION['languages_id']."'");
			
	$shop_content_data = xtc_db_fetch_array($shop_content_query);

	// load products data
	$products = new product((int)$_GET['pID']);
	if (!is_object($products) || $products->isProduct() === false) {
		// product not found in database
		xtc_redirect(xtc_href_link(FILENAME_DEFAULT, '', 'SSL'));
	}
	$products_price = $xtPrice->xtcGetPrice($products->data['products_id'], $format = true, 1, $products->data['products_tax_class_id'], $products->data['products_price'], 1);

	// TEMPLATE VARIABLES
	$smarty->assign('TITLE',$shop_content_data['content_heading']);
	$smarty->assign('tpl_path',HTTP_SERVER . DIR_WS_CATALOG . 'templates/'. CURRENT_TEMPLATE .'/');
	$smarty->assign('CONTENT_HEADING',$shop_content_data['content_heading']);
	$smarty->assign('CONTENT_TEXT',$shop_content_data['content_text']);
	$smarty->assign('PRODUCTS_MODEL', $products->data['products_model']);
	$smarty->assign('PRODUCTS_NAME', $products->data['products_name']);
	$smarty->assign('PRODUCTS_SHORT_DESCRIPTION', stripslashes($products->data['products_short_description']));
	$smarty->assign('PRODUCTS_PRICE', $products_price['formated']);
	$smarty->assign('HEADING_FORMULAR', CHEAPLY_SEE_HEADING_FORMULAR);
	
	if($_SESSION['customers_status']['customers_status_show_price'] != 0) {
    $tax_rate = isset($xtPrice->TAX[$products->data['products_tax_class_id']]) ? $xtPrice->TAX[$products->data['products_tax_class_id']] : 0;
		if($tax_rate > 0 && $_SESSION['customers_status']['customers_status_show_price_tax'] != 0) {
			$smarty->assign('PRODUCTS_TAX_INFO', sprintf(TAX_INFO_INCL, $tax_rate.' %'));
		} 
		if($tax_rate > 0 && $_SESSION['customers_status']['customers_status_show_price_tax'] == 0 && $_SESSION['customers_status']['customers_status_add_tax_ot'] == 1) {
			$smarty->assign('PRODUCTS_TAX_INFO', sprintf(TAX_INFO_ADD, $tax_rate.' %'));
		}
		if($tax_rate > 0 && $_SESSION['customers_status']['customers_status_show_price_tax'] == 0 && $_SESSION['customers_status']['customers_status_add_tax_ot'] == 0) {
			$smarty->assign('PRODUCTS_TAX_INFO', sprintf(TAX_INFO_EXCL, $tax_rate.' %'));
		}
	}
	if(SHOW_SHIPPING=='true') {
		$smarty->assign('PRODUCTS_SHIPPING_LINK',' '.SHIPPING_EXCL.' '.SHIPPING_COSTS);
	}	
	$image = '';
	if($products->data['products_image'] != ''){
		$image = DIR_WS_INFO_IMAGES . $products->data['products_image'];}
	$smarty->assign('PRODUCTS_IMAGE', $image);
	// VPE
	if($products->data['products_vpe_status'] == 1 && $products->data['products_vpe_value'] != 0.0 && $products_price['plain'] > 0){
		$smarty->assign('PRODUCTS_VPE', $xtPrice->xtcFormat($products_price['plain'] * (1 / $products->data['products_vpe_value']), true).TXT_PER.xtc_get_vpe_name($products->data['products_vpe']));
	}

	// Anfragetext
	$text_body = TEXT_PRODUCTS_CHEAPLY_NOTE."\n\n"
		.TEXT_PRODUCTS_CHEAPLY_NAME.$products->data['products_name']."\n"
		.TEXT_PRODUCTS_CHEAPLY_NUMBER.$products->data['products_model']."\n\n"
			.TEXT_PRODUCTS_CHEAPLY_NOTE2;	

	//-- FEHLERMELDUNG ERZEUGEN ----------------------------------------------------------------------------------
	$privacy = isset($_POST['privacy']) && $_POST['privacy'] == 'privacy' ? true : false;
	$error = false;
	if(isset($_GET['action']) && ($_GET['action'] == 'send')) {
		if(strlen($_POST['firstname']) < ENTRY_FIRST_NAME_MIN_LENGTH) {
			$error = true;
			$messageStack->add('cheaply_see', ENTRY_FIRST_NAME_ERROR);
		}
		if(strlen($_POST['lastname']) < ENTRY_LAST_NAME_MIN_LENGTH) {
			$error = true;
			$messageStack->add('cheaply_see', ENTRY_LAST_NAME_ERROR);
		}
		if(strlen($_POST['email']) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH) {
			$error = true;
			$messageStack->add('cheaply_see', ENTRY_EMAIL_ADDRESS_ERROR);
		}
		elseif(xtc_validate_email($_POST['email']) == false) {
			$error = true;
			$messageStack->add('cheaply_see', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
		}
		if($_POST['competitorurl'] == '') {
			$error = true;
			$messageStack->add('cheaply_see', ENTRY_COMPETITORURL_CHECK_ERROR);
		}
		elseif(!validate_url($_POST['competitorurl'])) {
			$error = true;
			$messageStack->add('cheaply_see', ENTRY_COMPETITORURL_VALIDATION_ERROR);
		}
		if($_POST['competitorprice'] == '') {
			$error = true;
			$messageStack->add('cheaply_see', ENTRY_COMPETITORPRICE_CHECK_ERROR);
    	}
		if (DISPLAY_PRIVACY_CHECK == 'true' && empty($privacy)) {
			$error = true;
			$messageStack->add('cheaply_see', ENTRY_PRIVACY_ERROR);
		}
		//vvcode
		if (!isset($_SESSION['customer_id']) || MODULE_CAPTCHA_LOGGED_IN == 'True') {
			if ($mod_captcha->validate((isset($_POST['vvcode'])) ? $_POST['vvcode'] : '') !== true) {
   				$error = true;
        		$messageStack->add('cheaply_see', ENTRY_VVCODE_CHECK_ERROR);
			}
		}
		if ($error === false) {

			$gender = '';
			$post_gender = strip_tags($_POST['gender']);
			if ($post_gender == 'm') {
				$gender = MALE;
			} elseif ($post_gender == 'f') {
				$gender = FEMALE;
			} elseif ($post_gender == 'd') {
				$gender = DIVERSE;
			}

			// Email bilden
			$create_name = strip_tags($_POST['firstname']).' '.strip_tags($_POST['lastname']);
			$create_subject = strip_tags($_POST['subject']);

			$create_html_body = '<h3>'.STORE_NAME.'</h3>';
			$create_html_body .= '<h4>'.CHEAPLY_SEE_HEADING_FORMULAR.'</h4>';
			$create_html_body .= $gender."<br>";
			$create_html_body .= $create_name."<br>";
			$create_html_body .= BS4_EMAIL.strip_tags($_POST['email'])."<br><br>";
			$create_html_body .= BS4_COMPETITORURL.strip_tags($_POST['competitorurl'])."<br>";
			$create_html_body .= BS4_COMPETITORPRICE.strip_tags($_POST['competitorprice'])."<br><br>";
			$create_html_body .= HEADER_ARTICLE.": ".$products->data['products_name']."<br>";
			$create_html_body .= HEADER_MODEL.": ".$products->data['products_model']."<br><br>";
			$create_html_body .= BS4_SUBJECT.$create_subject."<br><br>";
			$create_html_body .= nl2br(strip_tags($_POST['message_body']))."<br><br>";

			$create_text_body = STORE_NAME."\n\n";
			$create_text_body .= CHEAPLY_SEE_HEADING_FORMULAR.":\n--------------------\n";
			$create_text_body .= $gender."\n";
			$create_text_body .= $create_name."\n";
			$create_text_body .= BS4_EMAIL.strip_tags($_POST['email'])."\n\n";
			$create_text_body .= BS4_COMPETITORURL.strip_tags($_POST['competitorurl'])."\n";
			$create_text_body .= BS4_COMPETITORPRICE.strip_tags($_POST['competitorprice'])."\n\n";
			$create_text_body .= HEADER_ARTICLE.": ".$products->data['products_name']."\n";
			$create_text_body .= HEADER_MODEL.": ".$products->data['products_model']."\n\n";
			$create_text_body .= BS4_SUBJECT.$create_subject."\n\n";
			$create_text_body .= "\n--------------------\n".strip_tags($_POST['message_body'])."\n\n";

			// EMAIL GENERIEREN
			xtc_php_mail($_POST['email'], //von emailadresse
		                   $create_name, //von emailname
		                   CONTACT_US_EMAIL_ADDRESS,  //an emailadresse
		                   CONTACT_US_NAME, //an emailname
		                   CONTACT_US_FORWARDING_STRING, //bcc
		                   $_POST['email'], //antwortadresse
		                   $create_name, //antwortname
		                   '', //anhang 1
		                   '', //antwortname
		                   $create_subject, //emailbetreff
		                   $create_html_body, // htmlnachricht
		                   $create_text_body // textnachricht
		                   );

			$smarty->assign('success','1');
	    }
		
	}
	
	// Fehlermeldung anzeigen
	if($messageStack->size('cheaply_see') > 0) {
		$smarty->assign('error', $messageStack->output('cheaply_see'));
	}	
	
	// ANREDE
    $gender_selected = $error ? $_POST['gender'] : (isset($_SESSION["customer_gender"]) ? $_SESSION["customer_gender"] : '');
	$select_gender = xtc_draw_pull_down_menu('gender', get_customers_gender(), $gender_selected, 'class="form-control form-control-sm"');

	// FORMULAR
	$view = '';
    if (isset($_GET['view'])) {
		$view = '&view=ssl';
	}
	$smarty->assign('FORM_ACTION',xtc_draw_form('cheaply_see', xtc_href_link(FILENAME_CHEAPLY_SEE, 'action=send&pID='.$products->data['products_id'].'&'.xtc_product_link($products->data['products_id'],$products->data['products_name']).$view, 'SSL'), 'post', 'class="form-horizontal"'));
	if (!isset($_SESSION['customer_id']) || MODULE_CAPTCHA_LOGGED_IN == 'True') {
		$smarty->assign('VVIMG', $mod_captcha->get_image_code());
	    $smarty->assign('INPUT_CODE', xtc_draw_input_field('vvcode', '', 'class="form-control form-control-sm" maxlength="6"', 'text', false));
	}
	$smarty->assign('SELECT_GENDER',$select_gender);
	$smarty->assign('INPUT_FIRSTNAME',xtc_draw_input_field('firstname', ($error ? $_POST['firstname'] : (isset($_SESSION["customer_first_name"]) ? $_SESSION["customer_first_name"] : '')),'class="form-control form-control-sm"'));
	$smarty->assign('INPUT_LASTNAME',xtc_draw_input_field('lastname', ($error ? $_POST['lastname'] : (isset($_SESSION["customer_last_name"]) ? $_SESSION["customer_last_name"] : '')),'class="form-control form-control-sm"'));
	$smarty->assign('INPUT_EMAIL',xtc_draw_input_field('email', ($error ? $_POST['email'] : (isset($_SESSION["customer_email_address"]) ? $_SESSION["customer_email_address"] : '')), 'class="form-control form-control-sm"'));
	$smarty->assign('SELECT_SUBJECT', xtc_draw_input_field('subject', ($error ? $_POST['subject'] : CONTACT_SUBJECT_4),'class="form-control form-control-sm"'));
	$smarty->assign('INPUT_COMPETITOR_URL',xtc_draw_input_field('competitorurl', ($error ? $_POST['competitorurl'] : ''),'class="form-control form-control-sm"'));
	$smarty->assign('INPUT_COMPETITOR_PRICE',xtc_draw_input_field('competitorprice', ($error ? $_POST['competitorprice'] : ''),'class="form-control form-control-sm"'));
	$smarty->assign('INPUT_TEXT',xtc_draw_textarea_field('message_body', 'soft', 50, 12, $text_body, 'class="form-control form-control-sm"'));
	$smarty->assign('BUTTON_SUBMIT', xtc_image_submit('button_send.gif', IMAGE_BUTTON_SEND));
	$smarty->assign('FORM_END','</form>');

	$smarty->assign('language', $_SESSION['language']);

	$smarty->caching = 0;
	// disable cache
	$disable_smarty_cache = true;

	if (DISPLAY_PRIVACY_CHECK == 'true') {
		$smarty->assign('PRIVACY_CHECKBOX', xtc_draw_checkbox_field('privacy', 'privacy', $privacy, 'id="privacy" class="form-check-input"'));
		$smarty->assign('PRIVACY_LINK', $main->getContentLink(2, MORE_INFO, $request_type));
	}
	if (isset($_GET['view'])) {
		$products_link = xtc_href_link(FILENAME_PRODUCT_INFO, xtc_product_link($product->data['products_id'],$product->data['products_name']));
		$smarty->assign('BUTTON_BACK', '<a href="'.$products_link.'">'. xtc_image_button('button_back.gif', IMAGE_BUTTON_BACK).'</a>');
		$smarty->assign('full', true);
		$main_content = $smarty->fetch(CURRENT_TEMPLATE.'/module/cheaply_see.html');
		$smarty->assign('main_content', $main_content);
		$smarty->display(CURRENT_TEMPLATE.'/index.html');
		include ('includes/application_bottom.php');
	} else {
		$smarty->display(CURRENT_TEMPLATE.'/module/cheaply_see.html');
		include ('includes/application_bottom.php');
	}

	function validate_url($url) {
	    $path = parse_url($url, PHP_URL_PATH);
	    $encoded_path = array_map('urlencode', explode('/', $path));
	    $url = str_replace($path, implode('/', $encoded_path), $url);

	    return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
	}

?>