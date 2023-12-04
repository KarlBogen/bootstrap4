<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

/*
	Zusatzmodul Awids Rating Breakdown - Rezensionsaufgliederung nach vergebenen Sternen
*/


require('includes/application_top.php');
require_once (DIR_FS_INC.'xtc_date_short.inc.php');

$pID = $_GET['products_id'];
$stars = (int)$_GET['stars'];

$popup_smarty = new Smarty();

    $reviews_query = xtc_db_query("SELECT r.reviews_rating,
                                          r.reviews_id,
                                          r.customers_name,
                                          r.date_added,
                                          r.last_modified,
                                          r.reviews_read,
                                          rd.languages_id,
                                          rd.reviews_text
                                     FROM ".TABLE_REVIEWS." r
                                     JOIN ".TABLE_REVIEWS_DESCRIPTION." rd
                                          ON r.reviews_id = rd.reviews_id
                                    WHERE r.products_id = '".(int)$pID."'
                                      AND r.reviews_status = '1'
                                 ORDER BY r.reviews_id DESC");
    $data_reviews = array ();
    if (xtc_db_num_rows($reviews_query)) {
      while ($reviews = xtc_db_fetch_array($reviews_query)) {
		$langs[] = (int)$reviews['languages_id'];
        $data_reviews[$reviews['reviews_rating']][] = array (
          'AUTHOR' => $reviews['customers_name'],
          'DATE' => xtc_date_short($reviews['date_added']),
          'RATING_VOTE' => constant('BS4_AWIDSRATINGBREAKDOWN_LINK_'.$reviews['reviews_rating']),
          'LANG_ID' => (int)$reviews['languages_id'],
          'TEXT' => nl2br($reviews['reviews_text'])
        );
      }
    }

$counter = isset($data_reviews[1]) ? count($data_reviews[1]) : 0;
$headline_1 = $counter.' '.constant('BS4_AWIDSRATINGBREAKDOWN_HEADLINE1');
$popup_smarty->assign('headline_1', $headline_1);
for ($i = 2; $i < 6; $i++) {
	$plus = isset($data_reviews[$i]) ? count($data_reviews[$i]) : 0;
	${'headline_'.$i} = $plus.' '.sprintf(BS4_AWIDSRATINGBREAKDOWN_HEADLINE2, $i);
	$popup_smarty->assign('headline_'.$i, ${'headline_'.$i});
	$counter = $counter + $plus;
}
$headline_all = sprintf(BS4_AWIDSRATINGBREAKDOWN_HEADLINE3, $counter);
$popup_smarty->assign('headline_all', $headline_all);
$popup_smarty->assign('module_content', $data_reviews);
$popup_smarty->assign('language', $_SESSION['language']);
$popup_smarty->assign('languages_id', $_SESSION['languages_id']);
$popup_smarty->assign('langs', count(array_unique($langs)));
$popup_smarty->assign('stars', $stars);
  // dont allow cache
  $popup_smarty->caching = 0;

$popup_smarty->display(CURRENT_TEMPLATE.'/module/popup_reviews.html');

?>