<?php

/*
// ------------------------------------------------------------------------------------------
	$Id: gunnart_Categories.inc.php ("Slim Categories")
	
	F�r eine tabellenfreie Kategorien-Navigation xt:Commerce - Tabellenfreie Templates
	Mehrfach einsetzbar, beispielsweise f�r zweigeteilte Navigationen u.�.
	
	Copyright (c) 2008 Gunnar Tillmann / http://www.gunnart.de
// ------------------------------------------------------------------------------------------
	fully rewritten, formerly based on:
	(c) 2000-2001 The Exchange Project (earlier name of osCommerce)
	(c) 2002-2003 osCommerce (categories.php, v1.23 2002/11/12); www.oscommerce.com
	(c) 2003 nextcommerce (xtc_show_category.inc.php, v1.4 2003/08/13); www.nextcommerce.org
	(c) 2003-2007 XT-Commerce
	
	Released under the GNU General Public License
// ------------------------------------------------------------------------------------------
*/


// ------------------------------------------------------------------------------------------
//	Includes ...
// ------------------------------------------------------------------------------------------
//	require_once (DIR_FS_INC.'xtc_has_category_subcategories.inc.php');
	require_once (DIR_FS_INC.'xtc_count_products_in_category.inc.php');
// ------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------
//	Kategorien-Liste aufbauen
// ------------------------------------------------------------------------------------------
	function gunnartCategories($CatID=0,$Level=1,$CatConfig,$first_cat=1) {

		global $cPath_array, $current_category_id;

		$group_check = $ProdsInCat = $Return = $ID = $Home = "";

		// Kundengruppen-Check
		if (GROUP_CHECK=='true') {
			$group_check = "and c.group_permission_".$_SESSION['customers_status']['customers_status_id']." = 1 ";
		}

		// Datenbank ...
		$dbQuery = xtDBquery(" 
			select	c.categories_id,
					cd.categories_name 
			from	".TABLE_CATEGORIES." c, 
					".TABLE_CATEGORIES_DESCRIPTION." cd 
			where 	c.parent_id = ".intval($CatID)."
			and		c.categories_status = 1 
					".$group_check." 
			and 	c.categories_id = cd.categories_id 
			and 	cd.language_id = ".intval($_SESSION['languages_id'])."
			order by sort_order, cd.categories_name
		");

		// Ergebnisse ... 
		while($dbQueryResult = xtc_db_fetch_array($dbQuery,true)) {

			$Current = false;
			if(is_array($cPath_array) || is_array($CatConfig['Fullpath'])) {
				if($dbQueryResult['categories_id'] == $current_category_id || $dbQueryResult['categories_id'] == end($CatConfig['Fullpath'])) {
					$Current = ' active Selected';
				} elseif(in_array($dbQueryResult['categories_id'],$cPath_array) || in_array($dbQueryResult['categories_id'],$CatConfig['Fullpath'])) {
					$Current = ' active parent';
				}
			}
			if($CatConfig['ShowCounts'] == 'true' || $CatConfig['HideEmpty'] == 'true') {
				$ProdsInCat = xtc_count_products_in_category($dbQueryResult['categories_id']);
			}
			if(($ProdsInCat && $CatConfig['HideEmpty'] == 'true') || $CatConfig['HideEmpty'] != 'true') {
				// meine Änderung  ob Unterkategorie vorhanden ist
					$hassubcat = '';
					if($Level == 1) $hassubcat = bs4_has_cat_subcat($dbQueryResult['categories_id']) === true ? ' hassub' : '';
				// Ende Karl
				if ($first_cat==1) {
					$CLASS = ' class="'.$dbQueryResult['categories_id'].'"';
	                if($Level > 1) $CLASS .= ' data-level="'.$Level.'"';
				}
				$first_cat=0;
				$Return 	.= 	"\n"
							.	'<li id="li'.$dbQueryResult['categories_id'].'" class="level'.$Level.$Current.$hassubcat.'">'
							.	'<a id="a'.$dbQueryResult['categories_id'].'" class="'.$Current.'" href="'
							.	xtc_href_link(FILENAME_DEFAULT,xtc_category_link($dbQueryResult['categories_id'],$dbQueryResult['categories_name']))
							.	'" title="'.$dbQueryResult['categories_name'].'" data-value="'.$dbQueryResult['categories_id'].'">'
							.	$dbQueryResult['categories_name'];
				if($CatConfig['ShowCounts'] == 'true') {
					$Return .=	' <span class="badge badge-secondary">'
							.	$ProdsInCat
							.	'</span>';
				}
				$Return 	.=	'</a>';
				if(($Level < $CatConfig['MinLevel'] || $Current) && ($Level < $CatConfig['MaxLevel'] || !$CatConfig['MaxLevel'])) {
					$Return	.= 	gunnartCategories($dbQueryResult['categories_id'],$Level+1,$CatConfig); // <-- Rekursion!
				}
				$Return 	.=	'</li>';
			}
		}
		// HTML-Output ...
		if($Return) {
            $first_cat=1;
			if($Level == 1) {
				$ID .= ' id="'.$CatConfig['CatNaviID'].'"';
				if ($CatConfig['Home'] == 'true') $Home .= '<li class="nav-item home"><a class="nav-link" href="' . xtc_href_link(FILENAME_DEFAULT) . '"><span class="fa fa-home fa-lg"></span></a></li>'."\n";
				return 	"\n<ul$ID$CLASS>$Home$Return\n"; // ohne </ul>, damit Links eingefügt werden können
			}
			return 	"\n<ul$CLASS>$Return\n</ul>\n";
		}
	
	}
// ------------------------------------------------------------------------------------------

function bs4_has_cat_subcat($category_id) {
	$child_category_query = "SELECT count(*) as count
								FROM " . TABLE_CATEGORIES . "
								WHERE parent_id = '" . (int)$category_id . "'
								AND categories_status = 1";
	$child_category_query = xtDBquery($child_category_query);
	$child_category = xtc_db_fetch_array($child_category_query,true);

	if ($child_category['count'] > 0) {
		return true;
	} else {
		return false;
	}
}
?>