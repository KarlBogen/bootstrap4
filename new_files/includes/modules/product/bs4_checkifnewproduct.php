<?php

class bs4_checkifnewproduct {  //Important same name as filename

    //--- BEGIN DEFAULT CLASS METHODS ---//
    function __construct()
    {
        $this->code = 'bs4_checkifnewproduct'; //Important same name as class name
        $this->title = 'Check if new product';
        $this->description = 'Prüft, ob der Artikel "Neu" ist!';
        $this->name = 'MODULE_PRODUCT_'.strtoupper($this->code);
        $this->enabled = defined($this->name.'_STATUS') && constant($this->name.'_STATUS') == 'true' ? true : false;
        $this->sort_order = defined($this->name.'_SORT_ORDER') ? constant($this->name.'_SORT_ORDER') : '';

        $this->translate();
    }

    function translate() {
        switch ($_SESSION['language_code']) {
          case 'de':
            $this->description = '<strong>Dieses Modul geh&ouml;rt zum Systemmodul "BS4 Template Manager"</strong><br />Es wird automatisch konfiguriert mit dem Systemmodul.<br /><br /><strong>Dieses Modul prüft, ob der Artikel "Neu" ist und erweitert das Produkt-Array.</strong>';
            break;
          default:
            $this->description = '<strong>This module is part of the systemmodule "BS4 Template Manager"</strong><br />It is automatically configured with the system module.<br /><br /><strong>this module check, if a product is "New" and extend the products array.</strong>';
            break;
        }
    }

    function check() {
        if (!isset($this->_check)) {
          $check_query = xtc_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = '".$this->name."_STATUS'");
          $this->_check = xtc_db_num_rows($check_query);
        }
        return $this->_check;
    }

    function keys() {
        define($this->name.'_STATUS_TITLE', TEXT_DEFAULT_STATUS_TITLE);
        define($this->name.'_STATUS_DESC', TEXT_DEFAULT_STATUS_DESC);
        define($this->name.'_SORT_ORDER_TITLE', TEXT_DEFAULT_SORT_ORDER_TITLE);
        define($this->name.'_SORT_ORDER_DESC', TEXT_DEFAULT_SORT_ORDER_DESC);

        return array(
//            $this->name.'_STATUS',
            $this->name.'_SORT_ORDER'
        );
    }

    function install() {
    }

    function remove() {
    }

    //--- BEGIN CUSTOM  CLASS METHODS ---//

	/**
	* buildDataArray
	*
	* @param array $array
	* @return array
	*/
	function buildDataArray($productData, $array, $image='thumbnail', $precision = 0) {

		$product_isnew = '';
		if (isset($array['products_date_added']) && $array['products_date_added'] != '0000-00-00 00:00:00' && MAX_DISPLAY_NEW_PRODUCTS_DAYS != '0') {
			$date_new_products = date("Y-m-d", mktime(1, 1, 1, date("m"), date("d") - MAX_DISPLAY_NEW_PRODUCTS_DAYS, date("Y")));

			if ($date_new_products." 00:00:00"> $array['products_date_added']) {
				$product_isnew = ''; //Produkt ist alt
			} else {
				$product_isnew = '1'; //Produkt ist neu
			}
		}

		$productDataNew = array (
			'PRODUCTS_OLDNEW'=>$product_isnew
		);
		$productData = array_merge($productData,$productDataNew);

		if (defined('BS4_AWIDSRATINGBREAKDOWN') && BS4_AWIDSRATINGBREAKDOWN == 'true') {

			$sum_reviews = $this->getReviewsCount((int)$array['products_id']);
			$average = $this->getReviewsAverage((int)$array['products_id'], 1);
			$average_percent = number_format(($average*100/5), 0, ',','');

			$DataArray = array (
				'BS4_AWIDS_PRODUCTS_SUM_REVIEWS' => $sum_reviews,
				'BS4_AWIDS_PRODUCTS_AVERAGE' => $average,
				'BS4_AWIDS_PRODUCTS_AVERAGE_PERCENT' => $average_percent,
			);
			$productData = array_merge($productData,$DataArray);
		}

		return $productData;

	}

// Copy from class product
// language from query deleted

  /**
   * Query for reviews count
   *
   * @return integer
   */
  function getReviewsCount($pID = '') {
    if ($pID == '') {
      $pID = $this->pID;
    }
    $reviews_query = xtc_db_query("SELECT count(*) AS total
                                     FROM ".TABLE_REVIEWS." r
                                     JOIN ".TABLE_REVIEWS_DESCRIPTION." rd
                                          ON r.reviews_id = rd.reviews_id
                                             AND rd.reviews_text != ''
                                    WHERE r.products_id = '".(int)$pID."'
                                      AND r.reviews_status = '1'");
    $reviews = xtc_db_fetch_array($reviews_query);
    return $reviews['total'];
  }


  /**
   * getReviewsAverage
   *
   * @return string
   */
  function getReviewsAverage($pID = '', $precision = 0) {
    if ($pID == '') {
      $pID = $this->pID;
    }
    $avg_reviews_query = xtc_db_query("SELECT avg(reviews_rating) AS avg_rating
                                         FROM ".TABLE_REVIEWS."
                                        WHERE products_id='".(int)$pID."'
                                          AND reviews_status = '1'");
    $avg_reviews = xtc_db_fetch_array($avg_reviews_query);

    return round($avg_reviews['avg_rating'] ?? 0, $precision);
  }

}
?>