<?php
	if (defined('MODULE_BS4_TPL_MANAGER_STATUS') && MODULE_BS4_TPL_MANAGER_STATUS == 'true') {
	  $add_select_categories[] = 'c.bs4_banner_ids';
	  $add_select_categories[] = 'c.bs4_banner_settings';
	}
  $add_select_default[] = 'p.products_startpage';
	$add_select_search[] = 'p.products_startpage';
  $add_select_product[] = 'p.products_startpage';
?>