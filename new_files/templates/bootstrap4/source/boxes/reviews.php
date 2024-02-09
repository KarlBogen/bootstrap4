<?php
/* -----------------------------------------------------------------------------------------
   $Id: reviews.php 15626 2023-12-04 10:59:29Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(reviews.php,v 1.36 2003/02/12); www.oscommerce.com
   (c) 2003 nextcommerce (reviews.php,v 1.9 2003/08/17 22:40:08); www.nextcommerce.org
   (c) 2006 XT-Commerce (reviews.php 1262 2005-09-30)

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

// Fallback for older shopversion: Contanst MODULE_BANNER_MANAGER_STATUS and column reviews_status came both together in shopversion 2.0.1.0
$reviews_status = '';
if (defined('MODULE_BANNER_MANAGER_STATUS')) {
  $reviews_status = "AND r.reviews_status = '1'";
}

// include smarty
include(DIR_FS_BOXES_INC . 'smarty_default.php');

// reset cache id
$cache_id = '';

if ($product->isProduct() === true && $_SESSION['customers_status']['customers_status_write_reviews'] == '1') {
  
  // set cache id
  $cache_id = md5('lID:'.$_SESSION['language'].'|csID:'.$_SESSION['customers_status']['customers_status_id'].'|pID:'.$product->data['products_id'].'|country:'.((isset($_SESSION['country'])) ? $_SESSION['country'] : ((isset($_SESSION['customer_country_id'])) ? $_SESSION['customer_country_id'] : STORE_COUNTRY)));
  
  if (!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/box_reviews.html', $cache_id) || !$cache) {
    // display 'write a review' box
    $box_smarty->assign('REVIEWS_WRITE_REVIEW',BOX_REVIEWS_WRITE_REVIEW);
    $box_smarty->assign('REVIEWS_LINK', xtc_href_link(FILENAME_REVIEWS));
    $box_smarty->assign('PRODUCTS_LINK', xtc_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'products_id='.$product->data['products_id']));
  }
} elseif ($_SESSION['customers_status']['customers_status_read_reviews'] == 1) {

  $product_select = '';
  if ($product->isProduct() === true) {
    $product_select = "AND p.products_id = '" . $product->data['products_id'] . "'";
  }

  $reviews_query = "SELECT ".$product->default_select.",
                           r.reviews_id,
                           r.reviews_rating,
                           substring(rd.reviews_text, 1, 60) as reviews_text
                      FROM ".TABLE_REVIEWS." r
                      JOIN ".TABLE_REVIEWS_DESCRIPTION." rd
                           ON r.reviews_id = rd.reviews_id
                              AND rd.languages_id = '" . (int)$_SESSION['languages_id'] . "'
                      JOIN ".TABLE_PRODUCTS." p
                           ON p.products_id = r.products_id
                              ".$product_select."
                      JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd
                           ON p.products_id = pd.products_id
                              AND trim(pd.products_name) != ''
                              AND pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                      JOIN ".TABLE_PRODUCTS_TO_CATEGORIES." p2c
                           ON p.products_id = p2c.products_id
                      JOIN ".TABLE_CATEGORIES." c
                           ON c.categories_id = p2c.categories_id
                              AND c.categories_status = 1
                                  ".CATEGORIES_CONDITIONS_C."
                     WHERE p.products_status = '1'
                           ".PRODUCTS_CONDITIONS_P."
                           ".$reviews_status."
                  ORDER BY r.date_added ASC, p.products_id
                     LIMIT ".MAX_RANDOM_SELECT_REVIEWS;
  $reviews_query = xtc_db_query($reviews_query);
  
  if (xtc_db_num_rows($reviews_query) > 0) {                  
    $content_array = array();
    while ($reviews = xtc_db_fetch_array($reviews_query)) {
      $content_array[] = $reviews;
    }
    shuffle($content_array);
    $reviews = $content_array[0];
    
    // set cache id
    $cache_id = md5('lID:'.$_SESSION['language'].'|csID:'.$_SESSION['customers_status']['customers_status_id'].'|pID:'.($product->isProduct() === true ? $product->data['products_id'] : 0).'|rID:'.$reviews['reviews_id'].'|country:'.((isset($_SESSION['country'])) ? $_SESSION['country'] : ((isset($_SESSION['customer_country_id'])) ? $_SESSION['customer_country_id'] : STORE_COUNTRY)));
    
    if (!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/box_reviews.html', $cache_id) || !$cache) {

      // include needed functions
      require_once(DIR_FS_INC . 'xtc_break_string.inc.php');

      $productDataArray = $product->buildDataArray($reviews, 'thumbnail');
      foreach ($productDataArray as $key => $value) {
        $box_smarty->assign($key, $value);
      }

		if (defined('BS4_AWIDSRATINGBREAKDOWN') && BS4_AWIDSRATINGBREAKDOWN == 'true') {
			$average_percent = number_format(($reviews['reviews_rating']*100/5), 0, ',','');
			$review_image = '<span class="ratings" title="' . sprintf(BOX_REVIEWS_TEXT_OF_5_STARS, $reviews['reviews_rating']) . '"><span class="fas empty-stars"></span><span class="fas full-stars" style="width:' . $average_percent . '%"></span></span>';
			$review_image_microtag = '<span class="ratings" itemprop="rating" title="' . sprintf(BOX_REVIEWS_TEXT_OF_5_STARS, $reviews['reviews_rating']) . '"><span class="fas empty-stars"></span><span class="fas full-stars" style="width:' . $average_percent . '%"></span></span>';
		} else {
      $review_image = xtc_image('templates/' . CURRENT_TEMPLATE . '/img/stars_' . $reviews['reviews_rating'] . '.png' , sprintf(BOX_REVIEWS_TEXT_OF_5_STARS, $reviews['reviews_rating']));
      $review_image_microtag = xtc_image('templates/' . CURRENT_TEMPLATE . '/img/stars_' . $reviews['reviews_rating'] . '.png' , sprintf(BOX_REVIEWS_TEXT_OF_5_STARS, $reviews['reviews_rating']),'','','itemprop="rating"');
		}

      $box_smarty->assign('REVIEWS_LINK', xtc_href_link(FILENAME_REVIEWS));
      $box_smarty->assign('PRODUCTS_LINK', xtc_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $reviews['products_id'] . '&reviews_id=' . $reviews['reviews_id']));
//      $box_smarty->assign('REVIEWS', xtc_break_string(encode_htmlspecialchars($reviews['reviews_text']), 15, '-<br />'));
      $box_smarty->assign('REVIEWS', encode_htmlspecialchars($reviews['reviews_text']));
      $box_smarty->assign('REVIEWS_IMAGE', $review_image);
      $box_smarty->assign('REVIEWS_IMAGE_MICROTAG', $review_image_microtag);
      $box_smarty->assign('RANDOM', 1);

      if (defined('REVIEWS_PURCHASED_INFOS') && REVIEWS_PURCHASED_INFOS != '') {
        $shop_content_data = $main->getContentData(REVIEWS_PURCHASED_INFOS);
        if (count($shop_content_data) > 0) {
          $box_smarty->assign('REVIEWS_NOTE', $main->getContentLink(REVIEWS_PURCHASED_INFOS, $shop_content_data['content_title'], $request_type, false));
        }
      }
    }
  }
}

if (!$cache) {
  $box_reviews = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_reviews.html');
} else {
  $box_reviews = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_reviews.html', $cache_id);
}

$smarty->assign('box_REVIEWS', $box_reviews);
?>