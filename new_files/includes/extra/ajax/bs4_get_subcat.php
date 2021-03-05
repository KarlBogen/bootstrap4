<?php
/**
 * $Id: bs4_get_subcat.php by Karl
 *
 * Karl Unterkategorien per Ajax laden
 *
 * Released under the GNU General Public License
 */

if (isset($_REQUEST['speed'])) {

	require_once ('includes/application_top.php');
	require_once (DIR_FS_INC.'db_functions_'.DB_MYSQL_TYPE.'.inc.php');
	require_once (DIR_FS_INC.'db_functions.inc.php');
	require_once (DIR_WS_INCLUDES.'database_tables.php');

}

function bs4_get_subcat() {


	xtc_db_connect() or die('Unable to connect to database server!');

	// get Variables
	$my_cPath = $_REQUEST['cPath'];
	$func = $_REQUEST['func'];

	// Aufruf Superfishmenü
	if($func=='mega') {
		$my_categories_string=bs4_get_subcat_mega();
		return $my_categories_string;
	}

	// needed functions
//	require_once (DIR_FS_INC.'xtc_has_category_subcategories.inc.php');
	require_once (DIR_FS_INC.'xtc_count_products_in_category.inc.php');

	$my_foo = array();
	$my_categories_string = '';
	unset($prev_id);

	if ($my_cPath) {
		$new_path = '';
		$id = explode('_', $my_cPath);
		// we need only last cat_id
		$all_keys = array_keys($id);
		$last = array(end($all_keys) => end($id));
		foreach ($last as $key => $value) {
			unset ($prev_id);
			unset ($first_id);
			$categories_query = xtDBquery("SELECT c.categories_id,
                                              cd.categories_name,
                                              c.parent_id
                                         FROM ".TABLE_CATEGORIES." c
                                         JOIN ".TABLE_CATEGORIES_DESCRIPTION." cd
                                              ON c.categories_id = cd.categories_id
                                                 AND cd.language_id='".(int)$_SESSION['languages_id']."'
                                                 AND trim(cd.categories_name) != ''
                                        WHERE c.categories_status = '1'
                                          AND c.parent_id = '".$value."'
                                              ".CATEGORIES_CONDITIONS_C."
                                     ORDER BY c.sort_order, cd.categories_name");

			if (xtc_db_num_rows($categories_query, true) > 0) {
				$new_path .= $value;
				while ($row = xtc_db_fetch_array($categories_query, true)) {
					$row['cat_link'] = xtc_href_link(FILENAME_DEFAULT, xtc_category_link($row['categories_id'], $row['categories_name']));
					$my_foo[$row['categories_id']] = array (
						'name' => $row['categories_name'],
						'link' => $row['cat_link'],
						'parent' => $row['parent_id'],
						'level' => $key +1,
						'path' => $new_path.'_'.$row['categories_id'],
						'next_id' => false
					);

					// prüfen ob erstes Element gesetzt und Unterkategorie vorhanden ist
						if (!isset ($first_element)) {
							$first_element = $value;
						}
						$hassubcat = bs4_has_category_subcat($row['categories_id']);
						$my_foo[$row['categories_id']]['hassubcat'] = $hassubcat === true ? true : false;
					// Ende Karl

					if (isset ($prev_id)) {
						$my_foo[$prev_id]['next_id'] = $row['categories_id'];
					}
					$prev_id = $row['categories_id'];
					if (!isset ($first_id)) {
						$first_id = $row['categories_id'];
					}
					$last_id = $row['categories_id'];
				}
				$my_foo[$last_id]['next_id'] = isset($my_foo[$value]['next_id']) ? $my_foo[$value]['next_id'] : 0;
				$my_foo[$value]['next_id'] = $first_id;
				$new_path .= '_';
			} else {
				break;
			}
		}
	}

	if (!empty($first_element)) {
		xtc_show_category($first_element, '' , $my_foo, $my_categories_string, $my_cPath);
	}
	if($func != 'res') {
		return $my_categories_string;
	} else {
		return array($my_categories_string, $my_foo[$first_element]['next_id']);
	}
}

function xtc_show_category($counter, $oldlevel=1, $my_foo, &$my_categories_string, $my_cPath) {

	$func = $_REQUEST['func'];
	$fullpath = explode('_', $_REQUEST['fpath']);
	$level = isset($my_foo[$counter]['level']) ? $my_foo[$counter]['level']+1 : 1;

	//BOF +++ UL LI Verschachtelung  mit Quelltext Tab Einzügen +++
    $ul = '';

    if ($level > $oldlevel) { //neue Unterebene
		if($func == 'main'){
			$ul = "\n" . '<ul class="dropdown-menu" data-class="' . $counter . '" data-level="' . $level . '" style="display: none;">'. "\n";
		} elseif ($func == 'res'){
			$ul = "\n" . '<div id="menu-'.$counter.'" class="menu" data-parent="'.$_REQUEST['parent'].'" data-name="'.$_REQUEST['name'].'"><ul class="' . $counter . '" data-level="' . $level . '">'. "\n";
		} else {
			$ul = "\n" . '<ul id="'.$counter.'" class="nav flex-column card border-0 m-1" data-level="'.$level.'" style="display: none;">'. "\n";
		}
		$my_categories_string = rtrim($my_categories_string, "\n"); //Zeilenumbruch entfernen
		$my_categories_string = substr($my_categories_string, 0, strlen($my_categories_string) -5);  //letztes  </li>  entfernen
    } elseif ($level < $oldlevel) { //zurück zur höheren Ebene
		$ul = '</ul>';
    }
    //EOF +++ UL LI Verschachtelung  mit Quelltext Tab Einzügen +++

    //BOF +++ Kategorien markieren +++
    $category_path = explode('_',$my_cPath); //Kategoriepfad in Array einlesen

    //Aktive Kategorie markieren
    $cat_active = '';

    //Elternkategorie markieren
    $in_path = in_array($counter, $category_path); //Testen, ob aktuelle Kategorie ID im Kategoriepfad enthalten ist
    $this_category = array_pop($category_path); //Letzter Eintrag im Array ist die aktuelle Kategorie

	if($this_category == $counter || end($fullpath) == $counter) {
		$cat_active = ' active Selected';
	} elseif($in_path || in_array($counter, $fullpath)) {
		$cat_active = ' active parent';
	}
    //EOF +++ Kategorien markieren +++

	if (SHOW_COUNTS == 'true' || BS4_HIDE_EMPTY_CATEGORIES == 'true') {
		$products_in_category = xtc_count_products_in_category($counter);
	}

    $subcat_li_class = $subcat_a_class = $subcat_button = '';
	if (isset($my_foo[$counter]['hassubcat']) && $my_foo[$counter]['hassubcat'] === true) {
		if (BS4_HIDE_EMPTY_CATEGORIES != 'true' || (bs4_count_products_in_category($counter) != $products_in_category)) {
			if($func == 'main'){
				if ($level < BS4_MAXLEVEL_IN_TOPCATMENU || BS4_MAXLEVEL_IN_TOPCATMENU == 'false') {
	    			$subcat_li_class = ' category_li hassub dropdown-submenu doubletap';
	    			$subcat_a_class = ' dropdown-toggle';
				}
			} elseif($func == 'res'){
	    		$subcat_button = '<span class="next" data-menu="' . $counter . '" data-target="0"><span class="fa fa-chevron-right" aria-hidden="true"></span></span>';
			} else {
				if ($level < BS4_CATEGORIESMENU_MAXLEVEL || BS4_CATEGORIESMENU_MAXLEVEL == 'false') {
		    		$subcat_li_class = ' category_li hassub';
		    		$subcat_button = '<div class="category_button fa fa-sm fa-' . ($in_path ? 'chevron-up' : 'chevron-right') . '" data-value="'.($in_path ? ($my_foo[$counter-1]['path'] != '' ? $my_foo[$counter-1]['path'] : 0) : $my_foo[$counter]['path']).'"></div>';
				}
			}
		}
	}

	if (isset($my_foo[$counter]['name']) && $my_foo[$counter]['name'] != '') {
    	$my_categories_string .= $ul; //UL LI Versschachtelung
		if ((BS4_HIDE_EMPTY_CATEGORIES == 'true' && $products_in_category > 0) || BS4_HIDE_EMPTY_CATEGORIES != 'true') {
			if($func == 'main'){
				$my_categories_string .= '<li id="li'.$counter.'" class="level'.$level.$cat_active.$subcat_li_class.'">';
		    	$my_categories_string .= '<a id="a'.$counter.'" class="dropdown-item'.$subcat_a_class.$cat_active.'" data-value="'.($in_path ? ($my_foo[$counter-1]['path'] != '' ? $my_foo[$counter-1]['path'] : 0) : $my_foo[$counter]['path']).'" href="'.$my_foo[$counter]['link'].'" title="'.str_replace(array('"', "'"), array('&quot;', '&apos;'), $my_foo[$counter]['name']).'">';
			} else {
				$my_categories_string .= '<li class="nav-item level'.$level.$cat_active.$subcat_li_class.'">';
		    	$my_categories_string .= '<a class="nav-link'.$cat_active.'" href="'.$my_foo[$counter]['link'].'" title="'.str_replace(array('"', "'"), array('&quot;', '&apos;'), $my_foo[$counter]['name']).'">';
			}

			if($func != 'main' && $func != 'res'){
				$sign = '';
				for ($i = 2; $i <= $level; $i++) {
				    $sign .= '&rsaquo;';
				}
			    if ($sign != '') $my_categories_string .= $sign.' ';
			}

		    $my_categories_string .= $my_foo[$counter]['name'];
		    //Anzeige Anzahl der Produkte in Kategorie, für bessere Performance im Admin deaktivieren
		    if (SHOW_COUNTS == 'true') {
				if ($products_in_category > 0) {
					$my_categories_string .= '&nbsp;<span class="badge badge-secondary">' . $products_in_category . '</span>';
				}
		    }
		    $my_categories_string .= '</a>'.$subcat_button.'</li>';
		}
	}
	    //EOF  +++ Kategorie Linkerstellung +++

    //Nächste Kategorie
	if ($my_foo[$counter]['next_id']) {
		xtc_show_category($my_foo[$counter]['next_id'], $level, $my_foo, $my_categories_string, $my_cPath);
    } else {
		$my_categories_string .= '</ul>';
        if ($func == 'res') $my_categories_string .= '</div>';
		// Replace empty UL-Tag
		$my_categories_string = preg_replace("/<ul[^>]*>([\n\t]?)*<\\/ul[^>]*>/",'',$my_categories_string);
		return $my_categories_string;
	}
}

function bs4_has_category_subcat($category_id) {
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

function bs4_get_subcat_mega() {

	require_once (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/inc/gunnart_Categories.inc.php');
	$id = explode('_', $_REQUEST['cPath']);
	$fullpath = explode('_', $_REQUEST['fpath']);

	$Config = array(
		'MinLevel'		=>	100,
		'MaxLevel'		=>	false,
		'HideEmpty'		=>	BS4_HIDE_EMPTY_CATEGORIES,
		'ShowCounts'	=>	BS4_SHOW_PRODUCTS_IN_TOPCATMENU,
		'Fullpath'		=>	$fullpath,
		'CatNaviID'		=>	'main',
		'Home'			=>	BS4_SHOW_HOMEBUTTON_IN_TOPCATMENU
	);

	return gunnartCategories(end($id),2,$Config);

}

function bs4_count_products_in_category($category_id, $include_inactive = false) {
	static $products_count_array, $products_in_category_array;

	$active = (($include_inactive === false) ? 0 : 1);

	if (!is_array($products_count_array)) {
		$products_count_array = array();
	}

	if (!is_array($products_in_category_array)) {
		$products_in_category_array = array();
	}

	if (!isset($products_in_category_array[$active])) {
		$categories_query = xtDBquery("SELECT count(*) as total,
                                            p2c.categories_id
                                       FROM ".TABLE_PRODUCTS." p
                                       JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd
                                            ON p.products_id = pd.products_id
                                               AND pd.language_id = '".(int)$_SESSION['languages_id']."'
                                               AND trim(pd.products_name) != ''
                                       JOIN ".TABLE_PRODUCTS_TO_CATEGORIES." p2c
                                            ON p2c.products_id = p.products_id
                                      WHERE (p.products_status = '1'".(($include_inactive === true) ? " OR p.products_status = '0'" : '').")
                                            ".PRODUCTS_CONDITIONS_P."
                                   GROUP BY p2c.categories_id");
		if (xtc_db_num_rows($categories_query, true)) {
			while ($categories = xtc_db_fetch_array($categories_query, true)) {
				$products_in_category_array[$active][$categories['categories_id']] = $categories['total'];
			}
		}
	}

	if (!isset($products_count_array[$active][$category_id])) {
		$products_count_array[$active][$category_id] = 0;
		$products_count_array[$active][$category_id] += ((isset($products_in_category_array[$active][$category_id])) ? $products_in_category_array[$active][$category_id] : 0);
	}

	return $products_count_array[$active][$category_id];
}
?>