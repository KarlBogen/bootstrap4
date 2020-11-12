<?php
/* admin/includes/extra/modules/order_details_cart_attributes/agi_reduce_cart.php
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
  if (STOCK_CHECK == 'true' && STOCK_ALLOW_CHECKOUT != 'true' && ATTRIBUTE_STOCK_CHECK == 'true') {
    $_SESSION['any_out_of_stock'] = 0;
    if ($attributes['attributes_stock'] < $products[$i]['quantity']) {
      $attr_mark_stock = '';
      $rest = $attributes['attributes_stock'];
      
      $agi_products_price = $products[$i]['price'];
      if(!empty($products_query_result)) {
        if(defined('GRADUATED_ASSIGN') && GRADUATED_ASSIGN == 'true') {
          if(isset($_SESSION['actual_content'][$agi_prid]['qty'])) {
            $_SESSION['actual_content'][$agi_prid]['qty'] -= $products[$i]['quantity']-$rest;
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
      
      if($attributes['attributes_stock'] > 0) {
        $attr_mark_stock = '<span class="markProductOutOfStock">' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '</span>';
        $_SESSION['cart']->add_cart($products[$i]['id'], $rest, $products[$i]['id'], false);
        $products[$i]['quantity'] = $rest;
        $_SESSION['any_stock_reduced'] = 1;
        $attr_price = $_SESSION['cart']->attributes_price($products[$i]['id'],$rest);
        $module_content[$i]['PRODUCTS_PRICE'] = $xtPrice->xtcFormat(($agi_products_price + $attr_price) * $rest, true);
        $module_content[$i]['PRODUCTS_SINGLE_PRICE'] = $xtPrice->xtcFormat($agi_products_price + $attr_price, true);
      }
      else {
        $rest = 0;
        $attr_mark_stock = $attribute_stock_check;
        $_SESSION['cart']->add_cart($products[$i]['id'], 0, $products[$i]['id'], false);
        $products[$i]['quantity'] = 0;
        $module_content[$i]['PRODUCTS_PRICE'] = $xtPrice->xtcFormat(0, true);
        $_SESSION['any_realy_out_of_stock'] = 1;
      }
      $module_content[$i]['ATTRIBUTES'][$subindex]['VALUE_NAME'] = $attributes['products_options_values_name'];
      
      $module_content[$i]['PRODUCTS_QTY'] =  xtc_draw_input_field('cart_quantity[]', $products[$i]['quantity'], 'size="2"').
                    xtc_draw_hidden_field('products_id[]', $products[$i]['id']).
                    xtc_draw_hidden_field('old_qty[]', $products[$i]['quantity']);
      $module_content[$i]['PRODUCTS_AVAILABLE_DATA'] = BS4_AGI_REDUCE_CART_SHOW_AVAILABLE == 'true' ? array('want'=>$agi_old_qty, 'available'=>$products[$i]['quantity']) : '';
      if(!$module_content[$i]['PRODUCTS_QTY_REDUCED']) {
        $module_content[$i]['PRODUCTS_QTY_REDUCED'] = true;
        $module_content[$i]['PRODUCTS_NAME'] = $products[$i]['name'].$attr_mark_stock;
      }
    }
  }
}
