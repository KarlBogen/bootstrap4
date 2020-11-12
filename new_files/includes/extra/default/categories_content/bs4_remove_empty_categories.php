<?php
if (BS4_HIDE_EMPTY_CATEGORIES == 'true') {

/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

// Leere Kategorien entfernen
require_once (DIR_FS_INC.'xtc_count_products_in_category.inc.php');
if (xtc_count_products_in_category($categories['categories_id']) < 1) array_pop($categories_content);
if (empty($categories_content)) unset($categories_content);

}
?>