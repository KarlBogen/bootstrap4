<?php
/* ------------------------------------------------------------
	Module "Kundenerinnerung_modified-shop-2.0.3.0" made by Karl

	Based on: Kundenerinnerung_Multilingual_advanced_modified-shop-1.06
	Based on: xt-module.de customers remind
	erste Anpassung von: Fishnet Services - Gemsjäger 30.03.2012
	Zusatzfunktionen eingefügt sowie Fehler beseitigt von Ralph_84
	Aufgearbeitet für die Modified 1.06 rev4356 von Ralph_84

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

require('includes/application_top.php');

	if(isset($_POST['del_user'])){
		$usid = $_POST['del_user'];
		xtc_db_query("DELETE FROM ".TABLE_BS4_CUSTOMERS_REMIND." WHERE remind_id ='".$usid."';");
	}

	if (!isset($_GET['sorting'])){
		$_GET['sorting']='remind_date_added-desc';
	}

	if ($_GET['sorting']) {
		switch ($_GET['sorting']) {
				// EOF - Tomcraft - 2009-10-22 - fixed sorting, replaced ASC with DESC
				case 'customers_lastname' :
					$sort = 'order by customers_lastname';
					break;
				case 'customers_lastname-desc' :
					$sort = 'order by customers_lastname DESC';
					break;
				case 'customers_email' :
					$sort = 'order by customers_email_address';
					break;
				case 'customers_email-desc' :
					$sort = 'order by customers_email_address DESC';
					break;
				case 'products_ean' :
					$sort = 'order by products_name';
					break;
				case 'products_ean-desc' :
					$sort = 'order by products_name DESC';
					break;
				case 'products_name' :
					$sort = 'order by products_name';
					break;
				case 'products_name-desc' :
					$sort = 'order by products_name DESC';
					break;
				case 'products_model' :
					$sort = 'order by products_model';
					break;
				case 'products_model-desc' :
					$sort = 'order by products_model DESC';
					break;
				case 'remind_date_added' :
					$sort = 'order by remind_date_added';
					break;
				case 'remind_date_added-desc' :
					$sort = 'order by remind_date_added DESC';
					break;
				case 'customers_st' :
					$sort = 'order by customers_st';
					break;
				case 'customers_st-desc' :
					$sort = 'order by customers_st DESC';
					break;
		}
	}

	if( defined('USE_ADMIN_THUMBS_IN_LIST_STYLE')) {
		$admin_thumbs_size = 'style="'.USE_ADMIN_THUMBS_IN_LIST_STYLE.'"';
	} else {
		$admin_thumbs_size = 'style="max-width: 40px; max-height: 40px;"';
	}

require (DIR_WS_INCLUDES.'head.php');
?>
</head>
<body>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<!-- body //-->
	<table class="tableBody">
		<tr>
			<?php //left_navigation
				if (USE_ADMIN_TOP_MENU == 'false') {
					echo '<td class="columnLeft2">'.PHP_EOL;
					echo '<!-- left_navigation //-->'.PHP_EOL;
					require_once(DIR_WS_INCLUDES . 'column_left.php');
					echo '<!-- left_navigation eof //-->'.PHP_EOL;
					echo '</td>'.PHP_EOL;
				}
			?>
			<!-- body_text //-->
			<td class="boxCenter">
				<div class="pageHeadingImage"><?php echo xtc_image(DIR_WS_ICONS.'heading/icon_news.png', BS4_BOX_CUSTOMERS_REMIND); ?></div>
				<div class="pageHeading flt-l"><?php echo HEADING_TITLE; ?></div>
				<table class="tableCenter">
					<tr>
					<?php
					if (defined('BS4_CUSTOMERS_REMIND') && BS4_CUSTOMERS_REMIND != 'true') {
					?>
						<td class="boxCenterFull"><?php echo TEXT_MODULES_NOT_ACTIVATED; ?></td>
					<?php
					} else {
					?>
						<td class="boxCenterFull">
							<table class="tableBoxCenter collapse">
								<tr class="dataTableHeadingRow">
									<td class="dataTableHeadingContent" style="width:12%"><?php echo TABLE_HEADING_CUSTOMER.xtc_sorting(FILENAME_BS4_CUSTOMERS_REMIND,'customers_lastname'); ?></td>
									<td class="dataTableHeadingContent" style="width:12%"><?php echo TABLE_HEADING_CUSTOMER_MAIL.xtc_sorting(FILENAME_BS4_CUSTOMERS_REMIND,'customers_email'); ?></td>
									<td class="dataTableHeadingContent" style="width:5%"><?php echo TABLE_HEADING_PRODUCT_BILD; ?></td>
									<td class="dataTableHeadingContent txta-c" style="width:5%"><?php echo TABLE_HEADING_PRODUCT_ST.xtc_sorting(FILENAME_BS4_CUSTOMERS_REMIND,'customers_st'); ?></td>
									<td class="dataTableHeadingContent"><?php echo TABLE_HEADING_PRODUCT.xtc_sorting(FILENAME_BS4_CUSTOMERS_REMIND,'products_name'); ?></td>
									<td class="dataTableHeadingContent" style="width:10%"><?php echo TABLE_HEADING_PRODUCT_DAT.xtc_sorting(FILENAME_BS4_CUSTOMERS_REMIND,'products_model'); ?></td>
									<td class="dataTableHeadingContent txta-c" style="width:10%"><?php echo TABLE_HEADING_PRODUCT_MODEL.xtc_sorting(FILENAME_BS4_CUSTOMERS_REMIND,'products_ean'); ?></td>
									<td class="dataTableHeadingContent" style="width:5%"><?php echo TABLE_HEADING_DATE_ADDED.xtc_sorting(FILENAME_BS4_CUSTOMERS_REMIND,'remind_date_added') ?></td>
									<td class="dataTableHeadingContent" style="width:20%"><?php echo TABLE_HEADING_PRODUCT_CUPO; ?></td>
									<td class="dataTableHeadingContent" style="width:5%"><?php echo TABLE_HEADING_REMOVE_REMINDER; ?></td>
								</tr>
								<?php
								$customers_remind_query = xtc_db_query("select * from ".TABLE_BS4_CUSTOMERS_REMIND." ".$sort);
								while ($customers_remind = xtc_db_fetch_array($customers_remind_query)) {
									if ( (isset($pInfo)) && (is_object($pInfo)) && ($customers_remind['remind_id'] == $pInfo->remind_id) ) {
										echo '<tr class="dataTableRowSelected" onmouseover="this.style.cursor=\'hand\'" >' . "\n";
									} else {
										echo '<tr class="dataTableRow" onmouseover="this.className=\'dataTableRowOver\';this.style.cursor=\'hand\'" onmouseout="this.className=\'dataTableRow\'" >' . "\n";
									}
								?>
									<td class="dataTableContent">
										<?php if($customers_remind['customers_id'] == '0') {
											echo $customers_remind['customers_firstname']." ".$customers_remind['customers_lastname'];
										} else {
											echo $customers_remind['customers_firstname']." ".$customers_remind['customers_lastname']." [".$customers_remind['customers_id']."]";
										} ?>
										&nbsp;
									</td>
									<td class="dataTableContent"><?php echo $customers_remind['customers_email_address']; ?>&nbsp;</td>
									<td class="dataTableContent txta-c">
										<div class="product_bild"><?php echo xtc_product_thumb_image($customers_remind['products_image'], $customers_remind['products_name'], '','',$admin_thumbs_size); ?></div>
									</td>
									<td class="dataTableContent txta-c"><?php echo $customers_remind['customers_st']; ?>&nbsp;</td>
									<td class="dataTableContent txta-l"><?php echo $customers_remind['products_name']; ?></td>
									<td class="dataTableContent txta-l"><?php echo '<a href="' . xtc_href_link(FILENAME_CATEGORIES . '?pID=' . $customers_remind['products_id'] ) . '&action=new_product' . '" style="float:left;">' . xtc_image(DIR_WS_ICONS . 'icon_edit.gif', ICON_EDIT) . '</a>'; ?>&nbsp;
										<?php
											if($customers_remind['products_model'] != '') {
												echo $customers_remind['products_model'];
											} else {
												echo '&nbsp;';
											}
										?>
									</td>
									<td class="dataTableContent txta-c">
										<?php
											if($customers_remind['products_ean'] != '') {
												echo $customers_remind['products_ean'];
											} else {
												echo '&nbsp;';
											}
										?>
									</td>
									<td class="dataTableContent txta-l"><?php echo date('d.m.Y H:i:s', strtotime($customers_remind['remind_date_added'])); ?></td>
									<td class="dataTableContent txta-l">
										<?php
											echo '<a class="button" href="'.xtc_href_link(FILENAME_MAIL .'?selected_box=tools&action=email&customer='. $customers_remind['customers_email_address']).'" style="float:left; height:10px; line-height:10px; margin:0px 2px;" >'.BUTTON_EMAIL.'</a>';
											if (ACTIVATE_GIFT_SYSTEM == 'true') {
												echo '<a class="button" href="'.xtc_href_link(FILENAME_GV_MAIL .'?action=email&selected_box=tools&cID='. $customers_remind['customers_id']).'" style="float:left; height:10px; line-height:10px; margin:0px 2px;" >'.BUTTON_SEND_GIFT.'</a>';
											}
										?>
									</td>
									<td class="dataTableContent txta-c">
										<?php echo (xtc_draw_form('del_users', FILENAME_BS4_CUSTOMERS_REMIND)); ?>
											<input type="hidden" name="del_user" value="<?php echo $customers_remind["remind_id"]?> " />
											<input style="border:none;" type="image" src="images/icons/cross.gif" alt="<?php echo TABLE_HEADING_DEL; ?>" title="<?php echo TABLE_HEADING_DEL; ?>">
										</form>
									</td>
								</tr>
								<?php
								}
								?>
							</table>
							<table>
								<tr>
									<td class="smallText txta-l"><?php echo KD_REG; ?></td>
								</tr>
								<tr>
									<td class="txta-r">&nbsp;</td>
								</tr>
								<tr>
									<td class="smallText txta-l"><?php echo FOOTER_INFO; ?></td>
								</tr>
							</table>
						</td>
					<?php
					}
					?>
					</tr>
				</table>
			</td>
<!-- body_text_eof //-->
		</tr>
	</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
	<br />
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>