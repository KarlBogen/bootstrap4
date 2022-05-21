<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

$lang_array = array(
	'TEXT_BS4_TPL_MANAGER_CONFIG_UPDATE_SYSTEMMODULE_WARNING' => 'New settings have been added - an update of the system module must be made.<br />
		The link takes you to the system module &nbsp;&nbsp;&nbsp;',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HEADING_TITLE' => 'Bootstrap 4 template configuration',
	'TEXT_BS4_TPL_MANAGER_CONFIG_INFO' => 'Settings made here have a direct effect on the shop!',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_HEADER' => 'Header',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1' => 'Top1:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_INFO' => 'Should Topbar with Top1 be displayed?<br /><br />
		<strong>Notice:</strong><br />Four column entries can be displayed in the top bar.<br />
		So that these columns can also be used in multiple languages, the texts are stored in a language file.<br />
		The texts can be changed in the file "templates/bootstrap4/lang/lang_english.custom".<br />
		Language variable "BS4_top1".',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2' => 'Top2:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_INFO' => 'Should Top2 be displayed?<br /><br />
		Language variable "BS4_top2".',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP3' => 'Top3:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP3_INFO' => 'Should Top3 be displayed?<br /><br />
		Language variable "BS4_top3".',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP4' => 'Top4:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP4_INFO' => 'Should Top4 be displayed?<br /><br />
		Language variable "BS4_top4".',
	'TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SHOW_JS_DISABLED' => 'JavaScript-Note:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SHOW_JS_DISABLED_INFO' => 'Should the JavaScript-Note be displayed?<br /><br />
		<strong>Note:</strong><br />
		The text is only visible if the customer has deactivated JavaScript in the browser.<br /><br />
		Language variable "BS4_noscript".',
	'TEXT_BS4_TPL_MANAGER_CONFIG_LOGO' => 'Logopath:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_LOGO_INFO' => 'Relative path to the shop logo.<br /><br />
		<strong>Note:</strong><br />
		Logo path relative to the folder "shoproot/templates/bootstrap4/" - e.g. shoproot/templates/bootstrap4/img/logo_head.png -> "img/logo_head.png"',
	'TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SEARCHFIELD_PERMANENT' => 'Searchfield:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SEARCHFIELD_PERMANENT_INFO' => 'Should the search field be displayed permanently?<br /><br />
		<strong>Note:</strong><br />
		The input field is then displayed above the icon bar.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SHOW_ICON_WITH_NAMES' => 'Icon bar:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_BS4_SHOW_ICON_WITH_NAMES_INFO' => 'Should the name of the icon be displayed on wide screens?',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_SUPERFISH' => 'Menus',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MENUBAR_SMALLSCREEN' => 'Menu bar small screens',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MENUBAR_FIXEDTOP' => 'Menu bar fixed top:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MENUBAR_FIXEDTOP_INFO' => 'Should the menu bar be fixed at the top?<br />
		The menu bar no longer scrolls with the side. The logo is moved to the menu bar.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FIXEDTOP_CLASSES' => 'CSS-Classes:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FIXEDTOP_CLASSES_INFO' => 'CSS-Classes for fixed menu bar!<br />
		Fixing the menu bar on small screens removes the normal bootstrap CSS classes and replaces them with the input.<br />
		This makes it possible to give the menu bar a different look.<br />
		Default: "navbar-light bg-light border-bottom p-0"',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MENUBAR_FIXEDTOP' => 'Logo bar fixed top:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MENUBAR_FIXEDTOP_INFO' => 'Should the logo bar be moved to the fixed menu bar?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_RESPONSIVEMENU' => 'Responsive-Menu',
	'TEXT_BS4_TPL_MANAGER_CONFIG_RESPONSIVE' => 'Show menu:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_RESPONSIVE_INFO' => 'Should the responsive menu be displayed?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISHMENU' => 'Superfish-Menu',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH' => 'Show menu:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_INFO' => 'Should the superfish menu be displayed?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOUCH_USE' => 'Touch menu:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOUCH_USE_INFO' => 'Make superfish menu usable for touch screens?<br /><br />
		<strong>Note:</strong><br />
		If "Yes" an additional JavaScript is loaded, which allows the operation of the menu even without a PC mouse.<br />
		Smartphones and tablets do not need this script, only large touch screen monitors!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL' => 'Display up to level:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_INFO' => 'To what level should the Superfish menu be displayed?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_ALL' => 'all levels displayed',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_1' => 'only level 1 is displayed',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_2' => 'up to level 2 displayed',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_3' => 'up to level 3 displayed',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_4' => 'up to level 4 displayed',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_5' => 'up to level 5 displayed',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_6' => 'up to level 6 displayed',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCTSINCAT' => 'Number of products:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCTSINCAT_INFO' => 'Should the number of products in a categorie be displayed in the menu?<br /><br />
		<strong>Note:</strong><br />
		Setting also applies to the responsive menu.!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HOMEBUTTON' => 'Home icon :',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HOMEBUTTON_INFO' => 'Should the home icon be displayed?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ADD_LINK' => 'Additional links:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ADD_LINK_INFO' => 'Additional links for the menu can be entered!<br /><br />
		<strong>Syntax:</strong><br />
		Link target1|link name1,link target2|link name2,link target3|link na...<br /><br />
		<strong>Example:</strong><br />
		The input "https://www.mein_shop.com/shop_content.php?coID=3|Service,https://www.modified-shop.org|Modified" generated two links,<br />
		Link 1 with the name "Service" and the target "https://www.mein_shop.com/shop_content.php?coID=3"<br />
		Link 2 with the name "Modified" and the target "https://www.modified-shop.org"<br /><br />
		For multilanguage sites use e.g. "https://www.example.com|BS4_Linktext" - important is the "BS4_" at the beginning!<br />
		In addition, a language variable must be created in the file "templates/bootstrap4/lang/lang_english.custom" - "BS4_Linktext = \'My link\'"',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MEGAS' => 'Mega menu:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_MEGAS_INFO' => 'Here the menu can be configured as mega-menu.<br /><br />
		<strong>The Superfish menu can be displayed as a normal dropdown but also as a mega menu!<br />
		For the representation as normal dropdown menu leave this field empty!</strong><br /><br />
		<strong>Example:</strong><br />
		All categories should be displayed as a mega-menu with 3 columns.<br />
		Input: "main-3"<br />
		The ID of the Navbar "main" is entered, followed by the number of columns.<br /><br />
		All categories should be displayed as a mega-menu with 3 columns, after the 5th link of the lowest category level a link "show more ..." should be added.<br />
		Input: "main-3-5"<br />
		The ID of the Navbar "main" is entered, followed by the number of columns and the location (5) where the link should be inserted.<br /><br />
		The categories with the ID 5 (3-columns) and ID 22 (4-columns) should be displayed as a mega-menu.<br />
		Input: "li5-3,li22-4"<br />
		The ID \'s of the category links "li5" and "li22" are entered - the spelling is important here - behind the number of columns.<br /><br />
        The categories with the ID 5 (3-columns) and ID 22 (4-columns) should be displayed as a mega-menu, from the 4th respectively 5th link of the lowest category level a link "show more ..." should be inserted.
		Input: "li5-3-4,li22-4-5"<br />
		The ID \'s of the category links "li5" and "li22" are entered - the spelling is important here - behind the number of columns and the location (4, 5) where the link should be inserted.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU' => 'Modified standard menu',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL' => 'Display up to level:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL_INFO' => 'To what level should the Standard menu be displayed?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX' => 'Load subcategories by ajax:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_INFO' => 'Should subcategories be loadesd by ajax?<br />
		For this purpose an additional "+" button is displayed - with click the next level is faded in.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_SCROLL' => 'Scroll at subcategory-click:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_SCROLL_INFO' => 'Do you want to scroll up the clicked category after clicking on the subcategory button?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_POSITION_LEFT' => 'Position on small screens:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CATEGORIESMENU_POSITION_LEFT_INFO' => 'Should the menu be displayed on small screens on the left side?<br /><br />
		<strong>Note:</strong><br />
		This setting only works if the responsive menu is switched off!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NONE' => 'none',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ALL_MENUS' => 'Applies to all menus',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SPECIALS' => 'Link Special offers:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SPECIALS_INFO' => 'Should the link "Special offers" be displayed in the menu?<br /><br />
		<strong>Note:</strong><br />
		This and the following two settings also apply to the Modified default menu!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW' => 'Link New products:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW_INFO' => 'Should the link "New products" be displayed in the menu?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE' => 'Capitalization:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE_INFO' => 'Should the links "Special offers" und "New products" be capitalized?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES' => 'Hide empty categories:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES_INFO' => 'Do you want to hide empty categories?<br /><br />
		<strong>Note:</strong><br />
		If "Yes", the page build time will slow down, because with every shop call it is checked how many products are in the individual categories and their subcategories.<br /><br />
		The categories are hidden if there is no active article in the category or one of its subcategories.<br />
		For this reason, in the admin area Configuration -> Stock Options -> Completion of order - disable Sold out should be set to "Yes".',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_SLIDER' => 'Slider',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW' => 'Imageslider:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_INFO' => 'Where and how wide should the slider be displayed?<br /><br />
		<strong>Note:</strong><br />
		This slider displays images asigned with the banner group "SLIDER" in the "Banner Manager"!<br />
		Note, for "entire screen width" and "content width" the values in "Configuration -> Image Options" must be adjusted, or change the image via FTP in the folder "images/banner/", after saving in the Banner Manager.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_NONE' => 'hide',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SCREEN' => 'entire screen width',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SHOP' => 'content width',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_COLUMN' => 'right column',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_FADE' => 'Image slider:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_FADE_INFO' => 'Which effect should be used?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP' => 'TOP-products:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_INFO' => 'Should the top products be displayed in a slider?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_FADE' => 'TOP-products:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_FADE_INFO' => 'Which effect should be used?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_NAME_LINES' => 'TOP-products:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_TOP_NAME_LINES_INFO' => 'Number of lines that the article name should occupy (0 = auto).',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS' => 'Bestseller:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_INFO' => 'Should the bestsellers be displayed in a slider?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_FADE' => 'Bestsellers:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_FADE_INFO' => 'Which effect should be used?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_NAME_LINES' => 'Bestsellers:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_BS_NAME_LINES_INFO' => 'Number of lines that the article name should occupy (0 = auto).',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_BOXES' => 'Boxes',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOXES' => 'Boxes on the start page',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CATEGORIES' => 'Box Categoriesmenu:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CATEGORIES_INFO' => 'Should the box category menu be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_ADD_QUICKIE' => 'Box Quick purchase:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_ADD_QUICKIE_INFO' => 'Should the box Quick purchase be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LOGIN' => 'Box Login:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LOGIN_INFO' => 'Should the box Login be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW' => 'Box New Products:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW_INFO' => 'Should the box New Products be displayed on the start page in the left column?<br />
		<strong>Note:</strong><br />
		Only displayed if the link New products is not displayed in the menu!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS' => 'Box Special offers:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS_INFO' => 'Should the box Special offers be displayed on the start page in the left column?<br />
		<strong>Note:</strong><br />
		Only displayed if the link Special offers is not displayed in the menu!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LAST_VIEWED' => 'Box Last viewed:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_LAST_VIEWED_INFO' => 'Should the box Last viewed be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS' => 'Box Reviews:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS_INFO' => 'Should the box Reviews be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CUSTOM' => 'Box Custom:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CUSTOM_INFO' => 'Should the box Custom be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS' => 'Box Manufacturer:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS_INFO' => 'Should the box Manufacturer be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS_INFOS' => 'Box Manufacturer info:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_MANUFACTURERS_INFO_INFO' => 'Should the box Manufacturer info be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CURRENCIES' => 'Box Currencies:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_CURRENCIES_INFO' => 'Should the box Currencies be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SHIPPING_COUNTRY' => 'Box Shipping country:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SHIPPING_COUNTRY_INFO' => 'Should the box Shipping country be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_INFOBOX' => 'Box Customer group:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_INFOBOX_INFO' => 'Should the box Customer group be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_HISTORY' => 'Box Ordering information:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_HISTORY_INFO' => 'Should the box Ordering information be displayed on the start page in the left column??',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_TRUSTEDSHOPS' => 'Box Trusted Shops:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_BOX_TRUSTEDSHOPS_INFO' => 'Should the box Trusted Shops be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOXES' => 'Boxes not on the start page',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CATEGORIES' => 'Box Categoriesmenu:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CATEGORIES_INFO' => 'Should the box category menu be displayed on other pages (not start page) in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_ADD_QUICKIE' => 'Box Quick purchase:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_ADD_QUICKIE_INFO' => 'Should the box Quick purchase be displayed on other pages (not start page) in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LOGIN' => 'Box Login:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LOGIN_INFO' => 'Should the box Login be displayed on the start page in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_WHATSNEW' => 'Box New Products:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_WHATSNEW_INFO' => 'Should the box New Products be displayed on other pages (not start page) in the left column?<br />
		<strong>Note:</strong><br />
		Only displayed if the link New products is not displayed in the menu!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SPECIALS' => 'Box Special offers:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SPECIALS_INFO' => 'Should the box Special offers be displayed on other pages (not start page) in the left column?<br />
		<strong>Note:</strong><br />
		Only displayed if the link Special offers is not displayed in the menu!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED' => 'Box Last viewed:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED_INFO' => 'Should the box Last viewed be displayed on other pages (not start page) in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_REVIEWS' => 'Box Reviews:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_REVIEWS_INFO' => 'Should the box Reviews be displayed on other pages (not start page) in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CUSTOM' => 'Box Custom:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CUSTOM_INFO' => 'Should the box Custom be displayed on other pages (not start page) in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS' => 'Box Manufacturer:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO' => 'Should the box Manufacturer be displayed on other pages (not start page) in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS_INFOS' => 'Box Manufacturer info:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_MANUFACTURERS_INFO_INFO' => 'Should the box Manufacturer info be displayed on other pages (not start page) in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CURRENCIES' => 'Box Currencies:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_CURRENCIES_INFO' => 'Should the box Currencies be displayed on other pages (not start page) in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SHIPPING_COUNTRY' => 'Box Shipping country:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SHIPPING_COUNTRY_INFO' => 'Should the box Shipping country be displayed on other pages (not start page) in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_INFOBOX' => 'Box Customer group:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_INFOBOX_INFO' => 'Should the box Customer group be displayed on other pages (not start page) in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_HISTORY' => 'Box Ordering information:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_HISTORY_INFO' => 'Should the box Ordering information be displayed on other pages (not start page) in the left column??',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_TRUSTEDSHOPS' => 'Box Trusted Shops:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_TRUSTEDSHOPS_INFO' => 'Should the box Trusted Shops be displayed on other pages (not start page) in the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ALL_BOXES' => 'All boxes',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_ALL_BOXES' => 'All boxes:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_HIDE_ALL_BOXES_INFO' => 'Should all boxes on all pages be<span class="colorRed"><strong>hide</strong></span>?<br /><span class="colorRed">Please activate the Superfish Menue bevor deactivate all boxes!</span>',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_VIEWS' => 'Views',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_FULLCONTENT' => 'Start page:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_FULLCONTENT_INFO' => 'Should the start page be displayed "fullcontent", means without the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_SHOW_CATEGORYLIST' => 'Start page:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_STARTPAGE_SHOW_CATEGORYLIST_INFO' => 'Should a category list (only main categories) be displayed on the start page?<br /><br />
		<strong>Recommendation:</strong><br />
		 Since shop version 2.0.6.0 it is possible to save category images in different sizes (images, mobile images, listing images).<br />
		 The dimensions must be set in Configuration -> Image Options - maybe the system module "Imageprocessing - product images" have to be run.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PROD_LIST_FULLCONTENT' => 'Product lists:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PROD_LIST_FULLCONTENT_INFO' => 'Should the product listings be displayed "fullcontent", means without the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT' => 'Product info page:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT_INFO' => 'Should the product info page be displayed "fullcontent", means without the left column?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE' => 'Product info page:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE_INFO' => 'Should the manufacturer\'s image be displayed on the product info page?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_STARTPAGE' => 'Products view:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_STARTPAGE_INFO' => 'Should "Our top products" be displayed as "box" on the start page?<br /><br />
		<strong>Note:</strong><br />
		 If you select "No", the products will be displayed in list form!<br />
		 This setting has no effect if the top products are displayed as sliders.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX' => 'Products view:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_INFO' => 'Should the products be displayed as "box" on category view (product listing)?<br /><br />
		<strong>Note:</strong><br />
		 If you select "No", the products will be displayed in list form!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX' => 'Products view:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX_INFO' => 'Should cross-selling-, reverse-cross-selling- and also-purchased-products be displayed as "box"?<br /><br />
		<strong>Note:</strong><br />
		 If you select "No", the products will be displayed in list form!',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_CLASSES' => 'Classes',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_NAVBAR' => 'TOP1 Navbar:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_NAVBAR_INFO' => 'Class of the top navbar!<br />
		Font classes only have an effect if "none" is selected and the navbar contains only text, no links.<br />
		Default: navbar-dark',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_BG' => 'TOP1 background:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_BG_INFO' => 'Background class of the top navbar!<br />
		You will find more information under "Documentation-> Utilitis-> Colors" on the page "https://getbootstrap.com"<br />
		Default: bg-dark',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_TEXT' => 'TOP1 font color:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP1_TEXT_INFO' => 'Font color class of the top navbar!<br />
		Default: none',
	'TEXT_BS4_TPL_MANAGER_CONFIG_LOGOBAR_TEXT' => 'Logobar font color:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_LOGOBAR_TEXT_INFO' => 'Font color class of the navigation to the right of the logo!<br />
		Default: text-secondary',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_NAVBAR' => 'Main Navbar:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_NAVBAR_INFO' => 'Class of the main navbar / the superfish menu!<br />
		Default: navbar-light',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_BG' => 'Main background:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TOP2_BG_INFO' => 'Background class of the main navbar / the superfish menu!<br />
		Default: bg-dark',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_NAVBAR' => 'Footer Navbar:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_NAVBAR_INFO' => 'Class of the footer navigation!<br />
		Default: navbar-dark',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_BG' => 'Footer background:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FOOTER_BG_INFO' => 'Background class of the footer navigation!<br />
		Default: bg-dark',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_MODULES' => 'Modules',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND' => 'Customer remind:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_INFO' => 'Activate Customers Remind!<br />
		<strong>Hinweis:</strong><br />
		 This module offers your logged customers the possibility to have a reminder e-mail sent as soon as an article (in sufficient number) is back in stock.<br /><br />
		 As soon as an article is no longer in stock, a button appears on the product detail page, with which the customer can register in the reminder list.
		 <strong>The reminder list can be found in the admin area under "Customers -> Customers Remind".</strong><br /><br />
		 If an article (in sufficient number) is in stock again, the customer automatically receives a reminder email with a link that leads directly to the product in the shop.<br />
		 Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=12813.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=12813.0</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL' => 'Customer remind:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL_INFO' => 'Send an e-mail to the shop owner (contact - e-mail address) when a customer enters the reminder list?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CHEAPLY_SEE' => 'Cheaply see:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_CHEAPLY_SEE_INFO' => 'Activate Module "Cheaply see" and show the link in the product detail view!!<br />
		<strong>Note:</strong><br />
		 The text displayed in the upper area can be changed in the Content Manager!<br />
		 Link to the original module: <a href="http://www.xtc-load.de/2009/02/billiger-gesehen-by-southbridgede" target=”_blank”>http://www.xtc-load.de/2009/02/billiger-gesehen-by-southbridgede</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY' => 'Question to article:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY_INFO' => 'Activate Module "Question to article" and show the link in the product detail view!!<br />
		<strong>Note:</strong><br />
		 The text displayed in the upper area can be changed in the Content Manager!<br />
		 Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=2153.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=2153.0</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER' => 'Attribute price updater:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER_INFO' => 'Activate Module "Attribute price updater"!<br />
		<strong>Hinweis:</strong><br />
		 Surcharge options/attributes are automatically added to the item price.<br />
		 Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=20125.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=20125.0</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER_UPDATE_PRICE_INFO' => 'Do you want to update the shown price?<br />
		 If "Yes" not only a note is displayed, the products price is also replaced by Javascript.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART' => 'AGI: reduce amount in basket:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART_INFO' => 'Activate Module "AGI: reduce amount in basket"!<br />
		<strong>Note:</strong><br />
		 The module reduces the number of items in the cart to the maximum available quantity, should a larger number be ordered. The customer is informed directly about the adjustment and does not have to find the right number by trying.<br />&copy; andreas-guder.de.<br />
		 Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=40416.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=40416.0</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_ACTIVATE' => 'Please activate: ',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_DEACTIVATE' => 'Please deactivate: ',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_ALLOW_CHECKOUT' => 'Allow Checkout',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_CHECK' => 'Check Stock Level',
	'TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA' => 'AGI: reduce amount in basket:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA_INFO' => 'Show amount in cart?<br />
		 Show the customer what number he originally wanted and how many were reduced.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1' => 'Awids Rating Breakdown',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_2' => ' - Review breakdown by star rating',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_INFO' => 'Activate the "Breakdown of reviews by stars" module!<br />
		<strong>Note:</strong><br />
         This module breaks down the ratings awarded per number of stars into individual progress bars, so the customer can see which ratings have been given most frequently.<br />
		 Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=40793.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=40793.0</a>',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_PRODLIST_INFO' => 'Show module in product lists?<br />
		 The extended rating can also be displayed in product lists.<br />
		 On bestsellers, new articles and top articles, sometimes only a simple representation is possible.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS_INFO' => 'Show stars <u>without</u> saved rating?<br />
		 This makes it possible for boxes in product lists to have equal heights.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_URL_INFO' => 'Activate filter popup?<br />
		 This setting make it possible to display the ratings in a popup, and filter them by the number of stars.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS' => 'CSS product & attribute stock traffic light',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_INFO' => 'Activate the "CSS product & attribute stock traffic light" module!<br />
		<strong>Note:</strong><br />
		 This module shows a product and attribute stock traffic light, which either displays a graphic stock traffic light or the stock as text.<br />
		 Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=37371.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=37371.0</a><br />
		 Texts can be changed in the file "lang/english/extra/bs4_additional_modules.php" (German -> "lang/german/extra/bs4_additional_modules.php").',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_NONE' => 'do not show',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_L' => 'only traffic light',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LS' => 'traffic light and stock',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LT' => 'traffic light and text, no stock',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LTS' => 'traffic light, text and stock',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_T' => 'only text',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_TS' => 'text and stock',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODLIST_INFO' => '<strong>Traffic light in product lists:</strong><br />
		 How should the traffic light be displayed in the product listing?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODINFO_INFO' => '<strong>Traffic light on the product detail page:</strong><br />
		 How should the traffic light be displayed on the product detail page?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODATTR_INFO' => '<strong>Traffic light for attributes on the product detail page:</strong><br />
		 How should the traffic light be displayed for attributes on the product detail page?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_STOCK_RED_YELL_INFO' => 'Enter the minimum value for the yellow traffic light here. This value and all values below are provided with a red traffic light. Standard: 0',
	'TEXT_BS4_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_STOCK_GREEN_INFO' => 'Enter the value from which a green traffic light should be displayed. All values below this up to the minimum value are provided with a yellow traffic light.',

	'TEXT_BS4_TPL_MANAGER_CONFIG_TAB_MIXED' => 'Miscellaneous',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PICTURESET_ACTIVE' => 'Product Thumbnails:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_PICTURESET_ACTIVE_INFO' => 'Should product thumbnails be replaced with mini or midi images?<br /><br />
		<strong>Note:</strong><br />
		 If you set this option to "Yes", product thumbnails will be replaced by mini or midi images.<br /><br />
		 Since shop version 2.0.6.0 it is possible to save product images in additional sizes (mini, midi).<br />
		 The dimensions must be set in Configuration -> Image Options - maybe the system module "Imageprocessing - product images" have to be run.',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_NEW' => 'Ribbons:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_NEW_INFO' => 'Should the ribbon "New" be displayed?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_TOP' => 'Ribbons:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_TOP_INFO' => 'Should the ribbon "Top" be displayed?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_SPECIAL' => 'Ribbons:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_SPECIAL_INFO' => 'Should the ribbon "Sale" be displayed?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_PERCENT' => 'Percentage button:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FLAG_PERCENT_INFO' => 'Should the percentage button (for example, "25%") be displayed?',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ADVANCED_JS_VALIDATION' => 'Validation:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_ADVANCED_JS_VALIDATION_INFO' => 'Do you want to use advanced JavaScript validation?<br /><br />
		<strong>Note:</strong><br />
		 Input error messages are displayed directly under the corresponding input field in the registration form.!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_USE_EASYZOOM' => 'Easyzoom:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_USE_EASYZOOM_INFO' => 'Should Easyzoom be used in the product info view??<br /><br />
		<strong>Note:</strong><br />
		 Easyzoom enlarges the product image as soon as you hover over it with the mouse pointer or touch it with your finger (smartphone-compatible)!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV' => 'Filter color:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV_INFO' => 'Which background color class should an active filter have?<br /><br />
		<strong>Note:</strong><br />
		 In the Bootstrap 4 Documentation -> Utilities-> Background color ("https://getbootstrap.com/docs/4.3/utilities/colors/#background-color") the color classes can be viewed!',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW' => 'Search field:',
	'TEXT_BS4_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW_INFO' => 'Should the search field be displayed in one row?<br /><br />
		<strong>Note:</strong><br />
		 The additional selection field for the category to be searched for can be displayed in one or two rows, so the category names are not cut off!',
);


foreach ($lang_array as $key => $val) {
  defined($key) or define($key, $val);
}

?>