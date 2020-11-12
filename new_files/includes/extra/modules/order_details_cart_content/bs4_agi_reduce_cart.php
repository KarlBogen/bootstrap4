<?php
/* admin/includes/extra/modules/order_details_cart_content/agi_reduce_cart.php
.---------------------------------------------------------------------------.
|    Software: reduce stock in cart                                         |
|      Author: Andreas Guder                                                |
|     Version: 1.0                                                          |
|     Contact: info@andreas-guder.de / http://www.andreas-guder.de          |
| Copyright (c) 2019, Andreas Guder [info@andreas-guder.de]                 |
|               GNU General Public License  (Version 2)                     |
'---------------------------------------------------------------------------ü
*/
if (defined('BS4_AGI_REDUCE_CART') && BS4_AGI_REDUCE_CART == 'true') {
  if (STOCK_CHECK == 'true' && STOCK_ALLOW_CHECKOUT != 'true') {
    if(!array_key_exists('any_realy_out_of_stock', $_SESSION) || $i == 0)
      $_SESSION['any_realy_out_of_stock'] = 0;
    if(!array_key_exists('any_stock_reduced', $_SESSION) || $i == 0)
      $_SESSION['any_stock_reduced'] = 0;
    $rest = xtc_get_products_stock($products[$i]['id']);
    $agi_prid = xtc_get_prid($products[$i]['id']);
    if (STOCK_CHECK_SPECIALS == 'true' && $xtPrice->xtcCheckSpecial($products[$i]['id'])) {
      $stock_check_query = xtc_db_query("SELECT specials_quantity
                                       FROM ".TABLE_SPECIALS."
                                      WHERE products_id = '".$agi_prid."'");
      $stock_check = xtc_db_fetch_array($stock_check_query);
      if($stock_check) {
        if($stock_check['specials_quantity'] < $rest)
          $rest = $stock_check['specials_quantity'];
      }
    }
    $agi_old_qty = $products[$i]['quantity'];
    $module_content[$i]['PRODUCTS_QTY_REDUCED'] = false;
    $products_query_result = array();
    if($rest < $products[$i]['quantity'] || isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
      $products_query = xtc_db_query("SELECT ".ADD_SELECT_CART."
                                           p.products_id,
                                           pd.products_name,
                                           pd.products_description,
                                           pd.products_short_description,
                                           pd.products_order_description,
                                           p.products_shippingtime,
                                           p.products_image,
                                           p.products_model,
                                           p.products_price,
                                           p.products_ean,
                                           p.products_vpe,
                                           p.products_vpe_status,
                                           p.products_vpe_value,
                                           p.products_discount_allowed,
                                           p.products_weight,
                                           p.products_tax_class_id,
                                           p.products_status,
                                           p.products_fsk18,
                                           p.products_price as products_price_origin,
                                           p.products_quantity as products_stock
                                      FROM ".TABLE_PRODUCTS." p
                                      JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd
                                           ON pd.products_id = p.products_id
                                              AND pd.language_id = '".(int)$_SESSION['languages_id']."'
                                     WHERE p.products_id='".$agi_prid."'");
      if (xtc_db_num_rows($products_query) > 0) {
        $products_query_result = xtc_db_fetch_array($products_query);
      }
    }
    if($rest < $products[$i]['quantity']) {
      $agi_attributes = '';
      if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
        $agi_attributes = $products[$i]['id'];
      }
      
      $_SESSION['any_out_of_stock'] = 0;
      $agi_products_price = $products[$i]['price'];
      if(!empty($products_query_result)) {
        if(defined('GRADUATED_ASSIGN') && GRADUATED_ASSIGN == 'true') {
          if(isset($_SESSION['actual_content'][$agi_prid]['qty'])) {
            $_SESSION['actual_content'][$agi_prid]['qty'] -= $agi_old_qty-$rest;
          }
        }
        $agi_products_price = $xtPrice->xtcGetPrice($agi_prid,
                                            $format = false,
                                            $rest > 0 ? $rest : 1, //only used by xtcGetGraduatedPrice
                                            $products_query_result['products_tax_class_id'],
                                            $products_query_result['products_price']
                                          );
        $agi_products_price = $_SESSION['cart']->shoppingCartModules->calculate_product_price($agi_products_price, $products_query_result, $products[$i], $products[$i]['id']);
      }
      
      if($rest > 0) {
        $prod_mark_stock = '<span class="markProductOutOfStock">' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '</span>';
        $_SESSION['cart']->add_cart($products[$i]['id'], $rest, $agi_attributes, false);
        $products[$i]['quantity'] = $rest;
        $_SESSION['any_stock_reduced'] = 1;
        $attr_price = $_SESSION['cart']->attributes_price($products[$i]['id'],$rest);
        $module_content[$i]['PRODUCTS_PRICE'] = $xtPrice->xtcFormat(($agi_products_price + $attr_price) * $rest, true);
        $module_content[$i]['PRODUCTS_SINGLE_PRICE'] = $xtPrice->xtcFormat($agi_products_price, true);
      }
      else {
        $prod_mark_stock = empty($mark_stock) ? '<span class="markProductOutOfStock">' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '</span>' : $mark_stock;
        $_SESSION['cart']->add_cart($products[$i]['id'], 0, $agi_attributes, false);
        $products[$i]['quantity'] = 0;
        $module_content[$i]['PRODUCTS_PRICE'] = $xtPrice->xtcFormat(0, true);
        $_SESSION['any_realy_out_of_stock'] = 1;
      }
      $module_content[$i]['PRODUCTS_NAME'] = $products[$i]['name'].$prod_mark_stock;
      $module_content[$i]['PRODUCTS_QTY'] = xtc_draw_input_field('cart_quantity[]', $products[$i]['quantity'], 'size="2"').
                    xtc_draw_hidden_field('products_id[]', $products[$i]['id']).
                    xtc_draw_hidden_field('old_qty[]', $products[$i]['quantity']);
      $module_content[$i]['PRODUCTS_QTY_REDUCED'] = true;
      $module_content[$i]['PRODUCTS_AVAILABLE_DATA'] = BS4_AGI_REDUCE_CART_SHOW_AVAILABLE == 'true' ? array('want'=>$agi_old_qty, 'available'=>$products[$i]['quantity']) : '';
    }
    elseif(!empty($_SESSION['BS4_AGI_REDUCE_CART'])) {
      if(array_key_exists($products[$i]['id'], $_SESSION['BS4_AGI_REDUCE_CART'])) {
        if($_SESSION['BS4_AGI_REDUCE_CART'][$products[$i]['id']][1] > 0) {
          $_SESSION['any_stock_reduced'] = 1;
          $prod_mark_stock = '<span class="markProductOutOfStock">' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '</span>';
        }
        else {
          $_SESSION['any_out_of_stock'] = 1;
          $prod_mark_stock = empty($mark_stock) ? '<span class="markProductOutOfStock">' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '</span>' : $mark_stock;
        }
        $module_content[$i]['PRODUCTS_NAME'] = $products[$i]['name'].$prod_mark_stock;
        $module_content[$i]['PRODUCTS_QTY_REDUCED'] = true;
        $module_content[$i]['PRODUCTS_AVAILABLE_DATA'] = BS4_AGI_REDUCE_CART_SHOW_AVAILABLE == 'true' ? array('want'=>$_SESSION['BS4_AGI_REDUCE_CART'][$products[$i]['id']][0], 'available'=>$_SESSION['BS4_AGI_REDUCE_CART'][$products[$i]['id']][1]) : '';
        unset($_SESSION['BS4_AGI_REDUCE_CART'][$products[$i]['id']]);
      }
    }
  }
}
