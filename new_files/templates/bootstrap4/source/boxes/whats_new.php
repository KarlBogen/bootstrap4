<?php
  /* -----------------------------------------------------------------------------------------
   $Id: whats_new.php 15626 2023-12-04 10:59:29Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(whats_new.php,v 1.31 2003/02/10); www.oscommerce.com
   (c) 2003  nextcommerce (whats_new.php,v 1.12 2003/08/21); www.nextcommerce.org
   (c) 2006 XT-Commerce

   Released under the GNU General Public License
   -----------------------------------------------------------------------------------------
   Third Party contributions:
   Enable_Disable_Categories 1.3 Autor: Mikel Williams | mikel@ladykatcostumes.com

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

// include smarty
include(DIR_FS_BOXES_INC . 'smarty_default.php');

// reset cache id
$cache_id = '';

$days = '';
if (MAX_DISPLAY_NEW_PRODUCTS_DAYS != '0') {
  $days = "AND p.products_date_added > '".date("Y-m-d", mktime(1, 1, 1, date("m"), date("d") - MAX_DISPLAY_NEW_PRODUCTS_DAYS, date("Y")))."'";
}

$current_prd =  (isset($_GET['products_id']) && (int)$_GET['products_id'] > 0) ? 'AND p.products_id != ' . (int)$_GET['products_id'] : '';

// get random product data
$whats_new_query = xtc_db_query("SELECT DISTINCT ".$product->default_select."
                                            FROM ".TABLE_PRODUCTS." p
                                            JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd 
                                                 ON p.products_id = pd.products_id 
                                                    AND pd.language_id = ".(int)$_SESSION['languages_id']."
                                                    AND trim(pd.products_name) != ''
                                            JOIN ".TABLE_PRODUCTS_TO_CATEGORIES." p2c
                                                 ON p.products_id = p2c.products_id
                                            JOIN ".TABLE_CATEGORIES." c
                                                 ON c.categories_id = p2c.categories_id 
                                                    AND c.categories_status = 1 
                                                        ".CATEGORIES_CONDITIONS_C."
                                           WHERE p.products_status = 1
                                                 " . PRODUCTS_CONDITIONS_P . "
                                                 " . $current_prd . "
                                                 " . $days . "                                           
                                        ORDER BY p.products_date_added DESC, p.products_id
                                           LIMIT ".MAX_RANDOM_SELECT_NEW);

if (xtc_db_num_rows($whats_new_query) > 0) {
  $content_array = array();
  while ($whats_new = xtc_db_fetch_array($whats_new_query)) {
    $content_array[] = $whats_new;
  }
  shuffle($content_array);
  $whats_new = $content_array[0];
  
  // set cache id
  $cache_id = md5('lID:'.$_SESSION['language'].'|csID:'.$_SESSION['customers_status']['customers_status_id'].'|curr:'.$_SESSION['currency'].'|pID:'.$whats_new['products_id'].'|country:'.((isset($_SESSION['country'])) ? $_SESSION['country'] : ((isset($_SESSION['customer_country_id'])) ? $_SESSION['customer_country_id'] : STORE_COUNTRY)));
  
  if (!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/box_whatsnew.html', $cache_id) || !$cache) {
    $box_smarty->assign('box_content', $product->buildDataArray($whats_new));
    $box_smarty->assign('LINK_NEW_PRODUCTS', xtc_href_link(FILENAME_PRODUCTS_NEW));
  }
}

if (!$cache) {
  $box_whats_new = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_whatsnew.html');
} else {
  $box_whats_new = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_whatsnew.html', $cache_id);
}

$smarty->assign('box_WHATSNEW', $box_whats_new);
