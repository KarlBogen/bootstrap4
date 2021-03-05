<?php
/* includes/extra/cart_actions/add_product_before_redirect/agi_reduce_cart.php
.---------------------------------------------------------------------------.
|    Software: reduce stock in cart                                         |
|      Author: Andreas Guder                                                |
|     Version: 1.0                                                          |
|     Contact: info@andreas-guder.de / http://www.andreas-guder.de          |
| Copyright (c) 2019, Andreas Guder [info@andreas-guder.de]                 |
|               GNU General Public License  (Version 2)                     |
'---------------------------------------------------------------------------?
*/
if (defined('BS4_AGI_REDUCE_CART') && BS4_AGI_REDUCE_CART == 'true') {
  if (STOCK_CHECK == 'true' && STOCK_ALLOW_CHECKOUT != 'true' && $goto != FILENAME_SHOPPING_CART) {
    if(!$wishlist) {
      if(isset($_POST['products_id']) && is_numeric($_POST['products_id'])) {
        if(!isset($_SESSION['BS4_AGI_REDUCE_CART']))
          $_SESSION['BS4_AGI_REDUCE_CART'] = array();
        require_once (DIR_FS_INC.'xtc_get_products_stock.inc.php');
        $agi_products_id = (int)$_POST['products_id'];
        $agi_qty = $cart_object->get_quantity(xtc_get_uprid($_POST['products_id'], isset($_POST['id'])?$_POST['id']:''));
        $rest = xtc_get_products_stock($agi_products_id);
        if (STOCK_CHECK_SPECIALS == 'true' && $xtPrice->xtcCheckSpecial($agi_products_id)) {
          $stock_check_query = xtc_db_query("SELECT specials_quantity
                                           FROM ".TABLE_SPECIALS."
                                          WHERE products_id = '".$agi_products_id."'");
          $stock_check = xtc_db_fetch_array($stock_check_query);
          if($stock_check) {
            if($stock_check['specials_quantity'] < $rest)
              $rest = $stock_check['specials_quantity'];
          }
        }
        
        $agi_old_qty = $agi_qty;
        
        $agi_attributes = '';
        $agi_attributes_id_string = $agi_products_id;
        if(isset($_POST['id']) && !empty($_POST['id'])) {
          if (is_array($_POST['id'])) {
            $agi_attributes = $_POST['id'];
            reset($_POST['id']);
            foreach ($_POST['id'] as $option => $value) {
              $agi_attributes_id_string .= '{'.$option.'}'.$value;
              $agi_attributes_data = $main->getAttributes($agi_products_id,$option,$value);
              if($agi_attributes_data['attributes_stock'] < $rest && ATTRIBUTE_STOCK_CHECK == 'true')
                $rest = $agi_attributes_data['attributes_stock'];
            }
          }
        }

        if($rest < $agi_qty) {
          $_SESSION['BS4_AGI_REDUCE_CART'][$agi_attributes_id_string] = array($agi_old_qty,$rest);
          if($rest > 0) {
            $cart_object->add_cart($agi_products_id, $rest, $agi_attributes, false);
            $messageStack->add_session('product_info', BS4_AGI_REDUCE_CART_MESSAGE_PINFO_REDUCED);
          }
          else {
            $cart_object->remove($agi_attributes_id_string);
            $messageStack->add_session('product_info', BS4_AGI_REDUCE_CART_MESSAGE_PINFO_OUT_OF_STOCK);
          }
        }
      }
    }
  }
}
