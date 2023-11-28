<?php
  /* -----------------------------------------------------------------------------------------
   $Id: shopping_cart.php 15432 2023-08-21 09:23:33Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(shopping_cart.php,v 1.18 2003/02/10); www.oscommerce.com
   (c) 2003 nextcommerce (shopping_cart.php,v 1.15 2003/08/17); www.nextcommerce.org
   (c) 2006 XT-Commerce (shopping_cart.php 1281 2005-10-03); www.xtcommerce.com

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  $box_smarty = new Smarty();

  $box_smarty->assign('tpl_path', DIR_WS_BASE.'templates/'.CURRENT_TEMPLATE.'/');

  // define defaults
  $products_in_cart = array ();
  $discount = $qty = 0;
  $total = 0.0;

  if ($_SESSION['cart']->count_contents() > 0) {

    $total = $_SESSION['cart']->show_total();

    // build array with cart content and count quantity  
    if (strpos($PHP_SELF, FILENAME_LOGOFF) === false) {
      $products = $_SESSION['cart']->get_products();
      for ($i = 0, $n = count($products); $i < $n; $i++) {
        $del_button = '<a href="' . xtc_href_link(basename($PHP_SELF), xtc_get_all_get_params(array('action', 'box', 'prd_id')).'action=remove_product&box=cart&prd_id=' . $products[$i]['id'], 'NONSSL') . '" title="' . IMAGE_BUTTON_DELETE . '">' . xtc_image_button('cart_del.gif', IMAGE_BUTTON_DELETE) . '</a>';
        $del_link = '<a href="' . xtc_href_link(basename($PHP_SELF), xtc_get_all_get_params(array('action', 'box', 'prd_id')).'action=remove_product&box=cart&prd_id=' . $products[$i]['id'], 'NONSSL') . '">' . IMAGE_BUTTON_DELETE . '</a>';
      
        $qty += $products[$i]['quantity'];
        $products_in_cart[] = array ('QTY' => $products[$i]['quantity'],
                                     'LINK' => xtc_href_link(FILENAME_PRODUCT_INFO, xtc_get_all_get_params_include(array('language')).'products_id='.$products[$i]['id']),
                                     'NAME' => $products[$i]['name'],
                                     'BUTTON_DELETE' => $del_button,
                                     'LINK_DELETE' => $del_link);
      }
    }

    // sales discount
    if ($_SESSION['customers_status']['customers_status_ot_discount_flag'] == '1' && $_SESSION['customers_status']['customers_status_ot_discount'] != '0.00') {
      if ($_SESSION['customers_status']['customers_status_show_price_tax'] == 0 && $_SESSION['customers_status']['customers_status_add_tax_ot'] == 1) {
        $price = $total-$_SESSION['cart']->show_tax(false);
      } else {
        $price = $total;
      }
      $discount = $xtPrice->xtcGetDC($price, $_SESSION['customers_status']['customers_status_ot_discount']);
      $box_smarty->assign('DISCOUNT', $xtPrice->xtcFormat(($discount * (-1)), $price_special = 1, $calculate_currencies = false));
    }
    
    // generate total price
    if ($_SESSION['customers_status']['customers_status_show_price'] == '1') {
      if ($discount) {
        if ($_SESSION['customers_status']['customers_status_show_price_tax'] == 0 && $_SESSION['customers_status']['customers_status_add_tax_ot'] == 0)
          $total-=$discount;
        if ($_SESSION['customers_status']['customers_status_show_price_tax'] == 0 && $_SESSION['customers_status']['customers_status_add_tax_ot'] == 1)
          $total-=$discount;
        if ($_SESSION['customers_status']['customers_status_show_price_tax'] == 1)
          $total-=$discount;
      }
      $box_smarty->assign('TOTAL', $xtPrice->xtcFormat($total, true));
    }

    if (MODULE_SMALL_BUSINESS != 'true') {
      $box_smarty->assign('UST', $_SESSION['cart']->show_tax());
    }
    $box_smarty->assign('SHIPPING_INFO', SHOW_SHIPPING == 'true' ? $main->getShippingLink() : '');

  }

  $box_smarty->assign('deny_cart', strpos($PHP_SELF, 'checkout') !== false ? 'true' : 'false'); // no cart at the checkout
  $box_smarty->assign('products', $products_in_cart);
  $box_smarty->assign('PRODUCTS', $qty);
  $box_smarty->assign('empty', $qty > 0 ? 'false' : 'true');
  $box_smarty->assign('ACTIVATE_GIFT', ACTIVATE_GIFT_SYSTEM == 'true' ? 'true' : false);

  // GV Code
  if (isset($_SESSION['customer_id'])) {
    $gv_query = xtc_db_query("SELECT amount
                                FROM ".TABLE_COUPON_GV_CUSTOMER."
                               WHERE customer_id = '".(int)$_SESSION['customer_id']."'");
    if (xtc_db_num_rows($gv_query) > 0) {
      $gv_result = xtc_db_fetch_array($gv_query);
      if ($gv_result['amount'] > 0) {
        $box_smarty->assign('GV_AMOUNT', $xtPrice->xtcFormat($gv_result['amount'], true, 0, true));
        $box_smarty->assign('GV_SEND_TO_FRIEND_LINK', '<a href="'.xtc_href_link(FILENAME_GV_SEND).'">');
      }
    }
    if (isset($_SESSION['gv_id'])) {
      $gv_query = xtc_db_query("SELECT coupon_amount
                                  FROM ".TABLE_COUPONS."
                                 WHERE coupon_id = '".(int)$_SESSION['gv_id']."'");
      $coupon = xtc_db_fetch_array($gv_query);
      $box_smarty->assign('COUPON_AMOUNT2', $xtPrice->xtcFormat($coupon['coupon_amount'], true, 0, true));
    }
    if (isset($_SESSION['cc_id'])) {
      $popup_params = $main->getPopupParams();      
      $box_smarty->assign('COUPON_HELP_LINK', '<a target="_blank" class="'.$popup_params['link_class'].'" title="'.$popup_params['link_title'].'" href="'.xtc_href_link(FILENAME_POPUP_COUPON_HELP, 'cID='.$_SESSION['cc_id']. $popup_params['link_parameters'], $request_type).'">Information</a>');
    }
  }

  $box_smarty->assign('LINK_CART', xtc_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'));
  $box_smarty->assign('LINK_CHECKOUT', xtc_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  $box_smarty->caching = 0;
  $box_smarty->assign('language', $_SESSION['language']);
  $box_shopping_cart = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_cart.html');
  $smarty->assign('box_CART', $box_shopping_cart);
