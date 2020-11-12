<?php

/*
Buttons ins Bootstrapdesign umwandeln

Karl 16.03.2019
 */
require_once ('templates/' . CURRENT_TEMPLATE . '/source/inc/css_button.inc.php');

function smarty_modifier_bs4button($Input = '', $image = false, $parameters = '', $submit = false) {
	if ($image){
		$button = css_button($image, $Input, $parameters, $submit);
		return $button;
	}
}
?>
