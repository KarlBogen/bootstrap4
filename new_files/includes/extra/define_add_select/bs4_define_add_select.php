<?php
	if (defined('MODULE_BS4_TPL_MANAGER_STATUS') && MODULE_BS4_TPL_MANAGER_STATUS == 'true') {
	  $add_select_categories[] = 'c.bs5_banner_ids';
	  $add_select_categories[] = 'c.bs5_banner_settings';
	}
  $add_select_default[] = 'p.products_date_added';
  $add_select_default[] = 'p.products_startpage';
	$add_select_search[] = 'p.products_date_added';
	$add_select_search[] = 'p.products_startpage';
  $add_select_product[] = 'p.products_date_added';
  $add_select_product[] = 'p.products_startpage';
?>