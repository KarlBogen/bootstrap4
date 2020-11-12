<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------
   Module:    Rezensionsaufgliederung nach vergebenen Sternen (rev. awidsRatingBreakdown_v1.1_20200210)
   Date:      2020-02-10
   Author:    awids
   --------------------------------------------------------------------------------------------------*/

if (isset($_REQUEST['speed'])) {

	require_once ('includes/application_top.php');
	require_once (DIR_FS_INC.'db_functions_'.DB_MYSQL_TYPE.'.inc.php');
	require_once (DIR_FS_INC.'db_functions.inc.php');
	require_once (DIR_WS_INCLUDES.'database_tables.php');

}

function bs4_awids_rating() {


	xtc_db_connect() or die('Unable to connect to database server!');

	// get Variables
	$pid = $_REQUEST['pid'];
	$class = $_REQUEST['class'];
	$textclass = $class == 'prod' ? '' : 'small';

	$breakdown = array();
	$breakdown_content = '';
	$popup = constant('BS4_AWIDSRATINGBREAKDOWN_URL');

		// prepare data
        $full_query = xtc_db_query("SELECT COUNT(products_id) as result
									FROM ".TABLE_REVIEWS."
									WHERE products_id = '".(int)$pid."'
									AND reviews_status = 1");
        $full = xtc_db_fetch_array($full_query);
        $sum_reviews = (int)$full["result"];

			$data = array (
				'BS4_AWIDS_PRODUCTS_RATINGDATA' => '',
				'BS4_AWIDS_PRODUCTS_SUM_REVIEWS' => 0,
				'BS4_AWIDS_PRODUCTS_AVERAGE' => 0,
				'BS4_AWIDS_PRODUCTS_AVERAGE_PERCENT' => 0,
			);

        if ($sum_reviews > 0) {
			$query = xtc_db_query("SELECT reviews_rating as rate,
									count(reviews_rating) as res
									FROM ".TABLE_REVIEWS."
									WHERE products_id = '".(int)$pid."'
									AND reviews_status = 1
									GROUP BY reviews_rating
									ORDER BY rate asc");
			$data_result = array ();
			$sum_ratings = 0;
			if (xtc_db_num_rows($query) > 0) {
				while ($result = xtc_db_fetch_array($query)) {
					$data_result[$result['rate']] = $result['res'];
					$sum_ratings = $sum_ratings + ($result['rate']*$result['res']);
				}
				$average = number_format(($sum_ratings/$sum_reviews), 1, ',','');
				$average_percent = number_format((100/5*$sum_ratings/$sum_reviews), $precision, ',','');
			}

			$data = array (
				'BS4_AWIDS_PRODUCTS_RATINGDATA' => $data_result,
				'BS4_AWIDS_PRODUCTS_SUM_REVIEWS' => $sum_reviews,
				'BS4_AWIDS_PRODUCTS_AVERAGE' => $average,
				'BS4_AWIDS_PRODUCTS_AVERAGE_PERCENT' => $average_percent,
			);
		}

		// prepare layout data
		$colors = array('danger', 'warning', 'info', 'primary', 'success');
		//$rating = '<div class="ratings"><div class="empty-stars"></div><div class="full-stars" style="width:'.$data['BS4_AWIDS_PRODUCTS_AVERAGE_PERCENT'].'%"></div></div>&nbsp;('.$data['BS4_AWIDS_PRODUCTS_SUM_REVIEWS'].')';
		$rating = '<div class="ratings"><div class="fas empty-stars"></div><div class="fas full-stars" style="width:'.$data['BS4_AWIDS_PRODUCTS_AVERAGE_PERCENT'].'%"></div></div>&nbsp;('.$data['BS4_AWIDS_PRODUCTS_SUM_REVIEWS'].')';
		for ($i=1, $n=6; $i<$n; $i++) {
			$count = (isset($data['BS4_AWIDS_PRODUCTS_RATINGDATA'][$i]) && $data['BS4_AWIDS_PRODUCTS_RATINGDATA'][$i] > 0) ? $data['BS4_AWIDS_PRODUCTS_RATINGDATA'][$i] : 0;
			$percent = $data['BS4_AWIDS_PRODUCTS_SUM_REVIEWS'] == 0 ? 0 : number_format($count*100/$data['BS4_AWIDS_PRODUCTS_SUM_REVIEWS'], 0, '.', '');
			$sum = $count.' ('.$percent.'%)';
			$color = 'bg-'.$colors[$i-1];
			$stars = $i.'&nbsp;<i class="fas fa-star"></i>';
			$popup_link = xtc_href_link(FILENAME_POPUP_REVIEWS, 'products_id='.$pid.'&stars='.$i);

			$breakdown[] = array('stars'	=> $stars,
								'color'		=> $color,
								'percent'	=> $percent,
								'value'		=> $sum,
								'link'		=> $popup_link);
		}

		if (!empty($breakdown)) {
			$breakdown_content .= '<div class="avg_container bg-white border p-2 ' . $class . '">';
			$breakdown_content .= '<div class="avg_bar ' . $textclass . '"><span class="ratings-text"><strong>'.sprintf(BS4_AWIDSRATINGBREAKDOWN_HEADLINE,$data['BS4_AWIDS_PRODUCTS_AVERAGE']).'</strong></span>'.$rating.'</div>';
			foreach (array_reverse($breakdown) as $content) {
			$breakdown_content .= '<div class="avg_bar">
										'.(($popup == 'true') ? '<a href="#" data-toggle="modal" data-target="#modal" data-src="'.$content['link'].'" title="Information" class="'.((defined('TPL_POPUP_CONTENT_LINK_CLASS')) ? TPL_POPUP_CONTENT_LINK_CLASS : POPUP_CONTENT_LINK_CLASS).' text-body">' : '').'
										<div class="avg_left float-left">
											'.$content['stars'].'
										</div>
										<div class="avg_center float-left">
											<div class="avg_progress">
												<div class="avg_progress_bar '.$content['color'].'" role="progressbar" style="width: '.$content['percent'].'%" aria-valuenow="'.$content['percent'].'" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="avg_right float-left text-right">
											<small>&nbsp;'.$content['value'].'</small>
										</div>
										'.(($popup == 'true') ? '</a>' : '').'
									</div>';
			}
			$breakdown_content .= '</div>';
		}

		return $breakdown_content;

}
?>