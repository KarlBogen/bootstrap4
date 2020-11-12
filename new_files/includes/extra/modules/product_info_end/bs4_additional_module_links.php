<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

// Zusatzmodul Billiger gesehen
if (defined('BS4_CHEAPLY_SEE') && BS4_CHEAPLY_SEE == 'true') {
	if ($request_type == 'NONSSL') {
		$info_smarty->assign('PRODUCTS_CHEAPLY', '<a title="'.TEXT_PRODUCTS_CHEAPLY.'" href="'.xtc_href_link(FILENAME_CHEAPLY_SEE, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name']).'&view=nonssl').'">'.xtc_image_button('button_cheaply_see', TEXT_PRODUCTS_CHEAPLY).'</a>');
	} else {
		$info_smarty->assign('PRODUCTS_CHEAPLY', '<a class="iframe" title="'.TEXT_PRODUCTS_CHEAPLY.'" href="'.xtc_href_link(FILENAME_CHEAPLY_SEE, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name'])).'">'.xtc_image_button('button_cheaply_see', TEXT_PRODUCTS_CHEAPLY).'</a>');
	}
}
// Zusatzmodul Frage zum Produkt
if (defined('BS4_PRODUCT_INQUIRY') && BS4_PRODUCT_INQUIRY == 'true') {
	if ($request_type == 'NONSSL') {
		$info_smarty->assign('PRODUCT_INQUIRY', '<a title="'.TEXT_PRODUCT_INQUIRY.'" href="'.xtc_href_link(FILENAME_PRODUCT_INQUIRY, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name']).'&view=nonssl').'">'.xtc_image_button('button_product_inquiry', TEXT_PRODUCT_INQUIRY).'</a>');
	} else {
		$info_smarty->assign('PRODUCT_INQUIRY', '<a class="iframe" title="'.TEXT_PRODUCT_INQUIRY.'" href="'.xtc_href_link(FILENAME_PRODUCT_INQUIRY, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name'])).'">'.xtc_image_button('button_product_inquiry', TEXT_PRODUCT_INQUIRY).'</a>');
	}
}
/* ------------------------------------------------------------
	Module "Kundenerinnerung_Multilingual_advanced_modified-shop-2.0.3.0" made by Karl

	Based on: Kundenerinnerung_Multilingual_advanced_modified-shop-1.06
	Based on: xt-module.de customers remind
	erste Anpassung von: Fishnet Services - Gemsjäger 30.03.2012
	Zusatzfunktionen eingefügt sowie Fehler beseitigt von Ralph_84
	Aufgearbeitet für die Modified 1.06 rev4356 von Ralph_84

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

if (defined('BS4_CUSTOMERS_REMIND') && BS4_CUSTOMERS_REMIND == 'true') {

	if ($product->data['products_quantity'] < 1) {

		$remindlink = '';
		$remindlink .= '<p class="text-danger mb-1">' . CUSTOMERS_REMIND_NOTE . '</p>'."\n";

		$products_qty = '<input type="hidden" value="1" name="products_qty">';

		if ($request_type == 'NONSSL') {
			$remindlink .= '<a title="'.CUSTOMERS_REMIND_LINK_TEXT.'" href="'.xtc_href_link(FILENAME_CUSTOMERS_REMIND, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name']).'&view=nonssl').'">'.xtc_image_button('button_customers_remind', CUSTOMERS_REMIND_LINK_TEXT).'</a>';
		} else {
			$remindlink .= '<a class="iframe" title="'.CUSTOMERS_REMIND_LINK_TEXT.'" href="'.xtc_href_link(FILENAME_CUSTOMERS_REMIND, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name'])).'">'.xtc_image_button('button_customers_remind', CUSTOMERS_REMIND_LINK_TEXT).'</a>';
		}

		$info_smarty->clear_assign('ADD_QTY');
		$info_smarty->clear_assign('ADD_CART_BUTTON');

		$info_smarty->assign('ADD_QTY', $products_qty . ' ' . $add_pid_to_qty);
		$info_smarty->assign('ADD_CART_BUTTON', $remindlink);
	}
}
?>