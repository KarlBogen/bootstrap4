<?php

require_once(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/lang/buttons_'.$_SESSION['language'].'.php');

function css_button($image, $alt, $parameters = '', $submit = false) {

    $name           = substr(basename($image), 0, strrpos(basename($image), '.'));
    $html           = '';
    $title          = $alt;
    $leer			= '';

    $products_review_link = defined('PRODUCTS_REVIEW_LINK_TITLE') ? PRODUCTS_REVIEW_LINK_TITLE : PRODUCTS_REVIEW_LINK;
    $printview_info = defined('PRINTVIEW_INFO_TITLE') ? PRINTVIEW_INFO_TITLE : PRINTVIEW_INFO;

    // Erklärung: es wird geprüft, welches Buttonbild von Modified aufgerufen wird. Dementsprechend werden neue Attribute zugewiesen.
    // z.B. dem Buttonbild 'button_checkout_express.gif', hier abgekürzt 'button_checkout_express' wird zugewiesen:
    //      'Text' => TEXT_CHECKOUT_EXPRESS_INFO_LINK (der Text der auf dem neuen Button angezeigt wird, in der Regel der Text der Modifiedvariablen '$alt', in unserem Beispiel der Text der in der Languagedatei 'TEXT_CHECKOUT_EXPRESS_INFO_LINK' zugewiesen wurde).
    //      'icon' => 'fa fa-cart-plus' (das Icon das im Button angezeigt wird - in der Font Awesome Dokumentation unter 'https://fontawesome.com/icons?d=gallery&s=regular,solid' kann man diese aussuchen).
    //      'iconposition' => 'left' (die Position des Icons im Button - 'left' = links vom Text, 'right' = rechts vom Text).
    //      'Class' => '' (hier kann dem Button noch eine zusätzliche CSS-Klasse zugewiesen werden - zu finden in der Bootstrap 4 Dokumentation Abschnitt Buttons 'https://getbootstrap.com/docs/4.3/components/buttons/').

	switch ($name) {
 
    case 'epaypal_'.$_SESSION['language_code']:
    // PayPal
			$buttons = array('Text' => constant('BUTTON_EPAYPAL_'.strtoupper($_SESSION['language_code']).'_TEXT'), 'icon' => '', 'iconposition' => 'right', 'Class' => 'btn btn-paypal btn-sm  btn-block mb-2');
      break;
	// Modified Button
    case 'button_add_address':
	// Addressbuch
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-plus-square', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_add_quick':
	// Box Add a quickie
			$buttons = array('Text' => '', 'icon' => 'fa fa-shopping-cart', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm px-4');
      break;
    case 'button_admin':
	// Box Admin
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-wrench', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_back':
	// Mehrfachnutzung Account, Checkout, Bewertungen, Contentseiten
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-arrow-left', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_buy_now':
	// Mehrfachnutzung Produktseiten
			$buttons = array('Text' => '', 'icon' => 'fa fa-shopping-cart', 'iconposition' => 'left', 'Class' => 'btn btn-cart btn-outline-secondary btn-sm');
      break;
    case 'button_change_address':
	// Mehrfachnutzung Checkout Rechnungsadresse, Lieferadresse
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-edit', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_checkout':
	// Warenkorb
			$buttons = array('Text' => $alt, 'icon' => 'far fa-credit-card', 'iconposition' => 'right', 'Class' => 'btn btn-checkout btn-success btn-block');
      break;
    case 'button_checkout_express':
	// Mehrfachnutzung Nutzerkonto-Bestellhistorie, Produktdetailseiten, Warenkorb
			$buttons = array('Text' => TEXT_CHECKOUT_EXPRESS_INFO_LINK, 'icon' => 'fa fa-cart-plus', 'iconposition' => 'left', 'Class' => 'btn btn-express btn-outline-secondary btn-sm btn-block');
      break;
    case 'button_confirm':
	// Mehrfachnutzung Downloads-Login, Payone, PayPal
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-check', 'iconposition' => 'right', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_confirm_order':
	// Checkout -> Kaufen-Button
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-check', 'iconposition' => 'right', 'Class' => 'btn btn-danger');
      break;
    case 'button_continue':
	// Mehrfachnutzung Account, Checkout, Downloads, Gutschein, Login, Logout, Bewertungen, Warenkorb, Merkzettel
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-arrow-right', 'iconposition' => 'right', 'Class' => 'btn btn-success btn-sm');
      break;
    case 'button_continue_shopping':
	// Warenkorb
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-arrow-left', 'iconposition' => 'left', 'Class' => 'btn btn-shop btn-secondary btn-block');
      break;
    case 'button_delete':
	// Addressbuch
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-times', 'iconposition' => 'left', 'Class' => 'btn btn-danger btn-sm');
      break;
    case 'button_download':
	// Produktseiten Downloads
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-download', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_in_cart':
	// Mehrfachnutzung Nutzerkonto-Bestellhistorie, Produktseiten, Produktdetailseiten, Bewertungen
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-shopping-cart', 'iconposition' => 'left', 'Class' => 'btn btn-cart btn-secondary btn-sm btn-block');
      break;
    case 'button_in_wishlist':
	// Mehrfachnutzung Produktseiten, Produktdetailseiten
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-heart', 'iconposition' => 'left', 'Class' => 'btn btn-wish btn-outline-info btn-sm btn-block');
      break;
    case 'button_login':
	// Login
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-user', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_login_newsletter':
	// Newsletteranmeldung
			$buttons = array('Text' => '', 'icon' => 'fa fa-share-square fa-lg', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_login_small':
	// Box Login
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-user', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm float-right');
      break;
    case 'button_print':
	// Nutzerkonto-Bestellhistorie
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-print', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_product_more':
	// Mehrfachnutzung Produktseiten, Bewertungen
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-eye', 'iconposition' => 'left', 'Class' => 'btn btn-info btn-sm');
      break;
    case 'button_quick_find':
	// Box Suche
			$buttons = array('Text' => $alt, 'icon' => '', 'iconposition' => 'left', 'Class' => 'btn btn-outline-primary search_button');
      break;
    case 'button_redeem':
	// Warenkorb-Guthabenkonto
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-asterisk', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm btn-block');
      break;
    case 'button_results':
	// Ergebnisse anzeigen
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-arrow-right', 'iconposition' => 'right', 'Class' => 'btn btn-outline-secondary btn-sm btn-block');
      break;
    case 'button_save':
	// Checkout Bestätigungsseite (Aktualisieren)
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-sync', 'iconposition' => 'left', 'Class' => 'btn btn-outline-dark btn-sm');
      break;
    case 'button_search':
	// Erweiterte Suche
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-search', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_send':
	// Mehrfachnutzung Warenkorb -> Gutschein senden, Kontakt, Newsletteranmeldung
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-check', 'iconposition' => 'left', 'Class' => 'btn btn-success btn-sm');
      break;
    case 'button_update':
	// Adressbuck
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-sync', 'iconposition' => 'right', 'Class' => 'btn btn-success btn-sm');
      break;
    case 'button_update_cart':
	// Warenkorb -> aktualisieren
			$buttons = array('Text' => '', 'icon' => 'fa fa-sync', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_view':
	// Produktdetailseiten -> Downloads
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-eye-open', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_write_review':
	// Bewertung
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-edit', 'iconposition' => 'left', 'Class' => 'btn btn-info btn-sm');
      break;
    case 'cart_del':
	// Mehrfachnutzung Merkzettel, Warenkorb, Box Warenkorb
			$buttons = array('Text' => '', 'icon' => 'fa fa-trash', 'iconposition' => 'left', 'Class' => 'btn btn-danger btn-sm');
      break;
    case 'icon_cart':
	// Box Bestellhistorie
			$buttons = array('Text' => '', 'icon' => 'fa fa-shopping-cart', 'iconposition' => 'left', 'Class' => 'btn btn-success btn-sm h-100');
      break;
    case 'print':
	// Mehrfachnutzung Nutzerkonto-Bestellhistorie, Checkout 'fertig', Produktinfoseiten
			$buttons = array('Text' => TEXT_PRINT, 'icon' => 'fa fa-print', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'small_cart':
	// Mehrfachnutzung Nutzerkonto, Nutzerkonto-Bestellhistorie
			$buttons = array('Text' => '', 'icon' => 'fa fa-shopping-cart', 'iconposition' => 'left', 'Class' => 'btn btn-incart btn-secondary btn-sm');
      break;
    case 'small_delete':
	// Mehrfachnutzung Adressbuch, Payone
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-times', 'iconposition' => 'right', 'Class' => 'btn btn-danger btn-sm');
      break;
    case 'small_edit':
	// Adressbuch
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-edit', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'small_express':
	// Mehrfachnutzung Nutzerkonto, Nutzerkonto-Bestellhistorie
			$buttons = array('Text' => '', 'icon' => 'fa fa-cart-plus', 'iconposition' => 'left', 'Class' => 'btn btn-express btn-outline-secondary btn-sm');
      break;
    case 'small_view':
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-eye-open', 'iconposition' => 'right', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'wishlist_del':
	// Merkzettel
			$buttons = array('Text' => '', 'icon' => 'fa fa-trash', 'iconposition' => 'left', 'Class' => 'btn btn-danger btn-sm');
      break;
    case 'small_continue':
	// Checkout (Adresse aktualisieren)
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-check-square', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');
      break;

	// BS4 Button
    case 'account_adressbook':
	// Nutzerkonto
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-address-book', 'iconposition' => 'left', 'Class' => 'btn btn-sm btn-info btn-block');
      break;
    case 'account_delete':
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-user-minus', 'iconposition' => 'left', 'Class' => 'btn btn-sm btn-danger btn-block');
      break;
    case 'account_edit':
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-edit', 'iconposition' => 'left', 'Class' => 'btn btn-sm btn-outline-secondary btn-block');
      break;
    case 'account_express':
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-cart-plus', 'iconposition' => 'left', 'Class' => 'btn btn-sm btn-primary btn-block');
      break;
    case 'account_login':
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-user', 'iconposition' => 'left', 'Class' => 'btn btn-sm btn-secondary');
      break;
    case 'account_newsletter':
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-envelope', 'iconposition' => 'left', 'Class' => 'btn btn-sm btn-info btn-block');
      break;
    case 'account_password':
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-lock', 'iconposition' => 'left', 'Class' => 'btn btn-sm btn-warning btn-block');
      break;
    case 'box_cart':
	// Mehrfachnutzung Box Warenkorb, Box Merkzettel
			$buttons = array('Text' => $alt.'&nbsp;&raquo;', 'icon' => '', 'iconposition' => 'left', 'Class' => 'btn btn-outline-primary btn-sm');
      break;
    case 'button_carousel1':
	// Mehrfachnutzung Slider Topartikel, Slider Bestseller
			$buttons = array('Text' => '', 'icon' => 'fa fa-chevron-left', 'iconposition' => 'left', 'Class' => 'btn btn-outline-primary mx-1');
      break;
    case 'button_carousel2':
			$buttons = array('Text' => '', 'icon' => 'fa fa-chevron-right', 'iconposition' => 'left', 'Class' => 'btn btn-outline-primary mx-1');
      break;
    case 'button_cheaply_see':
	// Button Billiger gesehen
			$buttons = array('Text' => $alt, 'icon' => 'far fa-envelope', 'iconposition' => 'left', 'Class' => 'btn btn-xs btn-info btn-block');
      break;
    case 'button_customers_remind':
	// Button Kundenerinnerung bei Wiederverfügbarkeit
			$buttons = array('Text' => $alt, 'icon' => 'far fa-bell', 'iconposition' => 'left', 'Class' => 'btn btn-sm btn-secondary btn-block');
      break;
    case 'button_easyzoom':
	// Button Easyzoom Produktdetailseiten
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-search-plus', 'iconposition' => 'right', 'Class' => 'btn btn-info btn-sm');
      break;
    case 'button_product_inquiry':
	// Button Frage zum Artikel
			$buttons = array('Text' => $alt, 'icon' => 'far fa-envelope', 'iconposition' => 'left', 'Class' => 'btn btn-xs btn-info btn-block');
      break;
    case 'button_wishlist_now':
	// Mehrfachnutzung Box Bestsellers, alle Produktlisten, Neue Artikel, Warenkorb -> Produkte
			$buttons = array('Text' => '', 'icon' => 'fa fa-heart', 'iconposition' => 'left', 'Class' => 'btn btn-wish btn-outline-info btn-sm');
      break;
    case 'button_write_review':
	// Mehrfachnutzung Bewertungen, Produktdetailseiten
			$buttons = array('Text' => $products_review_link, 'icon' => 'fa fa-edit', 'iconposition' => 'left', 'Class' => 'btn btn-info btn-xs btn-block');
      break;
    case 'create_account':
	// Warenkorb Gutscheine
			$buttons = array('Text' => $alt, 'icon' => '', 'iconposition' => 'right', 'Class' => 'btn btn-secondary btn-sm btn-block');
      break;
    case 'express_content':
	// alle Produktdetailseiten
			$buttons = array('Text' => TEXT_CHECKOUT_EXPRESS_INFO_LINK, 'icon' => 'fa fa-info-circle', 'iconposition' => 'left', 'Class' => 'btn btn-info btn-xs btn-block');
      break;
    case 'express_dropdown':
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-info-circle', 'iconposition' => 'left', 'Class' => 'btn btn-info btn-xs btn-block dropdown-toggle');
      break;
    case 'express_link':
			$buttons = array('Text' => $alt, 'icon' => '', 'iconposition' => 'left', 'Class' => 'btn btn-info btn-xs btn-block');
      break;
    case 'gift_cart':
	// Warenkorb Gutschein senden
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-share-square', 'iconposition' => 'left', 'Class' => 'btn btn-info btn-sm');
      break;
    case 'gift_link':
	// Warenkorb Link zum Gutschein
			$buttons = array('Text' => IMAGE_REDEEM_GIFT, 'icon' => 'fa fa-asterisk', 'iconposition' => 'left', 'Class' => 'btn btn-outline-secondary btn-block');
      break;
    case 'go2top':
	// Button go2top auf allen Seiten rechts unten
			$buttons = array('Text' => '', 'icon' => 'fa fa-chevron-up', 'iconposition' => 'left', 'Class' => 'btn btn-secondary');
      break;
    case 'modal_close':
	// Button 'Schließen' in der Modal-Popup-Box
			$buttons = array('Text' => $alt, 'icon' => '', 'iconposition' => 'left', 'Class' => 'btn btn-dark btn-sm');
      break;
    case 'order_history':
	// Box Bestellhistorie
			$buttons = array('Text' => $alt, 'icon' => '', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm w-100" style="white-space:normal;');
      break;
    case 'print_product':
	// alle Produktdetailseiten
			$buttons = array('Text' => $printview_info, 'icon' => 'fa fa-print', 'iconposition' => 'left', 'Class' => 'btn btn-info btn-xs btn-block');
      break;
    case 'print_product_small':
			$buttons = array('Text' => '', 'icon' => 'fa fa-print', 'iconposition' => 'left', 'Class' => 'btn btn-outline-info btn-sm');
      break;
    case 'responsive_back':
	// Responsivmenü
			$buttons = array('Text' => '', 'icon' => 'fa fa-chevron-left', 'iconposition' => 'left',		'Class' => 'btn btn-light');
      break;
    case 'responsive_home':
			$buttons = array('Text' => '', 'icon' => 'fa fa-home', 'iconposition' => 'left', 'Class' => 'btn btn-light');
      break;

    case 'button_in_requestlist':
	// Erweiterung Anfrageliste
			$buttons = array('Text' => $alt, 'icon' => 'fa fa-question-circle', 'iconposition' => 'left', 'Class' => 'btn btn-request btn-secondary btn-sm btn-block');
      break;
    case 'button_requestlist':
			$buttons = array('Text' => '', 'icon' => 'fa fa-question-circle', 'iconposition' => 'left', 'Class' => 'btn btn-outline-info btn-sm');
      break;
    case 'requestlist_del':
			$buttons = array('Text' => '', 'icon' => 'fa fa-trash', 'iconposition' => 'left', 'Class' => 'btn btn-danger btn-sm');
      break;

		// default
		default:
			$buttons = array('Text' => $alt, 'icon' => '', 'iconposition' => 'left', 'Class' => 'btn btn-secondary btn-sm');

	}

    // kein Submitbutton
    if ($submit === false)
    {
        $html .= '<span';
        if ($buttons['Class']) {
        	$html .= ' class="'.$buttons['Class'].'"';
        }
        if (xtc_not_null($parameters)) {
			$html .= ' '.$parameters.'>';
        } else {
			$html .= '>';
        }
		if  ($buttons['iconposition'] == 'left' && $buttons['icon'] != '') {
			$html .= '<span class="'.$buttons['icon'].'"></span>';
            if  ($buttons['Text'] != '') {
				$html .= '<span>&nbsp;&nbsp;'.$buttons['Text'].'</span>';
			}
		}
		elseif ($buttons['iconposition'] == 'right' && $buttons['icon'] != '') {
            if  ($buttons['Text'] != '') {
				$html .= '<span>'.$buttons['Text'].'&nbsp;&nbsp;</span>';
			}
			$html .= '<span class="'.$buttons['icon'].'"></span>';
		}
		else {
			$html .= $buttons['Text'];
		}
        $html .= '</span>';
    }
    else
    { // wenn Submitbutton
		$html .= '<button';
		if ($buttons['Class']) {
			$html .= ' class="'.$buttons['Class'].'"';
		}
        if (xtc_not_null($parameters)) {
			$html .= ' '.$parameters;
        }
		if ($submit <> true) {
			$html .= ' name="'.$submit.'"';
		}
		if ($submit == true || $submit == "submit"){
			$html .= ' type="submit"';
		}
		$html .= ' title="'.$title.'">';
		if  ($buttons['iconposition'] == 'left' && $buttons['icon'] != '') {
			$html .= '<span class="'.$buttons['icon'].'"></span>';
            if  ($buttons['Text'] != '') {
				$html .= '<span>&nbsp;&nbsp;'.$buttons['Text'].'</span>';
			}
		}
		elseif ($buttons['iconposition'] == 'right' && $buttons['icon'] != '') {
            if  ($buttons['Text'] != '') {
				$html .= '<span>'.$buttons['Text'].'&nbsp;&nbsp;</span>';
			}
			$html .= '<span class="'.$buttons['icon'].'"></span>';
		}
		else {
			$html .= $buttons['Text'];
		}
		$html .= '</button>';
	}
	return $html;

}

?>
