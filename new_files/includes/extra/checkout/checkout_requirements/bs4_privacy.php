<?php

if (DISPLAY_REVOCATION_ON_CHECKOUT == 'true') {
  //datenschutz
  $smarty->assign('BS4_TEXT_PRIVACY_CHECKOUT', sprintf(BS4_TEXT_PRIVACY_CHECKOUT,$main->getContentLink(3, MORE_INFO,'SSL'), $main->getContentLink(REVOCATION_ID, MORE_INFO,'SSL'), $main->getContentLink(2, MORE_INFO,'SSL')));
}

?>