function prepareMenu(maxlevel,superfish,responsive){

	/* Superfishmenü wird mit Bootstrap4-Klassen versehen */
	function bigMenu(maxlevel){
		$("#res-pushy").attr('class', '');
		$("#res-nav").attr('class', '');
		$("#res-header").remove();

		var nav = '.fullmenu ul#main';
		if (maxlevel != false){
			$(nav+' ul').each(function() {
			    if($(this).attr('data-level') > maxlevel){
					$(this).remove();
				}
			});
		}
		$(nav).addClass('navbar-nav d-flex flex-wrap mr-auto');
		$(nav+' > li').addClass('nav-item');
		$(nav+' > li.hassub').addClass('dropdown');
		$(nav+' > li:has(ul)').addClass('dropdown');
		$(nav+' > li > a').addClass('nav-link');
		$(nav+' ul').addClass('dropdown-menu');
		$(nav+' ul.dropdown-menu a').addClass('dropdown-item');
		$(nav+' li.hassub > a').addClass('dropdown-toggle');
		$(nav+' li:has(ul) > a').addClass('dropdown-toggle');
		$(nav+' li:has(ul) ul').addClass('dropdown-menu');
		$(nav+' li.nav-item li:has(ul)').addClass('dropdown-submenu');
		$('.fullmenu').removeClass('invisible');
	}

	function prepMenu(){
		var a=".responsive-nav ", b="ul:not(:has(ul))";
		$(a+" ul").each(function() {
			$(a + b).each(function(){
				var c = $( this ).attr('class'), d = $(this).parent().closest("ul").attr("class"),e = $(this).attr("title");
				$( this ).addClass("xx"),
				$(this).attr("id", d);
				if (typeof e !== typeof undefined && e !== false) {
				}else{
					var f = $(this).prev("a").clone().children().remove().end().text().trim();
					$(this).attr("title", f);
				}
				$( this ).parent('li').append('<span class="next" data-target="menu-'+c+'"><span class="fa fa-chevron-right" aria-hidden="true"></span></span>');
			});
    		$(a+" ul").not('.xx').find(b).appendTo("nav.responsive-nav");
		});
		$(a+" ul").each(function() {
			$( this ).removeClass('xx');
			var i = $( this ).attr('id'), g = $( this ).attr('class'), t = $( this ).attr('title'), title = $('#currentMenu').text();
			if (typeof i == "undefined") {$(this).wrap('<div class="menu root-menu active" id="menu-'+g+'" data-name="'+title+'"></div>');
			}else{
				$(this).wrap('<div class="menu" id="menu-'+g+'" data-parent="menu-'+i+'" data-name="'+t+'"></div>');
			}
		});
		$(a).find('li.hassub:not(:has(span))').each(function(){
			var menudat = $( this ).find(' a').attr('data-value');
			$( this ).append('<span class="next" data-target="0" data-menu="'+menudat+'"><span class="fa fa-chevron-right" aria-hidden="true"></span></span>');
		});
		$('.fullmenu').removeClass('invisible');
	}

	function set_sel(){
	var w = $("#" + $(".responsive-nav li.Selected").closest("div").attr("id"));
		if (w.data(B)){
    		$(C).text(w.data(F)),
    		$(D).attr(E, w.data(B));
			set_act(w);
		}
	}

	function set_act(x){
    	$(G+A).removeClass(A),
    	$(x).addClass(A);
    	if (!$(".root-menu").hasClass(A)) {
        	$(D).addClass(A);
    	} else {
        	$(D).removeClass(A);
    	}
	}

	var A = "active"
		, B = "parent"
		, C = "#currentMenu"
		, D = "#back"
		, E = "data-target"
		, F = "name"
		, G = ".menu.";

	$('.responsive-nav').on('click', '.next', function () {
    	var Y = $(this);
    	var YY = Y.closest('div').attr('id');
    	var name = Y.prev('a').attr('title');
    	var Z = Y.attr("data-target");
    	var y = $("#" + Z);
		if (Z != 0) {
	    	$(C).text(y.data(F)),
	    	$(D).attr(E, $(G+A).attr("id")),
			set_act(y);
		} else {
			var path = Y.data("menu");
			$.get(DIR_WS_BASE+'ajax.php', {ext: 'bs4_get_subcat', type: 'json', cPath: path, parent: YY, name: name, func: 'res', speed: 1}, function(data) {
				if (data != '' && data != undefined) {
					$("nav.responsive-nav").append(data[0]);
					Y.attr('data-target', 'menu-'+data[1]);
			    	$(C).text(name);
					set_act("#menu-"+data[1]);
				} else {
					alert('AJAX-FEHLER');
					return;
				}
			});

		}
	});

	$('.responsive-nav').on('click', '#back', function () {
    	var z = $("#" + $(G+A).data(B));
    	$(C).text(z.data(F)),
    	$(D).attr(E, $(z).attr("id")),
		set_act(z);
	});

	if($('.canvasmenu').is(':hidden') && superfish == true) {
	    bigMenu(maxlevel);
	}

	if(($('.canvasmenu').is(':visible') || superfish == false) && responsive == true) {
		/* entfernt Home-Link und ID "main" */
		$('#res-pushy li.home').css('display','none');
		$('#res-pushy ul#main').removeClass('nav navbar-nav').removeAttr('id');
		prepMenu();
		set_sel();
	}
}