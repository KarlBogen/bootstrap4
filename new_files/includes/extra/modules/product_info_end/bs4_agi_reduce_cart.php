<?php
/* includes/extra/modules/product_info_end/agi_reduce_cart.php
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
  $msg = $messageStack->output('product_info');
  if(!empty($msg)) {
    $err_msg = $info_smarty->getTemplateVars('error');
    if(empty($err_msg)) {
      $info_smarty->assign('error_message',$msg);
    }
    else {
      $info_smarty->assign('error_message',$err_msg.$msg);
    }
  }
}