<?php

// by Gunnar Tillmann, www.gunnart.de
// v1.2 - Juni 2009

function smarty_modifier_stripTags($Input,$Tags) {

	if($Tags && $Input) {
		$Input = preg_replace("/<\/?(".str_replace(',','|',$Tags).")(>|\s[^>]*>)/i",' ',$Input);
	}

	return $Input;

} ?>