<?php
/* -----------------------------------------------------------------------------------------
   $Id: categories.php 14628 2022-07-06 10:12:08Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(categories.php,v 1.23 2002/11/12); www.oscommerce.com
   (c) 2003 nextcommerce (categories.php,v 1.10 2003/08/17); www.nextcommerce.org
   (c) 2006 XT-Commerce

   Released under the GNU General Public License
   -----------------------------------------------------------------------------------------
   Third Party contributions:
   Enable_Disable_Categories 1.3          Autor: Mikel Williams | mikel@ladykatcostumes.com

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

// include smarty
include(DIR_FS_BOXES_INC . 'smarty_default.php');

// set cache id
$cache_id = md5('lID:'.$_SESSION['language'].'|csID:'.$_SESSION['customers_status']['customers_status_id'].'|cP:'.$cPath.(((defined('SPECIALS_CATEGORIES') && SPECIALS_CATEGORIES === true) || (defined('WHATSNEW_CATEGORIES') && WHATSNEW_CATEGORIES === true)) ? '|self:'.basename($PHP_SELF) : ''));

if ((!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/box_categories.html', $cache_id) && !$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/box_categories2.html', $cache_id)) || !$cache) {

  // include needed functions
  require_once (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/inc/xtc_show_category.inc.php');
  require_once (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/inc/close_ul_tags.inc.php');
//  require_once (DIR_FS_INC.'xtc_has_category_subcategories.inc.php');
  require_once (DIR_FS_INC.'xtc_count_products_in_category.inc.php');
  
  $foo = array();
  $categories_string = '';
  unset($prev_id);
  
  $categories_query = xtDBquery("SELECT c.categories_id,
                                        cd.categories_name,
										cd.categories_heading_title,
                                        c.parent_id
                                   FROM ".TABLE_CATEGORIES." c
                                   JOIN ".TABLE_CATEGORIES_DESCRIPTION." cd
                                        ON c.categories_id = cd.categories_id
                                           AND cd.language_id='".(int)$_SESSION['languages_id']."'
                                           AND trim(cd.categories_name) != ''
                                  WHERE c.categories_status = '1'
                                    AND c.parent_id = '0'
                                        ".CATEGORIES_CONDITIONS_C."
                               ORDER BY c.sort_order, cd.categories_name");
  if (xtc_db_num_rows($categories_query, true) > 0) {
    while ($categories = xtc_db_fetch_array($categories_query, true)) {
      $categories['cat_link'] = xtc_href_link(FILENAME_DEFAULT, xtc_category_link($categories['categories_id'],$categories['categories_name']));
      $foo[$categories['categories_id']] = array (
          'id' => $categories['categories_id'],
          'name' => $categories['categories_name'],
          'heading' => $categories['categories_heading_title'],
          'link' => $categories['cat_link'],
          'parent' => $categories['parent_id'],
          'level' => 0,
          'path' => $categories['categories_id'],
          'next_id' => false
        );

// meine Änderung zählen ob Unterkategorie vorhanden ist
          $hassubcat = bs4_has_cat_subcat($categories['categories_id']);
          $foo[$categories['categories_id']]['hassubcat'] = $hassubcat === true ? true : false;
// Ende Karl

      if (isset($prev_id)) {
        $foo[$prev_id]['next_id'] = $categories['categories_id'];
      }

      $prev_id = $categories['categories_id'];

      if (!isset ($first_element)) {
        $first_element = $categories['categories_id'];
      }
    }

    if ($cPath) {
      $new_path = '';
      $id = explode('_', $cPath);
      foreach ($id as $key => $value) {
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
            $foo[$row['categories_id']] = array (
				'id' => $row['categories_id'],
                'name' => $row['categories_name'],
                'link' => $row['cat_link'],
                'parent' => $row['parent_id'],
                'level' => $key +1,
                'path' => $new_path.'_'.$row['categories_id'],
                'next_id' => false
              );

			// meine Änderung prüfen ob erstes Element gesetzt und Unterkategorie vorhanden ist
			if (!isset ($first_element)) {
				$first_element = $value;
			}
			$hassubcat = bs4_has_cat_subcat($row['categories_id']);
			$foo[$row['categories_id']]['hassubcat'] = $hassubcat === true ? true : false;
			// Ende Karl

            if (isset ($prev_id)) {
              $foo[$prev_id]['next_id'] = $row['categories_id'];
            }
            $prev_id = $row['categories_id'];
            if (!isset ($first_id)) {
              $first_id = $row['categories_id'];
            }
            $last_id = $row['categories_id'];
          }
          $foo[$last_id]['next_id'] = isset($foo[$value]['next_id']) ? $foo[$value]['next_id'] : 0;
          $foo[$value]['next_id'] = $first_id;
          $new_path .= '_';
        } else {
          break;
        }
      }
    }
    
    if (!empty($first_element)) {
      xtc_show_category($first_element);
    }

    $box_smarty->assign('BOX_CONTENT', $categories_string);
    $box_smarty->assign('BOX_CONTENT2', $categories_string2);
  }
		// meine Änderung Zusatzlinks
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
		// Ende Karl
}

if (!$cache) {
  $box_categories = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_categories.html');
  $box_categories2 = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_categories2.html');
} else {
  $box_categories = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_categories.html', $cache_id);
  $box_categories2 = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_categories2.html', $cache_id);
}

$smarty->assign('box_CATEGORIES', $box_categories);
$smarty->assign('box_CATEGORIES2', $box_categories2);

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