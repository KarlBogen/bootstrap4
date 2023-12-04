<?php

/*
// ------------------------------------------------------------------------------------------
	$Id sub_categories.php ("Slim Categories")
	
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

	$box_smarty = new Smarty();

// ------------------------------------------------------------------------------------------
// Cache-ID setzen
// ------------------------------------------------------------------------------------------
	if(!CacheCheck() && !FORCE_CACHE) {
		$cache=false;
		$box_smarty->caching = 0;
	} else {
		$cache=true;
		$box_smarty->caching = 1;
		$box_smarty->cache_lifetime = CACHE_LIFETIME;
		$box_smarty->cache_modified_check = CACHE_CHECK;
		$cache_id = md5('lID:'.$_SESSION['language'].'|csID:'.$_SESSION['customers_status']['customers_status_id'].'|cP:'.$cPath.(((defined('SPECIALS_CATEGORIES') && SPECIALS_CATEGORIES === true) || (defined('WHATSNEW_CATEGORIES') && WHATSNEW_CATEGORIES === true)) ? '|self:'.basename($PHP_SELF) : ''));
	}
// ------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------
//	Das alles braucht nur dann ausgef?hrt zu werden, wenn noch keine gecachtes 
//	HTML-File vorliegt
// ------------------------------------------------------------------------------------------
	if(!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/sub_categories.html',$cache_id) || !$cache) {
		
		require_once (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/inc/gunnart_Categories.inc.php');
		$SubConfig = array(
			'MinLevel'		=>	1,
			'MaxLevel'		=>	false,
			'HideEmpty'		=>	false,
			'ShowCounts'	=>	false,
			'CatNaviID'		=>	'SubNavi'
		);
		if(is_array($cPath_array)) {
			$box_smarty->assign('BOX_CONTENT',gunnartCategories($cPath_array[0],1,$SubConfig),0);
		} /*else {
			$box_smarty->assign('BOX_CONTENT',gunnartCategories(0,1,$SubConfig));
		}*/
		$box_smarty->assign('language',$_SESSION['language']);
		$box_smarty->assign('tpl_path','templates/'.CURRENT_TEMPLATE.'/');


	}
// ------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------
//	Ausgabe ans Template
// ------------------------------------------------------------------------------------------
	if(!$cache) {
		$sub_categories = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/sub_categories.html');
	} else {
		$sub_categories = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/sub_categories.html',$cache_id);
	}
	$smarty->assign('sub_CATEGORIES',$sub_categories);
// ------------------------------------------------------------------------------------------

?>