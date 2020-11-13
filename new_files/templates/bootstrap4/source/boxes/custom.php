<?php
/* -----------------------------------------------------------------------------------------
   $Id:$   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(miscellaneous.php,v 1.6 2003/02/10); www.oscommerce.com 
   (c) 2003	nextcommerce (content.php,v 1.2 2003/08/21); www.nextcommerce.org
   (c) 2003 XT-Commerce
   
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

// include smarty
include(DIR_FS_BOXES_INC . 'smarty_default.php');

// set cache id
$cache_id = md5($_SESSION['language'].$_SESSION['customers_status']['customers_status_id'].(isset($coPath) ? $coPath : '0'));

$filepath = 'templates/'.CURRENT_TEMPLATE.'/img/img_custom_box.png';

if (file_exists(DIR_FS_CATALOG.$filepath))
{
	$box_smarty->assign('image', DIR_WS_BASE.$filepath);
}

if (!$cache) {
  $box_custom = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_custom.html');
} else {
  $box_custom = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_custom.html', $cache_id);
}

$smarty->assign('box_CUSTOM', $box_custom);
?>