<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

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

// alternativ nur von Admins ausführen ( bei stark frequentierten Shops und regelmäßigen Adminlogins )
$only_admin = 0;

if (($only_admin && $_SESSION['customers_status']['customers_status_id'] == 0) || !$only_admin) {
  sendremindmails();
}

function sendremindmails() {

        $objSmarty= new Smarty();
        $objSmarty->assign('tpl_path','templates/'.CURRENT_TEMPLATE.'/');
        $objSmarty->assign('logo_path',HTTP_SERVER.DIR_WS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/img/');
        $objSmarty->assign('STORE_NAME',STORE_NAME);

        $objSmarty->caching = false;

        $strstockQuery = "
                          SELECT cr.remind_id,
                                 cr.customers_gender,
                                 cr.customers_id,
                                 cr.customers_email_address,
                                 cr.customers_firstname,
                                 cr.customers_lastname,
                                 cr.customers_language,
                                 cr.customers_st,
                                 cr.products_image,
                                 cr.products_id,
                                 p.products_quantity,
                                 p.products_model,
                                 p.products_image,
                                 cr.mail_head1,
                                 cr.products_name,
                                 cr.remind_date_added
                            FROM ".TABLE_BS4_CUSTOMERS_REMIND." cr
                            JOIN ".TABLE_LANGUAGES." l
                                 ON l.directory = cr.customers_language
                            JOIN ".TABLE_PRODUCTS." p
                                 ON p.products_id = cr.products_id
                                    AND p.products_quantity >= cr.customers_st
                            JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd
                                 ON p.products_id = pd.products_id
                                    AND pd.language_id = l.languages_id
                           ";

        $resstockQuery = xtc_db_query($strstockQuery);

        while($arrstock = xtc_db_fetch_array($resstockQuery)) {

                $objSmarty->assign('PRODUCTS_NAME', $arrstock['products_name']);
                $objSmarty->assign('PRODUCTS_MODEL', $arrstock['products_model']);
                $objSmarty->assign('CUSTOMERS_GENDER', $arrstock['customers_gender']);
                $objSmarty->assign('CUSTOMERS_FIRSTNAME', $arrstock['customers_firstname']);
                $objSmarty->assign('CUSTOMERS_LASTNAME', $arrstock['customers_lastname']);
                $objSmarty->assign('MAIL_HEAD1', $arrstock['mail_head1']);
                $objSmarty->assign('CUSTOMERS_LANGUAGE', $arrstock['customers_language']);
                $objSmarty->assign('CUSTOMERS_PRODUCTS_IMAGE', $arrstock['products_image']);

                $link = HTTP_SERVER.DIR_WS_CATALOG.FILENAME_PRODUCT_INFO."?products_id=".$arrstock['products_id'];

                $objSmarty->assign('LINK', $link);

                $objSmarty->assign('logo_path', HTTP_SERVER.DIR_WS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/img/');
                $objSmarty->assign('img_path', HTTP_SERVER.DIR_WS_CATALOG.DIR_WS_THUMBNAIL_IMAGES.$arrstock['products_image']);

                $html_mail = $objSmarty->fetch(CURRENT_TEMPLATE."/mail/".$arrstock['customers_language']."/remind_mail.html");
                $txt_mail = $objSmarty->fetch(CURRENT_TEMPLATE."/mail/".$arrstock['customers_language']."/remind_mail.txt");

                $strValidateQuery = "
                        SELECT
                                remind_id
                        FROM
                                ".TABLE_BS4_CUSTOMERS_REMIND."
                        WHERE
                                remind_id = '".$arrstock['remind_id']."'
                        AND
                                customers_id = '".$arrstock['customers_id']."'
                ";

                $strMarkQuery = "
                        DELETE FROM
                                ".TABLE_BS4_CUSTOMERS_REMIND."
                        WHERE
                                remind_id = '".$arrstock['remind_id']."'
                        AND
                                customers_id = '".$arrstock['customers_id']."'
                ";

                if(xtc_db_num_rows(xtc_db_query($strValidateQuery)) == 1) {

                        xtc_db_query($strMarkQuery);

                        xtc_php_mail(
                                EMAIL_SUPPORT_ADDRESS, EMAIL_SUPPORT_NAME, // from
                                $arrstock['customers_email_address'], '', // to
                                '', // bcc
                                EMAIL_SUPPORT_REPLY_ADDRESS, EMAIL_SUPPORT_REPLY_ADDRESS_NAME, // reply-to
                                '', '', // attachments
                                sprintf(''.$arrstock['mail_head1'].'', STORE_NAME), // subject
                                $html_mail, // HTML content
                                $txt_mail // text-only content
                        );
                }
        }
        return;
}
?>