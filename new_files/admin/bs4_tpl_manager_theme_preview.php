<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

	if (isset($_GET["language"])) $lang = $_GET["language"];
	if (isset($_GET["bs4_tpl"])) $bs4_tpl = $_GET["bs4_tpl"];
	$css_path = $bs4_tpl.'/css/';
	$js_path = $bs4_tpl.'/javascript/';
	$css_file = 'includes/bs4_template_manager/css/bootstrap.min.css';
	if (file_exists($css_file))	$time = filemtime($css_file);

?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv=”Pragma” content=”no-cache”>
	<meta http-equiv=”Expires” content=”0″>
	<meta http-equiv=”CACHE-CONTROL” content=”no-cache”>

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $css_path; ?>admindemo/bootstrap.min.css<?php echo '?'.$time; ?>" rel="stylesheet">
    <link href="<?php echo $css_path; ?>fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo $css_path; ?>regular.min.css" rel="stylesheet">
    <link href="<?php echo $css_path; ?>solid.min.css" rel="stylesheet">
    <link href="<?php echo $css_path; ?>bs4.css<?php echo '?'.$time; ?>" rel="stylesheet">
    <link href="<?php echo $css_path; ?>navbar.css<?php echo '?'.$time; ?>" rel="stylesheet">

<style>
body{
	overflow-x:hidden;
}
/* Superfishmenü */
#main.navbar-nav > li.kk-mega {
	position: static;
}
.dropdown-menu.kk-mega ul {
	display:inherit;
	list-style: outside none none;
	padding: 0;
}
.kk-mega > li > a:hover {
	text-decoration: none;
}
ul.dropdown-menu.kk-mega {
	left: -2px !important;
	padding: 8px;
	right: -2px !important;
	width: auto;
}
li.kk-mega.level2 {
	margin-bottom: 30px;
}
li.kk-mega.level2 > a {
	font-weight: bold;
}
.kk-mega > li > a {
    clear: both;
    display: block;
    font-weight: 400;
    line-height: 1.42857;
    padding: 3px 20px;
    white-space: nowrap;
}
.kk-mega > li {
    list-style: outside none none;
}
#main li.dropdown ul.dropdown-menu.kk-mega{
    display: -webkit-flex; /* Safari */
    -webkit-flex-wrap: wrap; /* Safari 6.1+ */
	display:flex;
	flex-wrap: wrap;
	top:auto;
	opacity:0;
	visibility:hidden;
	-webkit-transition: all .5s ease-in-out;
	-moz-transition: all .5s ease-in-out;
	-o-transition: all .5s ease-in-out;
	-ms-transition: all 5.s ease-in-out;
	transition: all .5s ease-in-out;
}
#main li.dropdown:hover ul.dropdown-menu.kk-mega{
	opacity:1;
	visibility:visible;
	-webkit-transition: all .5s ease-in-out;
	-moz-transition: all .5s ease-in-out;
	-o-transition: all .5s ease-in-out;
	-ms-transition: all 5.s ease-in-out;
	transition: all .5s ease-in-out;
}
li.kk-mega.level3 >a:before {
   content: "\203A\00a0";
}
li.kk-mega.level4 >a:before {
   content: "\203A\203A\00a0";
}
li.kk-mega.level5 >a:before {
   content: "\203A\203A\203A\00a0";
}
/* Ende Superfish */
</style>
</head>
<body>
<?php
	if ($lang == 'de') {
?>
<div id="container" class="default">
	<div id="top1" class="config top navbar navbar-expand clearfix">
		<div class="navbar-nav nav-justified w-100">
       		<div class="nav-item navbar-text text-nowrap mx-2"><span class="fa fa-user-friends fa-lg" aria-hidden="true"></span>&nbsp;&nbsp;Beratung +49 00 00 / 00 00 00</div>
			<div class="nav-item navbar-text text-nowrap mx-2 d-none d-sm-block"><span class="fa fa-shipping-fast fa-lg" aria-hidden="true"></span>&nbsp;&nbsp;Schnelle Lieferung</div>
			<div class="nav-item navbar-text text-nowrap mx-2 d-none d-md-block"><span class="fa fa-truck fa-lg" aria-hidden="true"></span>&nbsp;&nbsp;Kostenloser Versand - ab 50€</div>
			<div class="nav-item navbar-text text-nowrap mx-2 d-none d-lg-block"><span class="fa fa-undo fa-lg fa-rotate-90" aria-hidden="true"></span>&nbsp;&nbsp;30 Tage Rückgaberecht</div>
		</div>
	</div>
	<div id="main_container1" class="mt-2 px-2">
		<div class="row text-center text-md-left mb-3">
			<a class="col-12 col-md-4" href="#" title="Startseite &bull; Modified2"><img src="includes/bs4_template_manager/assets/img/logo_head.png" class="img-fluid" alt="Modified2" /></a>
			<ul class="logobar nav col-12 col-md-8 mt-3 justify-content-end">
				<li class="nav-item home"><a class="nav-link" title="Startseite" href="#"><span class="fa fa-home fa-lg"></span></a></li>
				<li class="nav-item language"><a id="lang-dd" href="#" class="nav-link" title="Sprachen" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-globe fa-lg fa-fw" aria-hidden="true"></span></a></li>
				<li class="nav-item account"><a id="account-dd" href="#" class="nav-link"  title="Mein Konto" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user fa-lg fa-fw" aria-hidden="true"></span></a></li>
				<li class="nav-item wishlist"><a id="toggle_wishlist" class="nav-link" href="#" title="Merkzettel"><span class="fa fa-heart fa-lg fa-fw" aria-hidden="true"></span></a></li>
				<li class="nav-item cart"><a id="toggle_cart" class="nav-link" href="#" title="Warenkorb"><span class="fa fa-shopping-cart fa-lg fa-fw" aria-hidden="true"></span></a></li>
				<li class="nav-item search"><a id="search-dd" href="#" class="nav-link" title="Suche" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search fa-lg fa-fw" aria-hidden="true"></span></a></li>
			</ul>
		</div>
		<nav id="navbar" class="config top2 navbar navbar-expand rounded mb-3">
			<div class="fullmenu container-fluid">
				<ul id="main" class="283 navbar-nav d-flex flex-wrap mr-auto">
					<li class="nav-item home"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span></a></li>
					<li class="level1 nav-item"><a class="nav-link" title="Kategorie 1" href="#">Kategorie 1</a></li>
					<li class="level1 active parent nav-item dropdown doubletap kk-mega"><a class="active parent nav-link dropdown-toggle" href="#" title="Kategorie 2">Kategorie 2 (aktiver Link)</a>
						<ul class="127 dropdown-menu kk-mega" data-level="2">
							<li id="li127" class="level2 active parent dropdown-submenu doubletap kk-mega" style="width: 33%;"><a id="a127" class="active parent dropdown-item" href="#" title="Unterkategorie 1">Unterkategorie 1 (aktiver Link)</a>
								<ul class="184 kk-mega" data-level="3">
									<li id="li184" class="level3 kk-mega"><a id="a184" class="dropdown-item" href="#" title="Unterkategorie 1.1">Unterkategorie 1.1</a></li>
									<li id="li185" class="level3 kk-mega"><a id="a185" class="dropdown-item" href="#" title="Unterkategorie 1.2">Unterkategorie 1.2</a></li>
									<li id="li186" class="level3 active parent kk-mega"><a id="a186" class="active parent dropdown-item" href="#" title="Unterkategorie 1.3">Unterkategorie 1.3 (aktiver Link)</a></li>
									<li id="li187" class="level3 kk-mega"><a id="a187" class="dropdown-item" href="#" title="Unterkategorie 1.4">Unterkategorie 1.4</a></li>
									<li id="li188" class="level3 kk-mega"><a id="a188" class="dropdown-item" href="#" title="Unterkategorie 1.5">Unterkategorie 1.5</a></li>
								</ul>
							</li>
							<li id="li81" class="level2 dropdown-submenu doubletap kk-mega" style="width: 33%;"><a id="a81" class="dropdown-item" href="#" title="Unterkategorie 2">Unterkategorie 2</a>
								<ul class="6 kk-mega" data-level="3">
									<li id="li6" class="level3 kk-mega"><a id="a6" class="dropdown-item" href="#" title="Unterkategorie 2.1">Unterkategorie 2.1</a></li>
									<li id="li21" class="level3 kk-mega"><a id="a21" class="dropdown-item" href="#" title="Unterkategorie 2.2">Unterkategorie 2.2</a></li>
									<li id="li16" class="level3 kk-mega"><a id="a16" class="dropdown-item" href="#" title="Unterkategorie 2.3">Unterkategorie 2.3</a></li>
									<li id="li7" class="level3 kk-mega"><a id="a7" class="dropdown-item" href="#" title="Unterkategorie 2.4">Unterkategorie 2.4</a></li>
									<li id="li12" class="level3 kk-mega"><a id="a12" class="dropdown-item" href="#" title="Unterkategorie 2.5">Unterkategorie 2.5</a></li>
									<li id="li14" class="level3 kk-mega"><a id="a14" class="dropdown-item" href="#" title="Unterkategorie 2.6">Unterkategorie 2.6</a></li>
								</ul>
							</li>
							<li id="li236" class="level2 dropdown-submenu doubletap kk-mega" style="width: 33%;"><a id="a236" class="dropdown-item" href="#" title="Unterkategorie 3">Unterkategorie 3</a>
								<ul class="244 kk-mega" data-level="3">
									<li id="li244" class="level3 kk-mega"><a id="a244" class="dropdown-item" href="#" title="Unterkategorie 3.1">Unterkategorie 3.1</a></li>
									<li id="li237" class="level3 kk-mega"><a id="a237" class="dropdown-item" href="#" title="Unterkategorie 3.2">Unterkategorie 3.2</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="level1 nav-item"><a class="nav-link" title="Kategorie 3" href="#">Kategorie 3</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<div id="main_container2" class="mb-2 px-2">
		<div id="content" class="row">
			<div id="col_right" class="col-12">
					<nav id="breadcrumb" class="breadcrumb"><span class="breadcrumb_info">Breadcrump-Beispiel:&nbsp;&nbsp;&nbsp;</span>
						<a href="#" class="headerNavigation"><span >Startseite</span></a>&nbsp;&raquo;&nbsp;
						<a href="#" class="headerNavigation"><span >Katalog</span></a>&nbsp;&raquo;&nbsp;
						<a href="#" class="headerNavigation"><span >Kategorie 2</span></a>&nbsp;&raquo;&nbsp;
						<span ><span class="current">Unterkategorie 1</span></span>
					</nav>
					<div class="homesite">
					<h1 class="card p-2 bg-h">Willkommen - Beispiel Card als &Uuml;berschrift</h1>
					<div class="clearfix mb-4">
						Herzlich willkommen <span class="greetUser">Gast!</span> M&ouml;chten Sie sich <a href="#">anmelden</a>? Oder wollen Sie ein <a href="#">Kundenkonto</a> er&ouml;ffnen?<br /><br />Sollten Sie daran interessiert sein das Programm, welches die Grundlage f&uuml;r diesen Shop bildet, einzusetzen, so besuchen Sie bitte die Webseite der <a href="#" rel="nofollow noopener" ><u><strong><span style="color:#B0347E;">mod</span><span style="color:#6D6D6D;">ified eCommerce Shopsoftware</span></strong></u></a>.<br /><br />Der hier dargestellte Text kann im Adminbereich unter <b>Content Manager</b> - Eintrag Index bearbeitet werden.
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-6 mb-2">
						<div class="box_category card mb-4">
		    				<div class="box_category_header card-header">Kategorien Card-Header</div>
							<ul id="categorymenu" class="nav nav-pills flex-column">
								<li class="nav-item level1"><a  class="nav-link" href="#" title="Kategorie 1">Kategorie 1</a></li>
								<li class="nav-item active"><a  class="nav-link active dropdown-toggle" href="#" title="Kategorie 2">Kategorie 2</a>
									<ul class="nav flex-column card border-0 m-1">
										<li class="nav-item level4"><a class="nav-link" title="Unterkategorie 1" href="#">› Unterkategorie 1</a></li>
										<li class="nav-item level4"><a class="nav-link" title="Unterkategorie 2" href="#">› Unterkategorie 2</a></li>
										<li class="nav-item level4"><a class="nav-link" title="Unterkategorie 3" href="#">› Unterkategorie 3</a></li>
									</ul>
								</li>
								<li class="nav-item level1"><a  class="nav-link" href="#" title="Kategorie 3">Kategorie 3</a></li>
			                </ul>
						</div>
						<div class="box_login card mb-4">
							<div class="box_header card-header">Willkommen zur&uuml;ck! Card-Header</div>
							<div class="card-body">
								<div class="form-group">
						        	<label class="small">E-Mail-Adresse:</label>
						    		<input type="email" name="email_address" class="form-control form-control-sm" />
						    	</div>
								<div class="form-group mb-1">
						    		<label class="small">Filter:</label>
									<select class="form-control form-control-sm" name="filter_sort">
										<option selected="selected" value="">Sortieren nach ...</option>
										<option value="1">A bis Z</option>
										<option value="2">Z bis A</option>
										<option value="3">Preis aufsteigend</option>
										<option value="4">Preis absteigend</option>
										<option value="5">Neueste Produkte zuerst</option>
										<option value="6">Älteste Produkte zuerst</option>
										<option value="7">Am meisten verkauft</option>
									</select>
								</div>
						   	</div>
							<div class="card-footer clearfix">
								<div class="d-flex text-left mb-2"><a class="small" href="#">Passwort vergessen?</a></div>
								<button class="btn btn-secondary btn-sm float-right" type="submit" title="Anmelden"><span class="fa fa-user"></span><span class="">&nbsp;&nbsp;Anmelden</span></button>
							</div>
						</div>
					</div>
					<div class="col-6 mb-2">
						<div class="mb-3">
							<button type="button" class="btn btn-primary btn-block my-1" data-toggle="modal" data-target="#modal">Modalbox &ouml;ffnen</button>
							<button type="button" class="btn btn-primary m-1">Primary</button>
							<button type="button" class="btn btn-secondary m-1">Secondary</button>
							<button type="button" class="btn btn-success m-1">Success</button>
							<button type="button" class="btn btn-danger m-1">Danger</button>
							<button type="button" class="btn btn-warning m-1">Warning</button>
							<button type="button" class="btn btn-info m-1">Info</button>
							<button type="button" class="btn btn-light m-1">Light</button>
							<button type="button" class="btn btn-dark m-1">Dark</button>
						</div>
						<div class="card">
							<div class="card-body pb-2">
								<h4>List-Group innerhalb einer Card</h4>
							</div>
							<div class="list-group list-group-flush">
								<div class="list-group-item">
									<span class="float-right">
										<a href="#"><span class="btn btn-express btn-outline-secondary btn-sm"><span class="fa fa-cart-plus"></span></span></a>
										<a href="#"><span class="btn btn-incart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span></span></a>
									</span>
									<strong><a href="#">20.03.2019</a> / Bestell-Nr.: 48</strong><br />
									<strong>Betrag: </strong> 295,00 EUR<br />
									<strong>Status: </strong>Offen<br />
								</div>
								<div class="list-group-item">
									<span class="float-right">
										<a href="#"><span class="btn btn-express btn-outline-secondary btn-sm"><span class="fa fa-cart-plus"></span></span></a>
										<a href="#"><span class="btn btn-incart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span></span></a>
									</span>
									<strong><a href="#">19.03.2019</a> / Bestell-Nr.: 47</strong><br />
									<strong>Betrag: </strong> 27,00 EUR<br />
									<strong>Status: </strong>Offen<br />
								</div>
								<div class="list-group-item">
									<span class="float-right">
										<a href="#"><span class="btn btn-express btn-outline-secondary btn-sm"><span class="fa fa-cart-plus"></span></span></a>
										<a href="#"><span class="btn btn-incart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span></span></a>
									</span>
									<strong><a href="#">14.03.2019</a> / Bestell-Nr.: 46</strong><br />
									<strong>Betrag: </strong> 51,00 EUR<br />
									<strong>Status: </strong>Offen<br />
								</div>
							</div>
							<div class="card-body">
								<p><a href="#">Alle Bestellungen anzeigen</a></p>
							</div>
						</div>
					</div>
				</div>
				<div id="filterBar" class="filter_bar card bg-light mb-2 clearfix">
					<div class="sort_bar form-inline clearfix">
						<div class="form-group m-2">
							<select class="form-control form-control-sm"  name="filter_id"><option value="" selected="selected">Alle Hersteller</option><option value="21">MODIFIED</option></select>
						</div>
						<div class="form-group m-2">
							<select class="form-control form-control-sm"  name="filter_sort"><option value="" selected="selected">Sortieren nach ...</option><option value="1">A bis Z</option><option value="2">Z bis A</option><option value="3">Preis aufsteigend</option><option value="4">Preis absteigend</option><option value="5">Neueste Produkte zuerst</option><option value="6">&Auml;lteste Produkte zuerst</option><option value="7">Am meisten verkauft</option></select>
						</div>
						<div class="form-group m-2">
							<select class="form-control form-control-sm"  name="filter_set"><option value="" selected="selected">Artikel pro Seite</option><option value="3">3 Artikel pro Seite</option><option value="12">12 Artikel pro Seite</option><option value="27">27 Artikel pro Seite</option><option value="999999">Alle Artikel anzeigen</option></select>
						</div>
						<div class="view-buttons ml-auto m-2 d-none d-sm-block">
							<a rel="nofollow" class="view_box btn btn-sm disabled" href="#" title="Boxansicht"><span class="fa fa-th fa-2x"></span></a>&nbsp;&nbsp;
							<a rel="nofollow" class="view_list btn btn-sm" href="#" title="Listenansicht"><span class="fa fa-th-list fa-2x"></span></a>
						</div>
					</div>
				</div>
				<div class="pagination_bar mt-2 clearfix">
					<div class="count float-left mb-2 py-2"><span class="small">Zeige <strong>1</strong> bis <strong>12</strong> (von insgesamt <strong>222</strong> neuen Artikeln)</span></div>
					<ul class="pagination float-right">
						<li class="page-item current active"><a class="page-link">1</a></li>
						<li class="page-item 2"><a href="#" class=" page-link" title="Seite 2">2</a></li>
						<li class="page-item 3"><a href="#" class=" page-link" title="Seite 3">3</a></li>
						<li class="page-item 4"><a href="#" class=" page-link" title="Seite 4">4</a></li>
						<li class="page-item 5"><a href="#" class=" page-link" title="Seite 5">5</a></li>
						<li class="page-item"><a href="#" class=" page-link" title="N&auml;chste 5 Seiten">...</a></li>
						<li class="page-item"><a href="#" class=" page-link" title="n&auml;chste Seite">&raquo;</a></li>
					</ul>
				</div>
				<div class="bsCarousel bs4-carousel">
					<div class="h1 card p-2 bg-h">Bestseller Card-Beispiele</div>
				  	<div class="row clearfix mb-4">
						<div class="listingbox col-sm-6 col-md-4 mb-2">
							<div class="card h-100">
								<a class="card-body pb-2 flex-fill d-flex flex-column text-center" href="#">
						            <div class="ribbon bg-danger text-white shadow-sm">Angebot</div>
						            <div class="lb_image w-100 mb-auto">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/1_0.jpg" alt="Test-Artikel 1" />
									</div>
									<h2 class="lb_title lead text-secondary mt-1 mb-0">
										Test-Artikel 1
									</h2>
								</a>
								<div class="p-1 text-center">
									<div class="lb_buttons mb-2">
										<a href="#"><span class="btn btn-cart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span><span class=""></span></span></a>&nbsp;&nbsp;<a class="btn btn-info btn-sm" href="#"><span class="fa fa-heart"></span></a>&nbsp;&nbsp;<a href="#"><span class="btn btn-info btn-sm"><span class="fa fa-eye"></span><span class="">&nbsp;&nbsp;Details</span></span></a>
									</div>
								</div>
								<div class="card-footer">
									<div class="mt-auto">
										<div class="lb_shipping small">Lieferzeit: <a href="#" title="Information">3-4 Tage</a></div>
										<div class="lb_price text-right mb-1">
											<span class="special_price lead text-danger clearfix">
												<span class="small_price">Sonderpreis</span> 3,90 EUR<br>
												<span class="special_percent bg-danger shadow text-white">31%</span>
											</span>
											<div class="lb_vpe text-secondary small">1,95 EUR pro St.</div>
										</div>
										<div class="lb_tax text-right text-secondary small mb-1">inkl. 19 % MwSt. zzgl. <a href="#" title="Information">Versandkosten</a></div>
									</div>
								</div>
							</div>
						</div>
						<div class="listingbox col-sm-6 col-md-4 mb-2">
							<div class="card h-100">
								<a class="card-body pb-2 flex-fill d-flex flex-column text-center" href="#">
						            <div class="ribbon bg-primary text-white shadow-sm">Top</div>
						            <div class="lb_image w-100 mb-auto">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/2_0.jpg" alt="Test-Artikel 2" />
									</div>
									<h2 class="lb_title lead text-secondary mt-1 mb-0">
										Test-Artikel 2
									</h2>
								</a>
								<div class="p-1 text-center">
									<div class="lb_buttons mb-2">
										<a href="#"><span class="btn btn-cart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span><span class=""></span></span></a>&nbsp;&nbsp;<a class="btn btn-info btn-sm" href="#"><span class="fa fa-heart"></span></a>&nbsp;&nbsp;<a href="#"><span class="btn btn-info btn-sm"><span class="fa fa-eye"></span><span class="">&nbsp;&nbsp;Details</span></span></a>
									</div>
								</div>
								<div class="card-footer">
									<div class="mt-auto">
										<div class="lb_shipping small">Lieferzeit: <a href="#" title="Information">3-4 Tage</a></div>
										<div class="lb_price text-right mb-1"><span class="standard_price lead clearfix">4,50 EUR</span>
											<div class="lb_vpe text-secondary small">2,95 EUR pro St.</div>
										</div>
										<div class="lb_tax text-right text-secondary small mb-1">inkl. 19 % MwSt. zzgl. <a href="#" title="Information">Versandkosten</a></div>
									</div>
								</div>
							</div>
						</div>
						<div class="listingbox col-sm-6 col-md-4 mb-2">
							<div class="card h-100">
								<a class="card-body pb-2 flex-fill d-flex flex-column text-center" href="#">
						            <div class="ribbon bg-success text-white shadow-sm">Neu</div>
						            <div class="lb_image w-100 mb-auto">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/3_0.jpg" alt="Test-Artikel 3" />
									</div>
									<h2 class="lb_title lead text-secondary mt-1 mb-0">
										Test-Artikel 3
									</h2>
								</a>
								<div class="p-1 text-center">
									<div class="lb_buttons mb-2">
										<a href="#"><span class="btn btn-cart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span><span class=""></span></span></a>&nbsp;&nbsp;<a class="btn btn-info btn-sm" href="#"><span class="fa fa-heart"></span></a>&nbsp;&nbsp;<a href="#"><span class="btn btn-info btn-sm"><span class="fa fa-eye"></span><span class="">&nbsp;&nbsp;Details</span></span></a>
									</div>
								</div>
								<div class="card-footer">
									<div class="mt-auto">
										<div class="lb_shipping small">Lieferzeit: <a href="#" title="Information">3-4 Tage</a></div>
										<div class="lb_price text-right mb-1"><span class="standard_price lead clearfix">1,40 EUR</span>
											<div class="lb_vpe text-secondary small">1,40 EUR pro St.</div>
										</div>
										<div class="lb_tax text-right text-secondary small mb-1">inkl. 19 % MwSt. zzgl. <a href="#" title="Information">Versandkosten</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br class="clearfix" />
			</div>
			<div id="col_full" class="col-12">
				<div itemscope itemtype="http://schema.org/Product">
					<h1 class="card p-2 bg-h" itemprop="name">Artikel 1<span class="print-button position-absolute"><a class="iframe" rel="nofollow" href="#" title="Artikeldatenblatt drucken"><span class="btn btn-outline-info btn-sm"><span class="fa fa-print"></span></span></a></span></h1>
					<div id="product_details" class="row clearfix">
						<div class="pd_imagebox col-md-6 mb-4">
							<div class="row mb-4">
								<div class="pd_big_image col-12">
									<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
										<a title="Artikel 1" href="#">
											<img class="img-fluid img-thumbnail" src="includes/bs4_template_manager/assets/img/1_0.jpg" alt="Artikel 1" title="Artikel 1" />
										</a>
									</div>
								</div>
							</div>
							<div class="pd_more_images easy-thumbnails row mb-4 clearfix">
								<div class="col-3">
									<a class="easyimages d-block text-center" href="#" data-standard="#" data-image-id="1" title="Artikel 1" data-title="Artikel 1" data-image="#">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/1_0.jpg" alt="Artikel 1" />
									</a>
								</div>
								<div class="col-3">
									<a class="easyimages d-block text-center" href="#" data-standard="#" data-image-id="2" title="Artikel 1" data-title="Artikel 1" data-image="#">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/2_0.jpg" alt="Artikel 1" />
									</a>
								</div>
								<div class="col-3">
									<a class="easyimages d-block text-center" href="#" data-standard="#" data-image-id="3" title="Artikel 1" data-title="Artikel 1" data-image="#">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/3_0.jpg" alt="Artikel 1" />
									</a>
								</div>
							</div>
							<a class="cbimages easyzoom-link" title="Artikel 1" data-image-id="1" data-toggle="modal" data-title="Artikel 1" data-image="#" data-target="#modal" href="#"><span class="btn btn-info btn-sm"><span>Bild vergr&ouml;&szlig;ern&nbsp;&nbsp;</span><span class="fa fa-search-plus"></span></span></a>
						</div>
						<div class="pd_content col-md-6 mb-4">
							<div class="pd_summarybox" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
								<div class="card bg-light text-right p-2 mb-2">
									<meta itemprop="priceCurrency" content="EUR" />
									<meta itemprop="availability" content="http://schema.org/InStock" />
									<meta itemprop="itemCondition" content="http://schema.org/NewCondition" />
									<div class="pd_price">
										<span class="standard_price lead clearfix">20,00 EUR</span>
						              <meta itemprop="price" content="20" />
									</div>
									<div class="pd_tax text-secondary small">exkl.  MwSt. zzgl. <a rel="nofollow" href="#" title="Information" class="iframe">Versandkosten</a></div>
								</div>
							</div>
							<div class="pd_infobox">
								<div class="card bg-light p-2 mb-2">
									<div class="small"><strong>Lieferzeit:</strong>  <a rel="nofollow" href="#" title="Information" class="iframe">3-4 Tage</a></div>
								</div>
							</div>
							<div class="card bg-light p-2 mb-2">
								<div class="row">
									<div class="col-3 mb-2"><input class="form-control form-control-sm" type="text" name="products_qty" value="1" size="3" /> <input class="form-control form-control-sm" type="hidden" name="products_id" value="1201" /></div>
									<div class="col-9">
										<button class="mb-2 btn btn-cart btn-secondary btn-sm btn-block" type="submit" title="In den Warenkorb"><span class="fa fa-shopping-cart"></span><span>&nbsp;&nbsp;In den Warenkorb</span></button>
										<button class="mb-2 btn btn-express btn-outline-secondary btn-sm btn-block" name="express" type="submit" title="In den Warenkorb"><span class="fa fa-cart-plus"></span><span>&nbsp;&nbsp;Mein Schnellkauf</span></button>
										<button class="btn btn-wish btn-outline-info btn-sm btn-block" name="wishlist" type="submit" title="Auf den Merkzettel"><span class="fa fa-heart"></span><span>&nbsp;&nbsp;Auf den Merkzettel</span></button>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 mb-2"><a class="iframe" rel="nofollow" href="#" title="Artikeldatenblatt drucken"><span class="btn btn-info btn-xs btn-block"><span class="fa fa-print"></span><span>&nbsp;&nbsp;Artikeldatenblatt drucken</span></span></a></div><div class="clearfix"></div>
								<div class="col-sm-6 mb-2"><a rel="nofollow" href="#" title="Rezension schreiben"><span class="btn btn-info btn-xs btn-block"><span class="fa fa-edit"></span><span>&nbsp;&nbsp;Rezension schreiben</span></span></a></div><div class="clearfix"></div>
								<div class="col-sm-6 mb-2"><a href="#" class="iframe"><span class="btn btn-info btn-xs btn-block"><span class="fa fa-info-circle"></span><span>&nbsp;&nbsp;Mein Schnellkauf</span></span></a></div><div class="clearfix"></div>
							</div>
							<br class="clearfix" />
						</div>
						<br class="clearfix" />
					</div>
					<div id="horizontalTab" class="card clearfix mb-3">
						<ul id="bs_tabs" class="nav nav-pills card-header" role="tablist">
							<li class="nav-item"><a class="nav-link active show" href="#prod_desc" role="tab" data-toggle="tab">Details</a></li>
							<li class="nav-item"><a class="nav-link" href="#more_images" role="tab" data-toggle="tab">Mehr Bilder</a></li>
							<li class="nav-item"><a class="nav-link" href="#prod_reviews" role="tab" data-toggle="tab">Rezensionen</a></li>
						</ul>
						<div class="tab-content card-body">
							<div role="tabpanel" class="tab-pane active" id="prod_desc">
								<h4 class="detailbox">Produktbeschreibung</h4>
								<div itemprop="description">Lorem ipsum dolor sit amet consectetuer pretium montes volutpat neque congue. Justo tempus congue Curabitur orci netus neque tempus adipiscing condimentum pulvinar.<br />
				Amet tempus consequat elit a eleifend elit eros condimentum mollis nascetur. Curabitur Sed Nulla Integer Sed Vestibulum ipsum nec nec dictum dolor.</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="more_images">
								<div class="pd_more_images row d-flex flex-wrap mb-2">
									<div class="col-3 d-flex justify-content-center align-items-center">
										<a class="cbimages" title="Artikel 1" href="#" data-image-id="1" data-toggle="modal" data-title="Artikel 1" data-image="#" data-target="#modal">
											<img class="img-fluid d-block" itemprop="image" src="includes/bs4_template_manager/assets/img/1_0.jpg" data-src="#" alt="Artikel 1" />
										</a>
									</div>
									<div class="col-3 d-flex justify-content-center align-items-center">
										<a class="cbimages" title="Artikel 1" href="#" data-image-id="2" data-toggle="modal" data-title="Artikel 1" data-image="#" data-target="#modal">
											<img class="img-fluid d-block" src="includes/bs4_template_manager/assets/img/2_0.jpg" data-src="#" alt="">
										</a>
									</div>
									<div class="col-3 d-flex justify-content-center align-items-center">
										<a class="cbimages" title="Artikel 1" href="#" data-image-id="3" data-toggle="modal" data-title="Artikel 1" data-image="#" data-target="#modal">
											<img class="img-fluid d-block" src="includes/bs4_template_manager/assets/img/3_0.jpg" data-src="#" alt="">
										</a>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="prod_reviews">
								<h4>Kundenrezensionen:</h4>
								<p>Schreiben Sie die erste Kundenrezension!</p>
								<div class="mt-3"><a href="#"><span class="btn btn-info btn-sm"><span class="fa fa-edit"></span><span>&nbsp;&nbsp;Ihre Meinung</span></span></a></div>
								<br class="clearfix" />
							</div>
						</div>
					</div>
					<div class="productnavigator card clearfix">
						<div class="p-2 text-center">
							<p class="small">Artikel&nbsp;<strong>1&nbsp;von&nbsp;5</strong>&nbsp;in dieser Kategorie</p>
							<div class="row">
								<div class="col-2 offset-1">
									<span class="text-secondary"><span class="fa fa-fast-backward"></span><span class="d-none d-md-block">Erster</span></span>
								</div>
								<div class="col-2">
									<span class="text-secondary"><span class="fa fa-backward"></span><span class="d-none d-md-block">vorheriger</span></span>
								</div>
								<div class="col-2">
									<a href="#" title="&Uuml;bersicht"><span class="fa fa-list"></span><span class="d-none d-md-block">&Uuml;bersicht</span></a>
								</div>
								<div class="col-2">
									<a href="#" title="n&auml;chster"><span class="fa fa-forward"></span><span class="d-none d-md-block">n&auml;chster</span></a>
								</div>
								<div class="col-2">
									<a href="#" title="Letzter"><span class="fa fa-fast-forward"></span><span class="d-none d-md-block">Letzter</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="layout_footer" class="config container-fluid py-4">
  		<div class="mb-2">
			<div id="layout_footer_inner" class="row">
				<div class="col-lg-3 col-md-6 mb-2">
					<div class="config box">
						<div class="box-heading w-100 navbar-brand border-bottom mb-2">Mehr &uuml;ber...</div>
						<ul class="navbar-nav flex-column">
							<li class="nav-item level1"><a class="nav-link" href="#" title="Zahlung &amp; Versand"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Zahlung &amp; Versand</a></li>
							<li class="nav-item level1 active activeparent"><a class="nav-link" href="#" title="Privatsphäre und Datenschutz"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Privatsphäre und Datenschutz (aktiver Link)</a></li>
							<li class="nav-item level1"><a class="nav-link" href="#" title="Unsere AGB"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Unsere AGB</a></li>
							<li class="nav-item level1"><a class="nav-link" href="#" title="Impressum"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Impressum</a></li>
							<li class="nav-item level1"><a class="nav-link" href="#" title="Kontakt"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Kontakt</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 mb-2">
					<div class="config box">
						<div class="box-heading w-100 navbar-brand border-bottom mb-2">Informationen</div>
						<ul class="navbar-nav flex-column">
							<li class="nav-item level1"><a class="nav-link" href="#" title="Widerrufsrecht &amp; Widerrufsformular"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Widerrufsrecht &amp; Widerrufsformular</a></li>
							<li class="nav-item level1 active activeparent"><a class="nav-link" href="#" title="Lieferzeit"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Lieferzeit (aktiver Link)</a></li>
							<li class="nav-item level1"><a class="nav-link" href="#" title="Sitemap"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Sitemap</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 mb-2">
					<div class="config box">
						<div class="box-heading w-100 navbar-brand border-bottom mb-2">Zahlungsmethoden</div>
						<p><img class="img-fluid mt-2" src="includes/bs4_template_manager/assets/img/img_footer_payment.jpg" alt="" /></p>
						<p class="box_sub text-secondary small">Die Box kann unter tpl_modified/boxes/box_miscellaneous.html ver&auml;ndert werden. Die Sprachvariablen befinden sich in der Datei tpl_modified/lang/german/lang_german.custom.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 mb-2">
					<div class="config box">
						<div class="box-heading w-100 navbar-brand border-bottom mb-2">Newsletter-Anmeldung</div>
						<p class="box_sub text-secondary small">E-Mail-Adresse:</p>
						<div class="input-group">
    						<input type="email" name="email" class="form-control form-control-sm" />
							<div class="input-group-append"><button class="btn btn-secondary btn-sm" type="submit" title="Anmelden"><span class="fa fa-share-square fa-lg"></span><span class=""></span></button></div>
						</div>
						<p class="box_sub text-secondary small mt-3">Der Newsletter kann jederzeit hier oder in Ihrem Kundenkonto abbestellt werden.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="mod_copyright text-secondary text-center small">Modified2 &copy; 2019 | Template &copy; 2019 by Karl</div>
	</div>
	<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    	<div class="modal-dialog">
        	<div class="modal-content">
            	<div class="modal-header">
                	<h4 class="modal-title text-center">Information</h4>
                	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Schließen</span></button>
            	</div>
            	<div class="modal-body">
                	<h1>Lieferzeit</h1>
					Die Frist für die Lieferung beginnt bei Zahlung per Vorkasse am Tag nach Erteilung des Zahlungsauftrags an das überweisende Kreditinstitut bzw. bei anderen Zahlungsarten am Tag nach Vertragsschluss zu laufen und endet mit dem Ablauf des letzten Tages der Frist. Fällt der letzte Tag der Frist auf einen Samstag, Sonntag oder einen am Lieferort staatlich anerkannten allgemeinen Feiertag, so tritt an die Stelle eines solchen Tages der nächste Werktag.
            	</div>
            	<div class="modal-footer">
					<span class="btn btn-dark btn-sm" data-dismiss="modal">Schließen</span>
            	</div>
        	</div>
	    </div>
	</div>
</div>
<?php
	} else {
?>
<div id="container" class="default">
	<div id="top1" class="config top navbar navbar-expand clearfix">
		<div class="navbar-nav nav-justified w-100">
       		<div class="nav-item navbar-text text-nowrap mx-2"><span class="fa fa-user-friends fa-lg" aria-hidden="true"></span>&nbsp;&nbsp;Consultation +01 00 00 / 00 00 00</div>
			<div class="nav-item navbar-text text-nowrap mx-2 d-none d-sm-block"><span class="fa fa-shipping-fast fa-lg" aria-hidden="true"></span>&nbsp;&nbsp;Fast delivery</div>
			<div class="nav-item navbar-text text-nowrap mx-2 d-none d-md-block"><span class="fa fa-truck fa-lg" aria-hidden="true"></span>&nbsp;&nbsp;Free shipping - from 50 USD</div>
			<div class="nav-item navbar-text text-nowrap mx-2 d-none d-lg-block"><span class="fa fa-undo fa-lg fa-rotate-90" aria-hidden="true"></span>&nbsp;&nbsp;30 days return policy</div>
		</div>
	</div>
	<div id="main_container1" class="mt-2 px-2">
		<div class="row text-center text-md-left mb-3">
			<a class="col-12 col-md-4" href="#" title="Startseite &bull; Modified2"><img src="includes/bs4_template_manager/assets/img/logo_head.png" class="img-fluid" alt="Modified2" /></a>
			<ul class="logobar nav col-12 col-md-8 mt-3 justify-content-end">
				<li class="nav-item home"><a class="nav-link" title="Startseite" href="#"><span class="fa fa-home fa-lg"></span></a></li>
				<li class="nav-item language"><a id="lang-dd" href="#" class="nav-link" title="Sprachen" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-globe fa-lg fa-fw" aria-hidden="true"></span></a></li>
				<li class="nav-item account"><a id="account-dd" href="#" class="nav-link"  title="Mein Konto" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user fa-lg fa-fw" aria-hidden="true"></span></a></li>
				<li class="nav-item wishlist"><a id="toggle_wishlist" class="nav-link" href="#" title="Merkzettel"><span class="fa fa-heart fa-lg fa-fw" aria-hidden="true"></span></a></li>
				<li class="nav-item cart"><a id="toggle_cart" class="nav-link" href="#" title="Warenkorb"><span class="fa fa-shopping-cart fa-lg fa-fw" aria-hidden="true"></span></a></li>
				<li class="nav-item search"><a id="search-dd" href="#" class="nav-link" title="Suche" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search fa-lg fa-fw" aria-hidden="true"></span></a></li>
			</ul>
		</div>
		<nav id="navbar" class="config top2 navbar navbar-expand rounded mb-3">
			<div class="fullmenu container-fluid">
				<ul id="main" class="283 navbar-nav d-flex flex-wrap mr-auto">
					<li class="nav-item home"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span></a></li>
					<li class="level1 nav-item"><a class="nav-link" title="Category 1" href="#">Category 1</a></li>
					<li class="level1 active parent nav-item dropdown doubletap kk-mega"><a class="active parent nav-link dropdown-toggle" href="#" title="Category 2">Category 2 (active link)</a>
						<ul class="127 dropdown-menu kk-mega" data-level="2">
							<li id="li127" class="level2 active parent dropdown-submenu doubletap kk-mega" style="width: 33%;"><a id="a127" class="active parent dropdown-item" href="#" title="Subcategory 1">Subcategory 1 (active link)</a>
								<ul class="184 kk-mega" data-level="3">
									<li id="li184" class="level3 kk-mega"><a id="a184" class="dropdown-item" href="#" title="Subcategory 1.1">Subcategory 1.1</a></li>
									<li id="li185" class="level3 kk-mega"><a id="a185" class="dropdown-item" href="#" title="Subcategory 1.2">Subcategory 1.2</a></li>
									<li id="li186" class="level3 active parent kk-mega"><a id="a186" class="active parent dropdown-item" href="#" title="Subcategory 1.3">Subcategory 1.3 (active link)</a></li>
									<li id="li187" class="level3 kk-mega"><a id="a187" class="dropdown-item" href="#" title="Subcategory 1.4">Subcategory 1.4</a></li>
									<li id="li188" class="level3 kk-mega"><a id="a188" class="dropdown-item" href="#" title="Subcategory 1.5">Subcategory 1.5</a></li>
								</ul>
							</li>
							<li id="li81" class="level2 dropdown-submenu doubletap kk-mega" style="width: 33%;"><a id="a81" class="dropdown-item" href="#" title="Subcategory 2">Subcategory 2</a>
								<ul class="6 kk-mega" data-level="3">
									<li id="li6" class="level3 kk-mega"><a id="a6" class="dropdown-item" href="#" title="Subcategory 2.1">Subcategory 2.1</a></li>
									<li id="li21" class="level3 kk-mega"><a id="a21" class="dropdown-item" href="#" title="Subcategory 2.2">Subcategory 2.2</a></li>
									<li id="li16" class="level3 kk-mega"><a id="a16" class="dropdown-item" href="#" title="Subcategory 2.3">Subcategory 2.3</a></li>
									<li id="li7" class="level3 kk-mega"><a id="a7" class="dropdown-item" href="#" title="Subcategory 2.4">Subcategory 2.4</a></li>
									<li id="li12" class="level3 kk-mega"><a id="a12" class="dropdown-item" href="#" title="Subcategory 2.5">Subcategory 2.5</a></li>
									<li id="li14" class="level3 kk-mega"><a id="a14" class="dropdown-item" href="#" title="Subcategory 2.6">Subcategory 2.6</a></li>
								</ul>
							</li>
							<li id="li236" class="level2 dropdown-submenu doubletap kk-mega" style="width: 33%;"><a id="a236" class="dropdown-item" href="#" title="Subcategory 3">Subcategory 3</a>
								<ul class="244 kk-mega" data-level="3">
									<li id="li244" class="level3 kk-mega"><a id="a244" class="dropdown-item" href="#" title="Subcategory 3.1">Subcategory 3.1</a></li>
									<li id="li237" class="level3 kk-mega"><a id="a237" class="dropdown-item" href="#" title="Subcategory 3.2">Subcategory 3.2</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="level1 nav-item"><a class="nav-link" title="Kategory 3" href="#">Category 3</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<div id="main_container2" class="mb-2 px-2">
		<div id="content" class="row">
			<div id="col_right" class="col-12">
					<nav id="breadcrumb" class="breadcrumb"><span class="breadcrumb_info">Breadcrump example:&nbsp;&nbsp;&nbsp;</span>
						<a href="#" class="headerNavigation"><span >Home</span></a>&nbsp;&raquo;&nbsp;
						<a href="#" class="headerNavigation"><span >Catalogue</span></a>&nbsp;&raquo;&nbsp;
						<a href="#" class="headerNavigation"><span >Category 2</span></a>&nbsp;&raquo;&nbsp;
						<span ><span class="current">Subcategory 1</span></span>
					</nav>
					<div class="homesite">
					<h1 class="card p-2 bg-h">Welcome - Example card as heading</h1>
					<div class="clearfix mb-4">
						Welcome <span class="greetUser">visitor!</span> Would you like to <a href="#">login</a>? Or would you like to create a new <a href="#">account</a> er&ouml;ffnen?<br /><br />Should you be interested in the program, which forms the basis for this store, so please visit the website of <a href="#" rel="nofollow noopener" ><u><strong><span style="color:#B0347E;">mod</span><span style="color:#6D6D6D;">ified eCommerce Shopsoftware</span></strong></u></a>.<br /><br />The text shown here may be edited in the admin area under <b>Content Manager</b> - entry Index.
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-6 mb-2">
						<div class="box_category card mb-4">
		    				<div class="box_category_header card-header">Categories card-header</div>
							<ul id="categorymenu" class="nav nav-pills flex-column">
								<li class="nav-item level1"><a  class="nav-link" href="#" title="Category 1">Category 1</a></li>
								<li class="nav-item active"><a  class="nav-link active dropdown-toggle" href="#" title="Category 2">Category 2</a>
									<ul class="nav flex-column card border-0 m-1">
										<li class="nav-item level4"><a class="nav-link" title="Subcategory 1" href="#">- Subcategory 1</a></li>
										<li class="nav-item level4"><a class="nav-link" title="Subcategory 2" href="#">- Subcategory 2</a></li>
										<li class="nav-item level4"><a class="nav-link" title="Subcategory 3" href="#">- Subcategory 3</a></li>
									</ul>
								</li>
								<li class="nav-item level1"><a  class="nav-link" href="#" title="Category 3">Category 3</a></li>
			                </ul>
						</div>
						<div class="box_login card mb-4">
							<div class="box_header card-header">Welcome back! card-header</div>
							<div class="card-body">
								<div class="form-group">
						        	<label class="small">E-mail address:</label>
						    		<input type="email" name="email_address" class="form-control form-control-sm" />
						    	</div>
								<div class="form-group mb-1">
						    		<label class="small">Filter:</label>
									<select class="form-control form-control-sm" name="filter_sort">
										<option selected="selected" value="">Sort by ...</option>
										<option value="1">A to Z</option>
										<option value="2">Z ti A</option>
										<option value="3">Price in ascending order</option>
										<option value="4">Price in descending order</option>
										<option value="5">Newest products first</option>
										<option value="6">Oldest products first</option>
										<option value="7">Most selling products</option>
									</select>
								</div>
						   	</div>
							<div class="card-footer clearfix">
								<div class="d-flex text-left mb-2"><a class="small" href="#">Forgot your password?</a></div>
								<button class="btn btn-secondary btn-sm float-right" type="submit" title="Login"><span class="fa fa-user"></span><span class="">&nbsp;&nbsp;Login</span></button>
							</div>
						</div>
					</div>
					<div class="col-6 mb-2">
						<div class="mb-3">
							<button type="button" class="btn btn-primary btn-block my-1" data-toggle="modal" data-target="#modal">Open Modalbox</button>
							<button type="button" class="btn btn-primary m-1">Primary</button>
							<button type="button" class="btn btn-secondary m-1">Secondary</button>
							<button type="button" class="btn btn-success m-1">Success</button>
							<button type="button" class="btn btn-danger m-1">Danger</button>
							<button type="button" class="btn btn-warning m-1">Warning</button>
							<button type="button" class="btn btn-info m-1">Info</button>
							<button type="button" class="btn btn-light m-1">Light</button>
							<button type="button" class="btn btn-dark m-1">Dark</button>
						</div>
						<div class="card">
							<div class="card-body pb-2">
								<h4>List-group inside a card</h4>
							</div>
							<div class="list-group list-group-flush">
								<div class="list-group-item">
									<span class="float-right">
										<a href="#"><span class="btn btn-express btn-outline-secondary btn-sm"><span class="fa fa-cart-plus"></span></span></a>
										<a href="#"><span class="btn btn-incart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span></span></a>
									</span>
									<strong><a href="#">20/03/2019</a> / Order-No.: 48</strong><br />
									<strong>Betrag: </strong> 295,00 USD<br />
									<strong>Status: </strong>Open<br />
								</div>
								<div class="list-group-item">
									<span class="float-right">
										<a href="#"><span class="btn btn-express btn-outline-secondary btn-sm"><span class="fa fa-cart-plus"></span></span></a>
										<a href="#"><span class="btn btn-incart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span></span></a>
									</span>
									<strong><a href="#">19/03/2019</a> / Order-No.: 47</strong><br />
									<strong>Betrag: </strong> 27,00 USD<br />
									<strong>Status: </strong>Open<br />
								</div>
								<div class="list-group-item">
									<span class="float-right">
										<a href="#"><span class="btn btn-express btn-outline-secondary btn-sm"><span class="fa fa-cart-plus"></span></span></a>
										<a href="#"><span class="btn btn-incart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span></span></a>
									</span>
									<strong><a href="#">14/03/2019</a> / Order-No.: 46</strong><br />
									<strong>Betrag: </strong> 51,00 USD<br />
									<strong>Status: </strong>Open<br />
								</div>
							</div>
							<div class="card-body">
								<p><a href="#">show all orders</a></p>
							</div>
						</div>
					</div>
				</div>
				<div id="filterBar" class="filter_bar card bg-light mb-2 clearfix">
					<div class="sort_bar form-inline clearfix">
						<div class="form-group m-2">
							<select class="form-control form-control-sm"  name="filter_id"><option value="" selected="selected">All manufacturers</option><option value="21">MODIFIED</option></select>
						</div>
						<div class="form-group m-2">
							<select class="form-control form-control-sm"  name="filter_sort"><option value="" selected="selected">Sort by ...</option><option value="1">A to Z</option><option value="2">Z to A</option><option value="3">Price in ascending order</option><option value="4">Price in descending order</option><option value="5">Newest products first</option><option value="6">Oldest products first</option><option value="7">Most selling products</option></select>
						</div>
						<div class="form-group m-2">
							<select class="form-control form-control-sm"  name="filter_set"><option value="" selected="selected">Items per page</option><option value="3">3 Items per page</option><option value="12">12 Items per page</option><option value="27">27 Items per page</option><option value="999999">Show all items</option></select>
						</div>
						<div class="view-buttons ml-auto m-2 d-none d-sm-block">
							<a rel="nofollow" class="view_box btn btn-sm disabled" href="#" title="Box view"><span class="fa fa-th fa-2x"></span></a>&nbsp;&nbsp;
							<a rel="nofollow" class="view_list btn btn-sm" href="#" title="List view"><span class="fa fa-th-list fa-2x"></span></a>
						</div>
					</div>
				</div>
				<div class="pagination_bar mt-2 clearfix">
					<div class="count float-left mb-2 py-2"><span class="small">Show <strong>1</strong> of <strong>12</strong> (of in total <strong>222</strong> new products)</span></div>
					<ul class="pagination float-right">
						<li class="page-item current active"><a class="page-link">1</a></li>
						<li class="page-item 2"><a href="#" class=" page-link" title="Page 2">2</a></li>
						<li class="page-item 3"><a href="#" class=" page-link" title="Page 3">3</a></li>
						<li class="page-item 4"><a href="#" class=" page-link" title="Page 4">4</a></li>
						<li class="page-item 5"><a href="#" class=" page-link" title="Page 5">5</a></li>
						<li class="page-item"><a href="#" class=" page-link" title="Next 5 Pages">...</a></li>
						<li class="page-item"><a href="#" class=" page-link" title="Next Page">&raquo;</a></li>
					</ul>
				</div>
				<div class="bsCarousel bs4-carousel">
					<h1 class="card p-2 bg-h">Bestsellers card example</h1>
				  	<div class="row clearfix mb-4">
						<div class="listingbox col-sm-6 col-md-4 mb-2">
							<div class="card h-100">
								<a class="card-body h-100 pb-2 text-center" href="#">
						            <div class="ribbon bg-danger text-white shadow-sm">Sale</div>
						            <div class="lb_image mb-2">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/1_0.jpg" alt="Testarticle 1" />
									</div>
									<div class="lb_title lead text-secondary mb-1">
										Testarticle 1
									</div>
								</a>
								<div class="card-body p-1 text-center">
									<div class="lb_buttons mb-2">
										<a href="#"><span class="btn btn-cart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span><span class=""></span></span></a>&nbsp;&nbsp;<a class="btn btn-info btn-sm" href="#"><span class="fa fa-heart"></span></a>&nbsp;&nbsp;<a href="#"><span class="btn btn-info btn-sm"><span class="fa fa-eye"></span><span class="">&nbsp;&nbsp;Details</span></span></a>
									</div>
								</div>
								<div class="card-footer d-flex flex-column">
									<div class="mt-auto">
										<div class="lb_shipping small">Shipping time: <a href="#" title="Information">3-4 days</a></div>
										<div class="lb_price text-right mb-1">
											<span class="special_price lead text-danger clearfix">
												<span class="small_price">Special price</span> 3,90 USD<br>
												<span class="special_percent bg-danger shadow text-white">31%</span>
											</span>
											<div class="lb_vpe text-secondary small">1,95 USD per piece</div>
										</div>
										<div class="lb_tax text-right text-secondary small mb-1">19 % VAT incl. excl. <a href="#" title="Information">Shipping costs</a></div>
									</div>
								</div>
							</div>
						</div>
						<div class="listingbox col-sm-6 col-md-4 mb-2">
							<div class="card h-100">
								<a class="card-body h-100 pb-2 text-center" href="#">
						            <div class="ribbon bg-primary text-white shadow-sm">Top</div>
						            <div class="lb_image mb-2">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/2_0.jpg" alt="Testarticle 2" />
									</div>
									<div class="lb_title lead text-secondary mb-1">
										Testarticle 2
									</div>
								</a>
								<div class="card-body p-1 text-center">
									<div class="lb_buttons mb-2">
										<a href="#"><span class="btn btn-cart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span><span class=""></span></span></a>&nbsp;&nbsp;<a class="btn btn-info btn-sm" href="#"><span class="fa fa-heart"></span></a>&nbsp;&nbsp;<a href="#"><span class="btn btn-info btn-sm"><span class="fa fa-eye"></span><span class="">&nbsp;&nbsp;Details</span></span></a>
									</div>
								</div>
								<div class="card-footer d-flex flex-column">
									<div class="mt-auto">
										<div class="lb_shipping small">Shipping time: <a href="#" title="Information">3-4 days</a></div>
										<div class="lb_price text-right mb-1"><span class="standard_price lead clearfix">4,50 USD</span>
											<div class="lb_vpe text-secondary small">2,95 USD per piece</div>
										</div>
										<div class="lb_tax text-right text-secondary small mb-1">19 % VAT incl. excl. <a href="#" title="Information">Shipping costs</a></div>
									</div>
								</div>
							</div>
						</div>
						<div class="listingbox col-sm-6 col-md-4 mb-2">
							<div class="card h-100">
								<a class="card-body h-100 pb-2 text-center" href="#">
						            <div class="ribbon bg-success text-white shadow-sm">Neu</div>
						            <div class="lb_image mb-2">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/3_0.jpg" alt="Testarticle 3" />
									</div>
									<div class="lb_title lead text-secondary mb-1">
										Testarticle 3
									</div>
								</a>
								<div class="card-body p-1 text-center">
									<div class="lb_buttons mb-2">
										<a href="#"><span class="btn btn-cart btn-secondary btn-sm"><span class="fa fa-shopping-cart"></span><span class=""></span></span></a>&nbsp;&nbsp;<a class="btn btn-info btn-sm" href="#"><span class="fa fa-heart"></span></a>&nbsp;&nbsp;<a href="#"><span class="btn btn-info btn-sm"><span class="fa fa-eye"></span><span class="">&nbsp;&nbsp;Details</span></span></a>
									</div>
								</div>
								<div class="card-footer d-flex flex-column">
									<div class="mt-auto">
										<div class="lb_shipping small">Shipping time: <a href="#" title="Information">3-4 days</a></div>
										<div class="lb_price text-right mb-1"><span class="standard_price lead clearfix">1,40 USD</span>
											<div class="lb_vpe text-secondary small">1,40 USD per piece</div>
										</div>
										<div class="lb_tax text-right text-secondary small mb-1">19 % VAT incl. excl. <a href="#" title="Information">Shipping costs</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br class="clearfix" />
			</div>
			<div id="col_full" class="col-12">
				<div itemscope itemtype="http://schema.org/Product">
					<h1 class="card p-2 bg-h" itemprop="name">Article 1<span class="print-button position-absolute"><a class="iframe" rel="nofollow" href="#" title="Print datasheet"><span class="btn btn-outline-info btn-sm"><span class="fa fa-print"></span></span></a></span></h1>
					<div id="product_details" class="row clearfix">
						<div class="pd_imagebox col-md-6 mb-4">
							<div class="row mb-4">
								<div class="pd_big_image col-12">
									<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
										<a title="Artikel 1" href="#">
											<img class="img-fluid img-thumbnail" src="includes/bs4_template_manager/assets/img/1_0.jpg" alt="Article 1" title="Article 1" />
										</a>
									</div>
								</div>
							</div>
							<div class="pd_more_images easy-thumbnails row mb-4 clearfix">
								<div class="col-3">
									<a class="easyimages d-block text-center" href="#" data-standard="#" data-image-id="1" title="Article 1" data-title="Article 1" data-image="#">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/1_0.jpg" alt="Article 1" />
									</a>
								</div>
								<div class="col-3">
									<a class="easyimages d-block text-center" href="#" data-standard="#" data-image-id="2" title="Article 1" data-title="Article 1" data-image="#">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/2_0.jpg" alt="Article 1" />
									</a>
								</div>
								<div class="col-3">
									<a class="easyimages d-block text-center" href="#" data-standard="#" data-image-id="3" title="Article 1" data-title="Article 1" data-image="#">
										<img class="img-fluid" src="includes/bs4_template_manager/assets/img/3_0.jpg" alt="Article 1" />
									</a>
								</div>
							</div>
							<a class="cbimages easyzoom-link" title="Article 1" data-image-id="1" data-toggle="modal" data-title="Article 1" data-image="#" data-target="#modal" href="#"><span class="btn btn-info btn-sm"><span>Zoom image&nbsp;&nbsp;</span><span class="fa fa-search-plus"></span></span></a>
						</div>
						<div class="pd_content col-md-6 mb-4">
							<div class="pd_summarybox" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
								<div class="card bg-light text-right p-2 mb-2">
									<meta itemprop="priceCurrency" content="USD" />
									<meta itemprop="availability" content="http://schema.org/InStock" />
									<meta itemprop="itemCondition" content="http://schema.org/NewCondition" />
									<div class="pd_price">
										<span class="standard_price lead clearfix">20,00 USD</span>
						              <meta itemprop="price" content="20" />
									</div>
									<div class="pd_tax text-secondary small">19 % VAT incl. excl. <a rel="nofollow" href="#" title="Information" class="iframe">Shipping costs</a></div>
								</div>
							</div>
							<div class="pd_infobox">
								<div class="card bg-light p-2 mb-2">
									<div class="small"><strong>Shipping time:</strong>  <a rel="nofollow" href="#" title="Information" class="iframe">3-4 Days</a></div>
								</div>
							</div>
							<div class="card bg-light p-2 mb-2">
								<div class="row">
									<div class="col-3 mb-2"><input class="form-control form-control-sm" type="text" name="products_qty" value="1" size="3" /> <input class="form-control form-control-sm" type="hidden" name="products_id" value="1201" /></div>
									<div class="col-9">
										<button class="mb-2 btn btn-cart btn-secondary btn-sm btn-block" type="submit" title="Add to shopping cart"><span class="fa fa-shopping-cart"></span><span>&nbsp;&nbsp;Add to shopping cart</span></button>
										<button class="mb-2 btn btn-express btn-outline-secondary btn-sm btn-block" name="express" type="submit" title="My quick purchase"><span class="fa fa-cart-plus"></span><span>&nbsp;&nbsp;My quick purchase</span></button>
										<button class="btn btn-wish btn-outline-info btn-sm btn-block" name="wishlist" type="submit" title="Add to wishlist"><span class="fa fa-heart"></span><span>&nbsp;&nbsp;Add to wishlist</span></button>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 mb-2"><a class="iframe" rel="nofollow" href="#" title="Print datasheet"><span class="btn btn-info btn-xs btn-block"><span class="fa fa-print"></span><span>&nbsp;&nbsp;Print datasheet</span></span></a></div><div class="clearfix"></div>
								<div class="col-sm-6 mb-2"><a rel="nofollow" href="#" title="Write review"><span class="btn btn-info btn-xs btn-block"><span class="fa fa-edit"></span><span>&nbsp;&nbsp;Write review</span></span></a></div><div class="clearfix"></div>
								<div class="col-sm-6 mb-2"><a href="#" class="iframe" title="My quick purchase"><span class="btn btn-info btn-xs btn-block"><span class="fa fa-info-circle"></span><span>&nbsp;&nbsp;My quick purchase</span></span></a></div><div class="clearfix"></div>
							</div>
							<br class="clearfix" />
						</div>
						<br class="clearfix" />
					</div>
					<div id="horizontalTab" class="card clearfix mb-3">
						<ul id="bs_tabs" class="nav nav-pills card-header" role="tablist">
							<li class="nav-item"><a class="nav-link active show" href="#prod_desc" role="tab" data-toggle="tab">Details</a></li>
							<li class="nav-item"><a class="nav-link" href="#more_images" role="tab" data-toggle="tab">More images</a></li>
							<li class="nav-item"><a class="nav-link" href="#prod_reviews" role="tab" data-toggle="tab">Reviews</a></li>
						</ul>
						<div class="tab-content card-body">
							<div role="tabpanel" class="tab-pane active" id="prod_desc">
								<h4 class="detailbox">Products description</h4>
								<div itemprop="description">Lorem ipsum dolor sit amet consectetuer pretium montes volutpat neque congue. Justo tempus congue Curabitur orci netus neque tempus adipiscing condimentum pulvinar.<br />
				Amet tempus consequat elit a eleifend elit eros condimentum mollis nascetur. Curabitur Sed Nulla Integer Sed Vestibulum ipsum nec nec dictum dolor.</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="more_images">
								<div class="pd_more_images row d-flex flex-wrap mb-2">
									<div class="col-3 d-flex justify-content-center align-items-center">
										<a class="cbimages" title="Article 1" href="#" data-image-id="1" data-toggle="modal" data-title="Article 1" data-image="#" data-target="#modal">
											<img class="img-fluid d-block" itemprop="image" src="includes/bs4_template_manager/assets/img/1_0.jpg" data-src="#" alt="Article 1" />
										</a>
									</div>
									<div class="col-3 d-flex justify-content-center align-items-center">
										<a class="cbimages" title="Article 1" href="#" data-image-id="2" data-toggle="modal" data-title="Article 1" data-image="#" data-target="#modal">
											<img class="img-fluid d-block" src="includes/bs4_template_manager/assets/img/2_0.jpg" data-src="#" alt="">
										</a>
									</div>
									<div class="col-3 d-flex justify-content-center align-items-center">
										<a class="cbimages" title="Article 1" href="#" data-image-id="3" data-toggle="modal" data-title="Article 1" data-image="#" data-target="#modal">
											<img class="img-fluid d-block" src="includes/bs4_template_manager/assets/img/3_0.jpg" data-src="#" alt="">
										</a>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="prod_reviews">
								<h4>Customer reviews::</h4>
								<p>Write the first Review!</p>
								<div class="mt-3"><a href="#"><span class="btn btn-info btn-sm"><span class="fa fa-edit"></span><span>&nbsp;&nbsp;Write evaluation</span></span></a></div>
								<br class="clearfix" />
							</div>
						</div>
					</div>
					<div class="productnavigator card clearfix">
						<div class="p-2 text-center">
							<p class="small">Product&nbsp;<strong>1&nbsp;of&nbsp;5</strong>&nbsp;in this category</p>
							<div class="row">
								<div class="col-2 offset-1">
									<span class="text-secondary"><span class="fa fa-fast-backward"></span><span class="d-none d-md-block">first</span></span>
								</div>
								<div class="col-2">
									<span class="text-secondary"><span class="fa fa-backward"></span><span class="d-none d-md-block">back</span></span>
								</div>
								<div class="col-2">
									<a href="#" title="Overview"><span class="fa fa-list"></span><span class="d-none d-md-block">Overview</span></a>
								</div>
								<div class="col-2">
									<a href="#" title="next"><span class="fa fa-forward"></span><span class="d-none d-md-block">next</span></a>
								</div>
								<div class="col-2">
									<a href="#" title="last"><span class="fa fa-fast-forward"></span><span class="d-none d-md-block">last</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="layout_footer" class="config container-fluid py-4">
  		<div class="mb-2">
			<div id="layout_footer_inner" class="row">
				<div class="col-lg-3 col-md-6 mb-2">
					<div class="config box">
						<div class="box-heading w-100 navbar-brand border-bottom mb-2">More about...</div>
						<ul class="navbar-nav flex-column">
							<li class="nav-item level1"><a class="nav-link" href="#" title="Payment &amp; Shipping"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Payment &amp; Shipping</a></li>
							<li class="nav-item level1 active activeparent"><a class="nav-link" href="#" title="Privacy Notice"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Privacy Notice (active link)</a></li>
							<li class="nav-item level1"><a class="nav-link" href="#" title="Conditions of Use"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Conditions of Use</a></li>
							<li class="nav-item level1"><a class="nav-link" href="#" title="Imprint"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Imprint</a></li>
							<li class="nav-item level1"><a class="nav-link" href="#" title="Contakt"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Contakt</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 mb-2">
					<div class="config box">
						<div class="box-heading w-100 navbar-brand border-bottom mb-2">Informationen</div>
						<ul class="navbar-nav flex-column">
							<li class="nav-item level1"><a class="nav-link" href="#" title="Right of revocation &amp; revocation form"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Right of revocation &amp; revocation form</a></li>
							<li class="nav-item level1 active activeparent"><a class="nav-link" href="#" title="Delivery time"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Delivery time (active link)</a></li>
							<li class="nav-item level1"><a class="nav-link" href="#" title="Sitemap"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Sitemap</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 mb-2">
					<div class="config box">
						<div class="box-heading w-100 navbar-brand border-bottom mb-2">Payment methods</div>
						<p><img class="img-fluid mt-2" src="includes/bs4_template_manager/assets/img/img_footer_payment.jpg" alt="" /></p>
						<p class="box_sub text-secondary small">The box can be changed under bootstrap4/boxes/box_miscellaneous.html. The language variables are in the file bootstrap4/lang/english/lang_english.custom.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 mb-2">
					<div class="config box">
						<div class="box-heading w-100 navbar-brand border-bottom mb-2">Newsletter subscription</div>
						<p class="box_sub text-secondary small">E-mail address:</p>
						<div class="input-group">
    						<input type="email" name="email" class="form-control form-control-sm" />
							<div class="input-group-append"><button class="btn btn-secondary btn-sm" type="submit" title="Login"><span class="fa fa-share-square fa-lg"></span><span class=""></span></button></div>
						</div>
						<p class="box_sub text-secondary small mt-3">The newsletter can be canceled here or in your Account at any time.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="mod_copyright text-secondary text-center small">Modified2 &copy; 2019 | Template &copy; 2019 by Karl</div>
	</div>
	<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    	<div class="modal-dialog">
        	<div class="modal-content">
            	<div class="modal-header">
                	<h4 class="modal-title text-center">Information</h4>
                	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
            	</div>
            	<div class="modal-body">
                	<h1>Delivery time</h1>
					The deadline for delivery begins when paying in advance on the day after the payment order to the remitting bank or for other payments on the day to run after the conclusion and ends with the expiry of the last day of the period. Falls on a Saturday, Sunday or a public holiday delivery nationally recognized, the last day of the period, as occurs, the next business day at the place of such a day.
            	</div>
            	<div class="modal-footer">
					<span class="btn btn-dark btn-sm" data-dismiss="modal">Close</span>
            	</div>
        	</div>
	    </div>
	</div>
</div>
<?php
	}
?>
<div class="copyright">
	<a href="#" rel="nofollow noopener">
		<span class="cop_magenta">mod</span>
		<span class="cop_grey">ified eCommerce Shopsoftware © 2009-2019</span>
	</a>
</div>
    <script src="<?php echo $js_path; ?>jquery.min.js"></script>
    <script src="<?php echo $js_path; ?>bootstrap.bundle.min.js"></script>
   </body>
</html>
