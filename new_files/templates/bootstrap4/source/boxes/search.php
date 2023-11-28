<?php
/* -----------------------------------------------------------------------------------------
   $Id: search.php 14873 2022-12-21 13:28:01Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(search.php,v 1.22 2003/02/10); www.oscommerce.com 
   (c) 2003	 nextcommerce (search.php,v 1.9 2003/08/17); www.nextcommerce.org
   (c) 2003 XT-Commerce

   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

// include smarty
include(DIR_FS_BOXES_INC . 'smarty_default.php');

// include needed functions
require_once (DIR_FS_INC.'xtc_get_categories.inc.php');

if (defined('SEARCH_AC_CATEGORIES')
    && SEARCH_AC_CATEGORIES == 'true'
    )
{
$box_smarty->assign('CATEGORIES', xtc_draw_pull_down_menu('categories_id', xtc_get_categories(array(array('id' => '', 'text' => TEXT_AC_ALL_CATEGORIES)), 0, false), isset($_GET['categories_id']) ? (int)$_GET['categories_id'] : '', 'id="cat_search" class="form-control bg-light"').xtc_draw_hidden_field('inc_subcat', '1'));
}
$box_smarty->assign('FORM_ACTION', xtc_draw_form('quick_find', xtc_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', $request_type, false), 'get', 'class="p-2" role="search"') . xtc_hide_session_id());
$box_smarty->assign('INPUT_SEARCH', xtc_draw_input_field('keywords', '', 'id="inputString" class="form-control" aria-label="search keywords" maxlength="30"  placeholder="'.IMAGE_BUTTON_SEARCH.'" autocomplete="off"'));
$box_smarty->assign('BUTTON_SUBMIT', xtc_image_submit('button_quick_find.gif', IMAGE_BUTTON_SEARCH));
$box_smarty->assign('FORM_END', '</form>');
$box_smarty->assign('LINK_ADVANCED', xtc_href_link(FILENAME_ADVANCED_SEARCH));

$box_smarty->caching = 0;
$box_search = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_search.html');

$smarty->assign('box_SEARCH',$box_search);
?>