<?php
/* admin/includes/extra/shopping_cart/cart_requirements/agi_reduce_cart.php
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
    if($_SESSION['any_realy_out_of_stock']) {
      $_SESSION['allow_checkout'] = 'false';
      $messageStack->add('shopping_cart', BS4_AGI_REDUCE_CART_MESSAGE_SOMETHING_OUT_OF_STOCK);
    }
    if($_SESSION['any_stock_reduced']) {
      $messageStack->add('shopping_cart', BS4_AGI_REDUCE_CART_MESSAGE_SOMETHING_REDUCED);
    }
  }
}
