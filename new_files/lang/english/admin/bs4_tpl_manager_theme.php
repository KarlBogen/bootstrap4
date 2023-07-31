<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

$lang_array = array(
	'TEXT_BS4_TPL_MANAGER_THEME_HEADING_TITLE' => 'Bootstrap 4 Theme Settings',
	'TEXT_BS4_TPL_MANAGER_THEME_INFO' => 'Here made settings have only effect on the shop, if the theme was copied into the shop!<br />',
	'TEXT_BS4_TPL_MANAGER_THEME_PREVIEW_TITLE' => 'Preview of theme - ',
	'TEXT_BS4_TPL_MANAGER_THEME_PREVIEW_INFO' => '<small><i>&nbsp;&nbsp;&nbsp;(Preview does not match perfectly the shop view)</i></small>',

	'TEXT_BS4_TPL_MANAGER_THEME_TAB_BASICS' => 'Basics',
	'BUTTON_COPY_2_TEMPLATE' => 'Ready - copy theme to template',
	'TEXT_BS4_TPL_MANAGER_THEME_COPY_2_TEMPLATE_INFO' => 'The theme settings made on this page are taken over into the template!',
	'BS4_COPY_2_TEMPLATE' => 'Transfer settings to the template?<br /><br />Is the path to the Bootstrap 4 template<br /><br />&nbsp;&nbsp;&nbsp;"<strong>%s</strong>"<br /><br />correct?',
	'TEXT_BS4_TPL_MANAGER_THEME_PATHS' => 'Template and theme paths:',
	'TEXT_BS4_TPL_MANAGER_THEME_CURRENT_TEMPLATE' => 'BS4 Template:',
	'TEXT_BS4_TPL_MANAGER_THEME_CURRENT_TEMPLATE_INFO' => 'Path to Bootstrap4-Template!<br />
		The CSS file created in the theme settings will be copied to this template.',
	'TEXT_BS4_TPL_MANAGER_THEME_CURRENT_TEMPLATE0' => 'Please choose ...',
	'TEXT_BS4_TPL_MANAGER_THEME_CURRENT_THEME' => 'BS4 Theme:',
	'TEXT_BS4_TPL_MANAGER_THEME_CURRENT_THEME_INFO' => 'Select the bootstrap theme that will be shown in the preview or will be copied to the shop!',
	'TEXT_BS4_TPL_MANAGER_THEME_CUSTOM1' => 'Custom theme 1',
	'TEXT_BS4_TPL_MANAGER_THEME_CUSTOM2' => 'Custom theme 2',

	'TEXT_BS4_TPL_MANAGER_THEME_TAB_FONTS' => 'Additional font',
	'TEXT_BS4_TPL_MANAGER_FONTS_INFO' => '<span style="color:red;">With Shop Version 2.0.5.0, the Modified team changed the file permissions in the admin directory.<br />For this reason, the location of the font files has changed to "templates/bootstrap4/css/fonts/"!</span><br /><br />A DSGVO-compliant font must be saved on your own server.<br />
		This extends the loading time of your shop!',
	'TEXT_BS4_TPL_MANAGER_THEME_FONTS_NAME' => 'Name of the font:',
	'TEXT_BS4_TPL_MANAGER_THEME_FONTS_NAME_INFO' => 'Enter the name of the font to be included, e.g. "Open Sans" (without quotation marks)!<br />
		<strong>You will find instructions below!</strong>',
	'TEXT_BS4_TPL_MANAGER_THEME_FONT_DEFINITION' => 'CSS code of the font:',
	'TEXT_BS4_TPL_MANAGER_THEME_FONT_DEFINITION_INFO' => 'Enter the CSS code for embedding the font!<br />
		<strong>You will find instructions below!</strong>',

	'TEXT_BS4_TPL_MANAGER_THEME_THEMEMODEL_CUSTOM1' => 'Theme template:',
	'TEXT_BS4_TPL_MANAGER_THEME_THEMEMODEL_CUSTOM1_INFO' => 'Select the template that should be used for this theme!',
	'TEXT_BS4_TPL_MANAGER_THEME_THEMEMODEL_LOAD_INFO' => 'Click here to load the template selected above!',
	'BUTTON_LOAD_THEMEMODEL' => 'Load template',
	'BS4_LOAD_THEMEMODEL' => 'Load template?<br /><br />Previously made settings in this theme will be lost!',
	'TEXT_BS4_TPL_MANAGER_THEME_COLOR' => 'Color: ',
	'TEXT_BS4_TPL_MANAGER_THEME_VAR' => '<br />Variable: ',
	'COLOR_0' => 'white',
	'COLOR_1' => 'gray 100',
	'COLOR_2' => 'gray 200',
	'COLOR_3' => 'gray 300',
	'COLOR_4' => 'gray 400',
	'COLOR_5' => 'gray 500',
	'COLOR_6' => 'gray 600',
	'COLOR_7' => 'gray 700',
	'COLOR_8' => 'gray 800',
	'COLOR_9' => 'gray 900',
	'COLOR_10' => 'black',
	'COLOR_11' => 'blue',
	'COLOR_12' => 'indigo',
	'COLOR_13' => 'purple',
	'COLOR_14' => 'pink',
	'COLOR_15' => 'red',
	'COLOR_16' => 'orange',
	'COLOR_17' => 'yellow',
	'COLOR_18' => 'green',
	'COLOR_19' => 'teal',
	'COLOR_20' => 'cyan',
	'INHERIT' => 'inherit',
	'TEXT_BS4_TPL_MANAGER_THEME_COLOR_VARS_STANDARD' => 'Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_21_INFO' => 'Here, the default colors are assigned to the bootstrap utility classes (text-primary, bg-secondary, etc.)!<br />
		You will find more information under "Documentation-> Utilitis-> Colors" on the page "https://getbootstrap.com"<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_0_INFO' => '<strong>Primary colors!</strong><br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_21' => 'Bootstrap color classes:',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_29' => 'Body background color',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_29_INFO' => 'Default background color of the theme!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_30' => 'Body-Font-Color',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_30_INFO' => 'Default font color of the theme!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_31' => 'Link-Color',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_31_INFO' => 'Default font color of hyperlinks!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_32' => 'Link-Hover-Color',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_32_INFO' => 'Default font color of hyperlinks on mouseover!<br />
		All color variables (for example, $blue or $danger), but also the Sass functions darken() (for example, darken($danger, 20%) and lighten() (for example, lighten($danger, 40%) can be used.<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_33' => 'Border-Width',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_33_INFO' => 'Default width of border in pixels (e.g. 2px)!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_34' => 'Border-Color',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_35' => 'Font color active',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_35_INFO' => 'Default font color of active elements!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_36' => 'Background active',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_36_INFO' => 'Default background color of active elements!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_37' => 'Font size',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_37_INFO' => 'Default font size, use "rem" (z.B. 0.8rem oder 1.1rem)!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_38' => 'Font size H1',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_38_INFO' => 'Font size H1, relative to default font size!<br />
		You should only change the last numbers (e.g. 2.2 instead of 2.5)!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_39' => 'Font size H2',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_40' => 'Font size H3',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_41' => 'Font size H4',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_42' => 'Font size H5',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_43' => 'Font color H1-H5',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_43_INFO' => 'Default font color H1-H5!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_44' => 'Background Inputs',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_44_INFO' => 'Background color of input form fields!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_45' => 'Font color inputs',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_45_INFO' => 'Font color of input form fields!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_46' => 'Border color inputs',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_46_INFO' => 'Border color of input form fields!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_47' => 'Background Input-Addons',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_47_INFO' => 'Background color of input addons!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_48' => 'Font color Navbar-Dark',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_48_INFO' => 'Font color for navigations with the class "navbar-dark"!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_49' => 'Font color Navbar-Dark hover',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_49_INFO' => 'Font color for navigations with the class "navbar-dark" on mouseover!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_50' => 'Font color Navbar-Dark active',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_50_INFO' => 'Font color of active links on navigations with the class "navbar-dark"!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_51' => 'Font color Navbar-Light',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_51_INFO' => 'Font color for navigations with the class "navbar-light"!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_52' => 'Font color Navbar-Light hover',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_52_INFO' => 'Font color for navigations with the class "navbar-light" on mouseover!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_53' => 'Font color Navbar-Light active',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_53_INFO' => 'Font color of active links on navigations with the class "navbar-light"!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_54' => 'Background pagination',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_54_INFO' => 'Background color of pagination-nav!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_55' => 'Background pagination hover',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_55_INFO' => 'Background color of pagination-nav on moueseover!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_56' => 'Font color pagination',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_56_INFO' => 'Font color of pagination-nav links!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_57' => 'Border color card',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_57_INFO' => 'Border color of "cards" content container!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_58' => 'Background card header/footer',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_58_INFO' => 'Background color of card-header and card-footer!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_59' => 'Background Card',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_59_INFO' => 'Background color of cards!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_60' => 'Background list-group',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_60_INFO' => 'Background color of list-groups!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_61' => 'Border color list-group',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_61_INFO' => 'Border color of list-groups!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_62' => 'Background modalbox',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_62_INFO' => 'Background color of modal popupbox!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_63' => 'Border color modalbox',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_63_INFO' => 'Border color of modal popupbox!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_64' => 'Textborder modalbox',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_64_INFO' => 'Textborder color of modal popupbox!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_65' => 'Color close modalbox',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_65_INFO' => 'Color of the "X" of modal popupbox!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_66' => 'Background breadcrumbs',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_66_INFO' => 'Background color of the breadcrumbs-nav!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_67' => 'Background dropdown',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_67_INFO' => 'Background color of dropdowns (if the mouse touches the superfish menu, additional levels are opened in a dropdown of that color)!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_68' => 'Font color dropdown',
	'TEXT_BS4_TPL_MANAGER_THEME_FIELD_68_INFO' => 'Font color of dropdowns!<br />
		Default of the template: ',
	'TEXT_BS4_TPL_MANAGER_THEME_VARS_ADD' => 'Additional sass variables',
	'TEXT_BS4_TPL_MANAGER_THEME_VARS_ADD_INFO' => 'Here additional variables can be defined (for example "$pagination-border-color: $gray-300 !default;")!<br />
		Which variables are possible for bootstrap 4 can be found in the file "admin/includes/bs4_template_manager/themes/variables.scss".<br />
		<strong>Pay attention to the spelling and to " !default" at the end!</strong><br /><br />
		<strong>Tip:</strong> Other CSS statements can also be defined here.<br />
		Headings have the additional classes "card" and "bg-h" in the template.<br />
		With the line ".card.bg-h {background-color: # c2c2c2;}" all headers get a gray background color.<br />
		Also combinations like<br />
		$link-hover-decoration: none !default;<br />
		.card.bg-h{background-color:#c2c2c2;}<br />
		are possible.',

	'TEXT_BS4_TPL_MANAGER_THEME_TAB_BUTTON' => 'Buttons',
	'TEXT_BS4_TPL_MANAGER_THEME_BUTTONS' => 'The buttons can not be changed here, because there are too many variations!<br /><br />
		Changes can be made in the file <strong>templates/bootstrap4/source/inc/css_button.inc.php</strong>.<br /><br />
		<strong>Sample:<br />
		The green button "Checkout" in the shopping cart should be displayed in blue and get another icon.</strong><br /><br />
		The modified shop system sends the information to the template - create a button with the image "button_checkout.gif" and the language string "IMAGE_BUTTON_CHECKOUT" (Checkout).<br />
		<strong>Tip:</strong> To find out which image will be called by Modified, you can switch to the template "tpl_modified" and inspect the button with a browser developer tool.<br /><br />
		The modified information is converted into a bootstrap button in css_button.inc.php.<br />
		In line 35 is the entry "button_checkout.gif".<br /><br />
		At first we search on <a href="https://fontawesome.com/icons?d=gallery&s=regular,solid&m=free" target="_blank">Font Awesome</a> for another "checkout" icon e.g. "money-bill-alt".<br />
		Now this section will change \'icon\' => \'far fa-credit-card\' into \'icon\' => \'far fa-money-bill-alt\' (far stands for regular, alternatively fa or fas can be used for solid).<br /><br />
		At <a href="https://getbootstrap.com/docs/4.6/getting-started/introduction/" target="_blank">Bootstrap</a>  we search under Documentation->Components->Buttons for the CSS classes, in our case "btn-primary".<br />
		We change \'Class\' => \'btn btn-checkout btn-success btn-block\' into \'Class\' => \'btn btn-checkout btn-primary btn-block\'<br /><br />
		Then empty caches and update the shop!<br /><br />
		<strong>Note:</strong> Some buttons are used in several places in the shop!',

	// Default Bootstrap 4 font-family
	'BS4_DEFAULT_FONT_FAMILY' => '$font-family-sans-serif: "%s", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" !default;',

	// Meldungen
	'BS4_TPL_MANAGER_THEME_ERROR' => 'The Bootstrap 4 template manager can not be used as desired!<br />
		This error has occurred: ',
	'BOOTSTRAP_CSS_COMPILED' => 'CSS file created - preview updated',
	'BS4_TPL_MANAGER_THEME_TPL_PATH_NOT_EXISTS' => 'The path to the template is incorrect!',
	'BS4_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_EXISTS' => 'The CSS file <strong>%s</strong> does not exist!',
	'BS4_TPL_MANAGER_THEME_TPL_CSS_FILE_RENAMED' => 'The CSS file <strong>%s</strong> was renamed to <strong>%s</strong>!',
	'BS4_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_RENAMED' => 'The CSS file <strong>%s</strong> could not be renamed!',
	'BS4_TPL_MANAGER_THEME_TPL_FILE_COPIED' => 'The file <strong>%s</strong> was copied to <strong>%s</strong>!',
	'BS4_TPL_MANAGER_THEME_TPL_FILE_NOT_COPIED' => 'The file <strong>%s</strong> could not be copied to the template!<br />
		The CSS file <strong>%s</strong> was renamed to <strong>%s</strong> again!',
	'BS4_TPL_MANAGER_THEME_TPL_FONT_FILE_NOT_COPIED' => 'The file <strong>%s</strong> could not be copied to the template!<br />
		The file must be loaded into the folder %s with an FTP program!',
	'BS4_TPL_MANAGER_THEME_COPY_COMPLIED' => '<h3>The theme should now be available in the shop!</h3>',

);


foreach ($lang_array as $key => $val) {
  defined($key) or define($key, $val);
}

?>