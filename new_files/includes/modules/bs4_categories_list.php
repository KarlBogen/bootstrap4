<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

	// MODUL: Kategorien auf der Startseite anzeigen (c_list Modul)
	// Anpassung an modified 1.x: sgei
	// Anpassung an modified 2.x: |Alex|
	// Quelle: xtc-load.de - Autor: unbekannt

if (file_exists(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/module/categories_list.html')) {

$module_smarty = new Smarty;
$module_content = array ();

$module_smarty->assign('language', $_SESSION['language']);
// set cache ID
if (!CacheCheck()) {
	$cache=false;
	$module_smarty->caching = 0;
  $cache_id = null;
} else {
	$cache=true;
	$module_smarty->caching = 1;
	$module_smarty->cache_lifetime = CACHE_LIFETIME;
	$module_smarty->cache_modified_check = CACHE_CHECK;
	$cache_id = md5('lID:'.$_SESSION['language'].'|csID:'.$_SESSION['customers_status']['customers_status_id'].'|cP:'.$cPath);
}

if(!$module_smarty->is_cached(CURRENT_TEMPLATE.'/module/categories_list.html', $cache_id) || !$cache) {

	$module_smarty->assign('tpl_path', 'templates/'.CURRENT_TEMPLATE.'/');

	$categories_string = '';
	if (GROUP_CHECK == 'true') {
		$group_check = "c.group_permission_".$_SESSION['customers_status']['customers_status_id']."=1 AND";
	}
	$categories_query = "SELECT c.categories_id,
								c.categories_image,
                                c.categories_image_list,
                                c.categories_image_mobile,
								cd.categories_name,
								cd.categories_description,
                                cd.categories_heading_title
							FROM ".TABLE_CATEGORIES." AS c,
								".TABLE_CATEGORIES_DESCRIPTION." AS cd
							WHERE c.categories_id = cd.categories_id
							AND c.parent_id = '0'
							AND ".$group_check."
								c.categories_status = '1'
							AND cd.language_id = '" .(int) $_SESSION['languages_id']. "'
							ORDER BY c.sort_order ASC";

	$categories_query = xtDBquery($categories_query);

	while($categories = xtc_db_fetch_array($categories_query, true)) {

		$cPath_new = xtc_category_link($categories['categories_id'],$categories['categories_name']);

		$image = $main->getImage($categories['categories_image']);
		$image_list = $main->getImage($categories['categories_image_list']);
		$image_mobile = $main->getImage($categories['categories_image_mobile']);

		$module_content[] = array (
	        'CATEGORY_NAME' => $categories['categories_name'],
	        'CATEGORY_HEADING_TITLE' => $categories['categories_heading_title'],
	        'CATEGORY_IMAGE' => (($image != '') ? DIR_WS_BASE . $image : ''),
	        'CATEGORY_IMAGE_LIST' => (($image_list != '') ? DIR_WS_BASE . $image_list : ''),
	        'CATEGORY_IMAGE_MOBILE' => (($image_mobile != '') ? DIR_WS_BASE . $image_mobile : ''),
	        'CATEGORY_LINK' => xtc_href_link(FILENAME_DEFAULT, $cPath_new),
	        'CATEGORY_DESCRIPTION' => $categories['categories_description']
		);
	}
  
	$module_smarty->assign('module_content', $module_content);

}

$module_categories = $module_smarty->fetch(CURRENT_TEMPLATE.'/module/categories_list.html', $cache_id);

}
?>