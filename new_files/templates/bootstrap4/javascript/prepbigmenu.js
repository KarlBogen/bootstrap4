function prepBigMenu(maxlevel, path){
	var nav = '.fullmenu ul#main #li'+path;
	if (maxlevel != false){
		$(nav+' ul').each(function() {
		    if($(this).attr('data-level') > maxlevel){
				$(this).remove();
			}
		});
	}
	$(nav+' ul').addClass('dropdown-menu');
	$(nav+' ul.dropdown-menu a').addClass('dropdown-item');
	$(nav+' li:has(ul) > a').addClass('dropdown-toggle');
	$(nav+' li:has(ul) ul').addClass('dropdown-menu');
	$(nav+' li.nav-item li:has(ul)').addClass('dropdown-submenu');
}