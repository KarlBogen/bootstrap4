<?php
/* -----------------------------------------------------------------------------------------
   $Id: specials.php 15626 2023-12-04 10:59:29Z GTB $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(specials.php,v 1.30 2003/02/10); www.oscommerce.com 
   (c) 2003	nextcommerce (specials.php,v 1.10 2003/08/17); www.nextcommerce.org
   (c) 2003 XT-Commerce (specials.php 1292 2005-10-07 mz); www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

defined('SPECIALS_CONDITIONS_S') or define('SPECIALS_CONDITIONS_S', 'AND s.status = \'1\' AND (now() >= s.start_date OR s.start_date IS NULL)');

// include smarty
include(DIR_FS_BOXES_INC . 'smarty_default.php');

// reset cache id
$cache_id = '';

$specials_query = xtc_db_query("SELECT ".$product->default_select.",
                                       s.expires_date,
                                       s.specials_new_products_price
                                  FROM ".TABLE_PRODUCTS." p
                                  JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd
                                       ON pd.products_id = p.products_id
                                          AND trim(pd.products_name) != ''
                                          AND pd.language_id = '".(int)$_SESSION['languages_id']."'
                                  JOIN ".TABLE_PRODUCTS_TO_CATEGORIES." p2c
                                       ON p.products_id = p2c.products_id
                                  JOIN ".TABLE_CATEGORIES." c
                                       ON c.categories_id = p2c.categories_id
                                          AND c.categories_status = 1
                                              ".CATEGORIES_CONDITIONS_C."
                                  JOIN ".TABLE_SPECIALS." s 
                                       ON p.products_id = s.products_id
                                          ".SPECIALS_CONDITIONS_S."
                                 WHERE p.products_status = '1'
                                       ".PRODUCTS_CONDITIONS_P."                                             
                              GROUP BY p.products_id
                              ORDER BY s.expires_date ASC, p.products_id
                                 LIMIT ".MAX_RANDOM_SELECT_SPECIALS);

if (xtc_db_num_rows($specials_query) > 0) {
  $content_array = array();
  while ($specials = xtc_db_fetch_array($specials_query)) {
    $content_array[] = $specials;
  }
  shuffle($content_array);
  $specials = $content_array[0];

  // set cache id
  $cache_id = md5('lID:'.$_SESSION['language'].'|csID:'.$_SESSION['customers_status']['customers_status_id'].'|curr:'.$_SESSION['currency'].'|pID:'.$specials['products_id'].'|country:'.((isset($_SESSION['country'])) ? $_SESSION['country'] : ((isset($_SESSION['customer_country_id'])) ? $_SESSION['customer_country_id'] : STORE_COUNTRY)));

  if (!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/box_specials.html', $cache_id) || !$cache) {
    $box_content = $product->buildDataArray($specials);
    $box_content['EXPIRES_DATE'] = $box_content['PRODUCTS_EXPIRES'] = ($specials['expires_date'] != '0000-00-00 00:00:00') ? xtc_date_short($specials['expires_date']) : '0';    
    $box_smarty->assign('box_content', $box_content);
    $box_smarty->assign('SPECIALS_LINK', xtc_href_link(FILENAME_SPECIALS));
  }
}

if (!$cache) {
  $box_specials = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_specials.html');
} else {
  $box_specials = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_specials.html', $cache_id);
}

$smarty->assign('box_SPECIALS', $box_specials);
