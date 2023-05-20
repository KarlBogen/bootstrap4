<?php
/* -----------------------------------------------------------------------------------------
   $Id: boxes.php 13969 2022-01-21 11:36:09Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2006 XT-Commerce
   
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

// define full content sites
$fullcontent = array(FILENAME_CHECKOUT_SHIPPING,
                     FILENAME_CHECKOUT_PAYMENT,
                     FILENAME_CHECKOUT_CONFIRMATION,
                     FILENAME_CHECKOUT_SUCCESS,
                     FILENAME_CHECKOUT_SHIPPING_ADDRESS,
                     FILENAME_CHECKOUT_PAYMENT_ADDRESS,
                     FILENAME_COOKIE_USAGE,
                     FILENAME_ACCOUNT,
                     FILENAME_ACCOUNT_EDIT,
                     FILENAME_ACCOUNT_HISTORY,
                     FILENAME_ACCOUNT_HISTORY_INFO,
                     FILENAME_ACCOUNT_PASSWORD,
                     FILENAME_ACCOUNT_DELETE,
                     FILENAME_ACCOUNT_CHECKOUT_EXPRESS,
                     FILENAME_CREATE_ACCOUNT,
                     FILENAME_CREATE_GUEST_ACCOUNT,
                     FILENAME_ADDRESS_BOOK,
                     FILENAME_ADDRESS_BOOK_PROCESS,
                     FILENAME_PASSWORD_DOUBLE_OPT,
                     FILENAME_ADVANCED_SEARCH_RESULT,
                     FILENAME_ADVANCED_SEARCH,
                     FILENAME_SHOPPING_CART,
                     FILENAME_GV_SEND,
                     FILENAME_NEWSLETTER,
                     FILENAME_LOGIN,
                     FILENAME_CONTENT,
                     FILENAME_REVIEWS,
                     FILENAME_WISHLIST,
                     FILENAME_CHECKOUT_PAYMENT_IFRAME,
                     );

	if (defined('FILENAME_CHEAPLY_SEE')) {
		$fullcontent[] = FILENAME_CHEAPLY_SEE;
	}
	if (defined('FILENAME_PRODUCT_INQUIRY')) {
		$fullcontent[] = FILENAME_PRODUCT_INQUIRY;
	}
	if (defined('FILENAME_CUSTOMERS_REMIND')) {
		$fullcontent[] = FILENAME_CUSTOMERS_REMIND;
	}
	// Produktdetail / -infoansicht als "Fullcontent" anzeigen - einzustellen in der config.php
	if (BS4_PROD_DETAIL_FULLCONTENT == 'true') {
		$fullcontent[] = FILENAME_PRODUCT_INFO;
	}

	// Produktlisten Fullcontent (sollen die Produktansichten fullcontent sein)
	if (BS4_PROD_LIST_FULLCONTENT == 'true') {
		$fullcontent[] = FILENAME_SPECIALS;
		$fullcontent[] = FILENAME_PRODUCTS_NEW;
		if (basename($PHP_SELF) == FILENAME_DEFAULT && isset($_GET['cPath'])) {
			$smarty->assign('fullcontent', true);
			defined('BS4_FULLCONTENT') or define('BS4_FULLCONTENT', 'true');
		}
	}

	// smarty full content
	if (in_array(basename($PHP_SELF), $fullcontent)) {
		$smarty->assign('fullcontent', true);
		defined('BS4_FULLCONTENT') or define('BS4_FULLCONTENT', 'true');
	}

// -----------------------------------------------------------------------------------------
//	Beginn "alle Boxen ausgeblendet"
// -----------------------------------------------------------------------------------------
if (BS4_HIDE_ALL_BOXES != 'true'){
// -----------------------------------------------------------------------------------------
//	full content
// -----------------------------------------------------------------------------------------
  if (!in_array(basename($PHP_SELF), $fullcontent)) {
		if (BS4_STARTPAGE_BOX_MANUFACTURERS != 'false' || BS4_NOT_STARTPAGE_BOX_MANUFACTURERS != 'false'){
	    require_once(DIR_FS_BOXES . 'manufacturers.php');
		}
		if (BS4_STARTPAGE_BOX_LAST_VIEWED != 'false' || BS4_NOT_STARTPAGE_BOX_LAST_VIEWED != 'false'){
	    require_once(DIR_FS_BOXES . 'last_viewed.php');
		}
  }
// -----------------------------------------------------------------------------------------
//	always visible
// -----------------------------------------------------------------------------------------
	if (BS4_STARTPAGE_BOX_INFOBOX != 'false' || BS4_NOT_STARTPAGE_BOX_INFOBOX != 'false'){
	  require_once(DIR_FS_BOXES . 'infobox.php');
	}
	if (BS4_STARTPAGE_BOX_LOGIN != 'false' || BS4_NOT_STARTPAGE_BOX_LOGIN != 'false'){
  	require_once(DIR_FS_BOXES . 'loginbox.php');
	}
	if (BS4_STARTPAGE_BOX_CUSTOM != 'false' || BS4_NOT_STARTPAGE_BOX_CUSTOM != 'false'){
  	require_once(DIR_FS_BOXES . 'custom.php');
	}
  if (defined('MODULE_TS_TRUSTEDSHOPS_ID')
      && MODULE_TS_REVIEW_STICKER != ''
      && MODULE_TS_REVIEW_STICKER_STATUS == '1'
      )
  {
		if (BS4_STARTPAGE_BOX_TRUSTEDSHOPS != 'false' || BS4_NOT_STARTPAGE_BOX_TRUSTEDSHOPS != 'false'){
	    require_once(DIR_FS_BOXES . 'trustedshops.php');
		}
  }
// -----------------------------------------------------------------------------------------
//	only logged id users
// -----------------------------------------------------------------------------------------
  if (isset($_SESSION['customer_id'])) {
		if (BS4_STARTPAGE_BOX_HISTORY != 'false' || BS4_NOT_STARTPAGE_BOX_HISTORY != 'false'){
	    require_once(DIR_FS_BOXES . 'order_history.php');
		}
  }
// -----------------------------------------------------------------------------------------
//	only if reviews allowed
// -----------------------------------------------------------------------------------------
  if ($_SESSION['customers_status']['customers_status_read_reviews'] == '1') {
		if (BS4_STARTPAGE_BOX_REVIEWS != 'false' || BS4_NOT_STARTPAGE_BOX_REVIEWS != 'false'){
    	require_once(DIR_FS_BOXES . 'reviews.php');
		}
  }
// -----------------------------------------------------------------------------------------
//	hide during checkout
// -----------------------------------------------------------------------------------------
  if (substr(basename($PHP_SELF), 0, 8) != 'checkout') {
		if (BS4_STARTPAGE_BOX_CURRENCIES != 'false' || BS4_NOT_STARTPAGE_BOX_CURRENCIES != 'false'){
	    require_once(DIR_FS_BOXES . 'currencies.php');
		}
		if (BS4_STARTPAGE_BOX_SHIPPING_COUNTRY != 'false' || BS4_NOT_STARTPAGE_BOX_SHIPPING_COUNTRY != 'false'){
	    require_once(DIR_FS_BOXES . 'shipping_country.php');
		}
  }
// -----------------------------------------------------------------------------------------
//	product details
// -----------------------------------------------------------------------------------------
  if ($product->isProduct() === true) {
		if (BS4_STARTPAGE_BOX_MANUFACTURERS_INFO != 'false' || BS4_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO != 'false'){
    	require_once(DIR_FS_BOXES . 'manufacturer_info.php');
		}
  } else {
    if ($_SESSION['customers_status']['customers_status_specials'] == '1' && BS4_SPECIALS_CATEGORIES == 'false') {
			if (BS4_STARTPAGE_BOX_SPECIALS != 'false' || BS4_NOT_STARTPAGE_BOX_SPECIALS != 'false'){
	      require_once(DIR_FS_BOXES . 'specials.php');
			}
    }
  }
// -----------------------------------------------------------------------------------------
//	only if show price
// -----------------------------------------------------------------------------------------
  if ($_SESSION['customers_status']['customers_status_show_price'] == '1') {
    if (BS4_STARTPAGE_BOX_ADD_QUICKIE != 'false' || BS4_NOT_STARTPAGE_BOX_ADD_QUICKIE != 'false'){
			require_once(DIR_FS_BOXES . 'add_a_quickie.php');
		}
    if (defined('MODULE_WISHLIST_SYSTEM_STATUS') && MODULE_WISHLIST_SYSTEM_STATUS == 'true') {
      require_once(DIR_FS_BOXES . 'wishlist.php');
    }
  }
// -----------------------------------------------------------------------------------------
//	hide in search
// -----------------------------------------------------------------------------------------
  if (substr(basename($PHP_SELF), 0,8) != 'advanced' && BS4_WHATSNEW_CATEGORIES == 'false') {
		if (BS4_STARTPAGE_BOX_WHATSNEW != 'false' || BS4_NOT_STARTPAGE_BOX_WHATSNEW != 'false'){
	    require_once(DIR_FS_BOXES . 'whats_new.php');
		}
  }
}
// -----------------------------------------------------------------------------------------
//	Ende "alle Boxen ausgeblendet"
// -----------------------------------------------------------------------------------------
// -----------------------------------------------------------------------------------------
//	always visible
// -----------------------------------------------------------------------------------------
  require_once(DIR_FS_BOXES . 'categories.php');
  require_once(DIR_FS_BOXES . 'search.php');
  require_once(DIR_FS_BOXES . 'content.php');
  require_once(DIR_FS_BOXES . 'information.php');
  require_once(DIR_FS_BOXES . 'miscellaneous.php');
  require_once(DIR_FS_BOXES . 'languages.php');
  if (!defined('MODULE_NEWSLETTER_STATUS') || MODULE_NEWSLETTER_STATUS == 'true') {
    require_once(DIR_FS_BOXES . 'newsletter.php');
  }
// -----------------------------------------------------------------------------------------
//	only if show price
// -----------------------------------------------------------------------------------------
  if ($_SESSION['customers_status']['customers_status_show_price'] == '1') {
    require_once(DIR_FS_BOXES . 'shopping_cart.php');
  }
// -----------------------------------------------------------------------------------------
//	admins only
// -----------------------------------------------------------------------------------------
  if ($_SESSION['customers_status']['customers_status'] == '0') {
    require_once(DIR_FS_BOXES . 'admin.php');
    $smarty->assign('is_admin', true);
  }

// -----------------------------------------------------------------------------------------
// Smarty home
// -----------------------------------------------------------------------------------------
$smarty->assign('home', ((basename($PHP_SELF) == FILENAME_DEFAULT && !isset($_GET['cPath']) && !isset($_GET['manufacturers_id'])) ? 1 : 0));

// -----------------------------------------------------------------------------------------
// Smarty bestseller
// -----------------------------------------------------------------------------------------
$smarty->assign('bestseller', false);
$bestsellers = array(FILENAME_DEFAULT,
                     FILENAME_LOGOFF,
                     FILENAME_CHECKOUT_SUCCESS,
                     FILENAME_SHOPPING_CART,
                     FILENAME_NEWSLETTER
                     );
if (in_array(basename($PHP_SELF), $bestsellers) && !isset($_GET['cPath']) && !isset($_GET['manufacturers_id'])) {
  require_once(DIR_FS_BOXES . 'best_sellers.php');
  $smarty->assign('bestseller', true);
}
// -----------------------------------------------------------------------------------------

$smarty->assign('tpl_path', DIR_WS_BASE.'templates/'.CURRENT_TEMPLATE.'/');
