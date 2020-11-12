<?php

/*
// ------------------------------------------------------------------------------------------
	$Id top_categories.php ("Slim Categories")
	
	Copyright (c) 2008 Gunnar Tillmann / http://www.gunnart.de
// ------------------------------------------------------------------------------------------
	fully rewritten, formerly based on: 
	(c) 2000-2001 The Exchange Project (earlier name of osCommerce)
	(c) 2002-2003 osCommerce (categories.php, v1.23 2002/11/12); www.oscommerce.com 
	(c) 2003 nextcommerce (categories.php, v1.10 2003/08/17); www.nextcommerce.org
	(c) 2005 xt:Commerce (categories.php, v1.302 2005/10/12); www.xt-commerce.com
	
	Released under the GNU General Public License 
// ------------------------------------------------------------------------------------------
	Third Party contributions:
	Enable_Disable_Categories 1.3 
	Autor: Mikel Williams | mikel@ladykatcostumes.com
	
	Released under the GNU General Public License 
// ------------------------------------------------------------------------------------------
*/

	$box_smarty = new smarty;

// ------------------------------------------------------------------------------------------
// Cache-ID setzen
// ------------------------------------------------------------------------------------------
	if(!CacheCheck()) {
		$cache=false;
		$box_smarty->caching = 0;
		$cache_id = '';
	} else {
		$cache=true;
		$box_smarty->caching = 1;
		$box_smarty->cache_lifetime = CACHE_LIFETIME;
		$box_smarty->cache_modified_check = CACHE_CHECK;
		$cache_id = $_SESSION['language'].$_SESSION['customers_status']['customers_status_id'].$cPath;
	}
// ------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------
//	Das alles braucht nur dann ausgeführt zu werden, wenn noch keine gecachtes 
//	HTML-File vorliegt
// ------------------------------------------------------------------------------------------
	if(!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/top_categories.html',$cache_id) || !$cache) {
		
		require_once (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/inc/gunnart_Categories.inc.php');
		$TopConfig = array(
			'MinLevel'		=>	100,
			'MaxLevel'		=>	false,
			'HideEmpty'		=>	false,
			'ShowCounts'	=>	BS4_SHOW_PRODUCTS_IN_TOPCATMENU,
			'CatNaviID'		=>	'main',
			'Home'			=>	BS4_SHOW_HOMEBUTTON_IN_TOPCATMENU
		);
		$box_smarty->assign('language',$_SESSION['language']);
		$box_smarty->assign('tpl_path','templates/'.CURRENT_TEMPLATE.'/');
		$box_smarty->assign('BOX_CONTENT',gunnartCategories(0,1,$TopConfig));

		if (BS4_ADD_LINK_IN_TOPCATMENU_LAST != '')
		{
            $link_content = array();
        	$add_links = array();
			$add_links = explode(',', BS4_ADD_LINK_IN_TOPCATMENU_LAST);
			foreach ($add_links as $add_link) {
				$links = explode('|', trim($add_link));
				$link_content[] = array (
					'HREF' => $links[0],
					'NAME' => $links[1]
				);
			}
			$box_smarty->assign('BOX_LINKS', $link_content);
		}

	}
// ------------------------------------------------------------------------------------------
//var_dump(gunnartCategories(0,1,$TopConfig));die;

// ------------------------------------------------------------------------------------------
//	Ausgabe ans Template
// ------------------------------------------------------------------------------------------
	if(!$cache) {
		$top_categories = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/top_categories.html');
	} else {
		$top_categories = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/top_categories.html',$cache_id);
	}
	$smarty->assign('top_CATEGORIES',$top_categories);
// ------------------------------------------------------------------------------------------

?>