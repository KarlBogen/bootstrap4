<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

define('CUSTOMERS_REMIND' , 'Customer Remind');
define('CUSTOMERS_REMIND_NOTE' , 'Article currently not in stock!');
define('CUSTOMERS_REMIND_LINK_TEXT', 'Advice of availability');
define('CUSTOMERS_REMIND_EMAIL_HEADING', 'Customer remind when articles arrive again');
define('CUSTOMERS_REMIND_EMAIL_1', 'has registered for this article:');

define('CONTACT_SUBJECT_0', '-- Please Select -- ');
define('CONTACT_SUBJECT_4', 'Price Inquiry');
define('TEXT_PRODUCTS_CHEAPLY', 'More cheaply seen?');
define('TEXT_PRODUCTS_CHEAPLY_NAME', 'Products Name: ');
define('TEXT_PRODUCTS_CHEAPLY_NUMBER', 'Model-No.: ');
define('TEXT_PRODUCTS_CHEAPLY_NOTE', 'I am interested in the article: ');
define('TEXT_PRODUCTS_CHEAPLY_NOTE2', 'However I saw this article at a favourable price with one of your competitors. Please let me know if you can undercut the above mentioned article..');
define('ENTRY_COMPETITORURL_CHECK_ERROR','Register please those to competitor URL!');
define('ENTRY_COMPETITORURL_VALIDATION_ERROR', 'The competitor URL is no valide URL!');
define('ENTRY_COMPETITORPRICE_CHECK_ERROR','Please register the competitor price!');
define('NAVBAR_TITLE_CHEAPLY_SEE','Have You see this Product cheaply?');
define('CHEAPLY_SEE_HEADING_FORMULAR','Price inquiry form');
define('CHEAPLY_SEE_TO_PRODUCT', 'To the product');
define('ENTRY_VVCODE_CHECK_ERROR', 'Please enter the spam protection code!');
define('BS4_EMAIL', 'E-mail: ');
define('BS4_PHONE', 'Phone: ');
define('BS4_COMPETITORURL', 'Competitor URL: ');
define('BS4_COMPETITORPRICE', 'Competitor price: ');
define('BS4_SUBJECT', 'Subject: ');

define('TEXT_PRODUCT_INQUIRY', 'Question to article');
define('ENTRY_MESSAGE_BODY_ERROR', 'Please enter the message to us!');

/*
 * --------------------------------------------------------------------------
 * @file      web0null_attribute_price_updater.php
 * @date      18.10.17
 *
 *
 * LICENSE:   Released under the GNU General Public License
 * --------------------------------------------------------------------------
 */
//BOF - web0null_attribute_price_updater
define('BS4_TEXT_PRODUCTS_VPE', 'VPE');
define('BS4_TEXT_ATTRIBUTE_PRICE_UPDATER_A', 'In this Version:');
define('BS4_TEXT_ATTRIBUTE_PRICE_UPDATER_B', 'Price/Article');
define('BS4_TXT_ONLY', '<span class="small_price">Now only</span> ');
define('BS4_TXT_INSTEAD', '<span class="small_price">Our previous price</span> ');
//EOF - web0null_attribute_price_updater

/* ----------------------------------------------------------------------------------------------------
   Module:    Rezensionsaufgliederung nach vergebenen Sternen (rev. awidsRatingBreakdown_v1.1_20200210)
   Date:      2020-02-10
   Author:    awids
   --------------------------------------------------------------------------------------------------*/

define('BS4_AWIDSRATINGBREAKDOWN_ARROW_TITLE', 'Rating breakdown');
define('BS4_AWIDSRATINGBREAKDOWN_DATE', '<strong>Date:</strong>');
define('BS4_AWIDSRATINGBREAKDOWN_HEADLINE1', 'Reviews with 1 star');
define('BS4_AWIDSRATINGBREAKDOWN_HEADLINE2', 'Reviews with %s stars');
define('BS4_AWIDSRATINGBREAKDOWN_HEADLINE3', 'All %s reviews');
define('BS4_AWIDSRATINGBREAKDOWN_LINK_ALL', 'All');
define('BS4_AWIDSRATINGBREAKDOWN_LINK_1', '1 stars');
define('BS4_AWIDSRATINGBREAKDOWN_LINK_2', '2 stars');
define('BS4_AWIDSRATINGBREAKDOWN_LINK_3', '3 stars');
define('BS4_AWIDSRATINGBREAKDOWN_LINK_4', '4 stars');
define('BS4_AWIDSRATINGBREAKDOWN_LINK_5', '5 stars');
define('BS4_AWIDSRATINGBREAKDOWN_HEADLINE', 'Rating: %s of 5 ');
define('BS4_AWIDSRATINGBREAKDOWN_MY_LANG', 'show only my language');
define('BS4_AWIDSRATINGBREAKDOWN_ALL_LANGS', 'show all languages');

// Falls der Buttontext für OIL.js nicht definiert ist
defined('TEXT_COOKIE_CONSENT_LABEL_BUTTON_ESSENTIALS_ONLY') or define('TEXT_COOKIE_CONSENT_LABEL_BUTTON_ESSENTIALS_ONLY','Only essential');

/* ------------------------------------------------------------------------------------------------------------------
   CSS Produkt- & Attributlagerampel v1.0(2017-04-22)

   Authors:
   -------------------
     awids (www.awids.de)
     web28 (www.rpa-com.de)
     noRiddle (www.revilonetz.de)

   ----------------------------------------------------------------------------------------------------------------*/

define('BS4_MODULE_TRAFFIC_LIGHTS_STOCK','Stock');
define('BS4_MODULE_TRAFFIC_LIGHTS_QTY_RED','not on stock');
define('BS4_MODULE_TRAFFIC_LIGHTS_QTY_YELL','few on stock');
define('BS4_MODULE_TRAFFIC_LIGHTS_QTY_GREEN','on stock');
?>