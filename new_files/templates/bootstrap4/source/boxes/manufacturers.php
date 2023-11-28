<?php
/* -----------------------------------------------------------------------------------------
   $Id: manufacturers.php 14645 2022-07-13 06:00:44Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(manufacturers.php,v 1.18 2003/02/10); www.oscommerce.com
   (c) 2003 nextcommerce (manufacturers.php,v 1.9 2003/08/17); www.nextcommerce.org
   (c) 2006 XT-Commerce

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/
   
// include smarty
include(DIR_FS_BOXES_INC . 'smarty_default.php');

// set cache id
$cache_id = md5('lID:'.$_SESSION['language'].'|mID:'.(isset($_GET['manufacturers_id']) ? (int)$_GET['manufacturers_id'] : '0'));

if (!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/box_manufacturers.html', $cache_id) || !$cache) {
  $box_content = '';
  
  $manufacturers_query = "SELECT m.*
                            FROM ".TABLE_MANUFACTURERS." as m
                            JOIN ".TABLE_PRODUCTS." as p 
                                 ON m.manufacturers_id = p.manufacturers_id
                                    AND p.products_status = '1'
                                        ".PRODUCTS_CONDITIONS_P."
                            JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd
                                 ON p.products_id = pd.products_id
                                    AND pd.language_id = '".(int)$_SESSION['languages_id']."'
                                    AND trim(pd.products_name) != ''
                            JOIN ".TABLE_PRODUCTS_TO_CATEGORIES." p2c 
                                 ON p2c.products_id = pd.products_id
                            JOIN ".TABLE_CATEGORIES." c
                                 ON c.categories_id = p2c.categories_id
                                    AND c.categories_status = 1
                                        ".CATEGORIES_CONDITIONS_C."
                           WHERE m.manufacturers_status = 1
                        GROUP BY m.manufacturers_id 
                        ORDER BY m.sort_order, m.manufacturers_name ASC";
  $manufacturers_query = xtDBquery($manufacturers_query);
  $manufacturers_count = xtc_db_num_rows($manufacturers_query, true);
  if ($manufacturers_count > 0) {

    if ($manufacturers_count <= MAX_DISPLAY_MANUFACTURERS_IN_A_LIST) {

      // Display a list
      while ($manufacturers = xtc_db_fetch_array($manufacturers_query, true)) {
        $manufacturers_name = ((strlen($manufacturers['manufacturers_name']) > MAX_DISPLAY_MANUFACTURER_NAME_LEN) ? substr($manufacturers['manufacturers_name'], 0, MAX_DISPLAY_MANUFACTURER_NAME_LEN).'..' : $manufacturers['manufacturers_name']);
        if (isset ($_GET['manufacturers_id']) && ($_GET['manufacturers_id'] == $manufacturers['manufacturers_id'])) {
          $manufacturers_name = '<strong>'.$manufacturers_name.'</strong>';
        }
        $box_content .= '<a class="btn btn-link" href="'.xtc_href_link(FILENAME_DEFAULT, xtc_manufacturer_link($manufacturers['manufacturers_id'],$manufacturers['manufacturers_name'])).'">'.$manufacturers_name.'</a>';
      }

    } else {
      // Display a drop-down
      $js = 'location = form.manufacturers_id.options[form.manufacturers_id.selectedIndex].value;';
      $manufacturers_array = array ();
        $manufacturers_array[] = array ('id' => '', 'text' => PULL_DOWN_DEFAULT);
        $js = 'if (form.manufacturers_id.selectedIndex != 0) location = form.manufacturers_id.options[form.manufacturers_id.selectedIndex].value;';

      while ($manufacturers = xtc_db_fetch_array($manufacturers_query, true)) {
        $manufacturers_name = ((strlen($manufacturers['manufacturers_name']) > MAX_DISPLAY_MANUFACTURER_NAME_LEN) ? substr($manufacturers['manufacturers_name'], 0, MAX_DISPLAY_MANUFACTURER_NAME_LEN).'..' : $manufacturers['manufacturers_name']);
        $manufacturers_array[] = array ('id' => xtc_href_link(FILENAME_DEFAULT,xtc_manufacturer_link($manufacturers['manufacturers_id'],$manufacturers['manufacturers_name'])), 'text' => $manufacturers_name);
      }
      if (count($manufacturers_array) > 1) {
        $box_content = xtc_draw_form('manufacturers', xtc_href_link(FILENAME_DEFAULT, '', $request_type, false), 'get').xtc_draw_pull_down_menu('manufacturers_id', $manufacturers_array, isset($_GET['manufacturers_id']) ? xtc_href_link(FILENAME_DEFAULT,xtc_manufacturer_link($_GET['manufacturers_id'], isset($_GET['manufacturers_name']) ? $_GET['manufacturers_name'] : '')) : '', 'class="form-control form-control-sm" onchange="'.$js.'" size="'.MAX_MANUFACTURERS_LIST.'" style="width: 100%;"').xtc_hide_session_id().'</form>';
      }
    }
    
    if ($box_content != '') { 
      $box_smarty->assign('BOX_CONTENT', $box_content);
    }    
  }
}

// set cache ID
if (!$cache) {
  $box_manufacturers = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_manufacturers.html');
} else {
  $box_manufacturers = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_manufacturers.html', $cache_id);
}

$smarty->assign('box_MANUFACTURERS', $box_manufacturers);
?>