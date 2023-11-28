<?php
  /* --------------------------------------------------------------
   $Id: default.js.php 12435 2019-12-02 09:21:20Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2019 [www.modified-shop.org]
   --------------------------------------------------------------
   Released under the GNU General Public License
   --------------------------------------------------------------*/
?>
<script>
	$(document).ready(function(){
		// START Menü
		prepareMenu(<?php echo BS4_MAXLEVEL_IN_TOPCATMENU.', '.BS4_SUPERFISHMENU_SHOW.', '.BS4_RESPONSIVEMENU_SHOW; ?>);
		$('.sidebar').removeClass('invisible');
<?php if (BS4_USE_EASYZOOM == 'true') { ?>
		// EasyZoom
		var $easyzoom = $('.easyzoom').easyZoom();
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');
		$('.easy-thumbnails').on('click', 'a', function(e) {
			var $this = $(this);
			e.preventDefault();
			api1.swap($this.data('standard'), $this.attr('href'), [$this.attr('data-image-id'), $this.attr('data-image')]);
		});
<?php } ?>
<?php if (BS4_AWIDSRATINGBREAKDOWN == 'true') { ?>
	// ajax awids rating
	$('a.bs4_avg_container').click(function() {
		var $this = $(this);
		if($this.next('div .avg_container').length > 0) {
			$this.next('div .avg_container').slideToggle('slow');
		} else {
			var pid = $this.data("pid");
			var cssclass = $this.data("class");
			$.get(DIR_WS_BASE+'ajax.php', {ext: 'bs4_awids_rating', pid: pid, class: cssclass, speed: 1}, function(data) {
				if (data != '' && data != undefined) {
					$this.after(data);
                   	loadGallery();
					$this.next('div .avg_container').slideToggle('slow');
				} else {
					$this.insertAfter('AJAX-FEHLER');
				}
			});
		}
        $('.toggle_cart').slideUp('slow');
        $('.toggle_wishlist').slideUp('slow');
        ac_closing();
        return false;
	});
	$('html').on('click', function(e) {
		if (!$(e.target).closest('.avg_container').length > 0 ) {
			$('.avg_container').slideUp('slow');
		}
	});
<?php } ?>
		// Hintergrundfarbe aktiver Filter
		$(".filter_bar select option:selected").each(function(){if($(this).val() != "") $(this).parent().addClass('badge-<?php echo BS4_FILTERCOLOR_AKTIV; ?>');});
<?php if (BS4_BSCAROUSEL_NAME_LINES != 0) { ?>
		// Zeilenbegrenzung Artikelname Bestsellerslider
		$("#bsCarousel .lb_title").ellipsis();
		$("#bsCarousel").on('slid.bs.carousel', function ()
		{
			$("#bsCarousel .lb_title").ellipsis();
		});
<?php } ?>
<?php if (BS4_TOP_PROD_IN_SLIDER == 'true') { ?>
		// Topslider - zweiter Parameter Anzahl der sichtbaren Zeilen
		bs4Carousel('#bs4_TopCarousel',1);
<?php 	if (BS4_TOPCAROUSEL_NAME_LINES != 0) { ?>
			// Zeilenbegrenzung Artikelname
			$("#topCarousel .lb_title").ellipsis();
			$("#topCarousel").on('slid.bs.carousel', function ()
			{
				$("#topCarousel .lb_title").ellipsis();
			});
<?php 	} ?>
<?php } ?>
	});
	var curtext = "<?php echo str_replace(' ', '&nbsp;', TEXT_COLORBOX_CURRENT); ?>";
<?php if (strpos($PHP_SELF, 'checkout') !== false) { ?>
	$('#button_checkout_confirmation').on('click',function() {
		$(this).hide();
	});
<?php }
// Beginn Autocomplete
if (SEARCH_AC_STATUS == 'true') { ?>
  var session_id = '<?php echo xtc_session_id(); ?>';
  $('body').on('keydown paste cut input focus', '#inputString', delay(function() {
    if ($(this).length == 0) {
      $('#suggestions').hide();
    } else {
      var post_params = $('#quick_find').serialize();

      $.ajax({
        dataType: "json",
        type: 'post',
        url: '<?php echo DIR_WS_BASE; ?>ajax.php?ext=get_autocomplete&MODsid='+session_id,
        data: post_params,
        cache: false,
        async: true,
        success: function(data) {
          if (data !== null && typeof data === 'object') {
            if (data.result !== null && data.result != undefined && data.result != '') {
              $('#autoSuggestionsList').html(decode_ajax(data.result));
              $('#suggestions').slideDown();
            } else {
              $('#suggestions').slideUp();
            }
          }
        }
      });
    }
  }, 500));
  function delay(fn, ms) {
    let timer = 0;
    return function(args) {
      clearTimeout(timer);
      timer = setTimeout(fn.bind(this, args), ms || 0);
    }
  }
  function decode_ajax(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
  }
  $('body').on('click', function (e) {
    if ($(e.target).closest("#suggestions").length === 0) {
      ac_closing();
    }
  });
<?php
}
if (SEARCH_AC_STATUS == 'true' || (basename($PHP_SELF) != FILENAME_SHOPPING_CART && strpos($PHP_SELF, 'checkout') === false)) { ?>
	function ac_closing() {
		setTimeout("$('#suggestions').slideUp();", 100);
	}
<?php
}
// Ende Autocomplete
// Beginn Alert
?>
	function alert(message, title) {
		title = title || "<?php echo TEXT_LINK_TITLE_INFORMATION; ?>";
		$.alertable.alert('<span id="alertable-title"></span><span id="alertable-content"></span>', {
			html: true
		});
		$('#alertable-content').html(message);
		$('#alertable-title').html(title);
	}
<?php
// Ende Alert
// Beginn Aufklappen Warenkorb und Merkzettel
if (basename($PHP_SELF) != FILENAME_SHOPPING_CART && strpos($PHP_SELF, 'checkout') === false) {
?>
	$(function() {
		$('#toggle_cart').click(function() {
			$('.toggle_cart').slideToggle('slow');
			$('.toggle_wishlist').slideUp('slow');
			ac_closing();
			return false;
		});
		$('html').on('click', function(e) {
			if (!$(e.target).closest('.toggle_cart').length > 0 ) {
				$('.toggle_cart').slideUp('slow');
			}
		});
<?php if (DISPLAY_CART == 'false' && isset($_SESSION['new_products_id_in_cart'])) {
		unset($_SESSION['new_products_id_in_cart']); ?>
		$('.toggle_cart').slideToggle('slow');
		timer = setTimeout(function(){$('.toggle_cart').slideUp('slow');}, 3000);
		$('.toggle_cart').mouseover(function() {clearTimeout(timer);});
<?php } ?>
	});
	$(function() {
		$('#toggle_wishlist').click(function() {
			$('.toggle_wishlist').slideToggle('slow');
			$('.toggle_cart').slideUp('slow');
			ac_closing();
			return false;
		});
		$('html').on('click', function(e) {
			if (!$(e.target).closest('.toggle_wishlist').length > 0 ) {
				$('.toggle_wishlist').slideUp('slow');
			}
		});
<?php if (DISPLAY_CART == 'false' && isset($_SESSION['new_products_id_in_wishlist'])) {
		unset($_SESSION['new_products_id_in_wishlist']);
?>
		$('.toggle_wishlist').slideToggle('slow');
		timer = setTimeout(function(){$('.toggle_wishlist').slideUp('slow');}, 3000);
		$('.toggle_wishlist').mouseover(function() {clearTimeout(timer);});
<?php } ?>
	});
<?php
} else {
unset($_SESSION['new_products_id_in_cart']);
unset($_SESSION['new_products_id_in_wishlist']);
}
// Ende Aufklappen Warenkorb und Merkzettel
// Beginn Touch
if (BS4_TOUCH_USE == 'true') { ?>
	$(function () {
		$('#navbar').doubleTapToGo();
	});
<?php
}
// Ende Touch
// Beginn Erweiterte Validation im Registrierungsformular
if (BS4_ADVANCED_JS_VALIDATION == 'true' && (strpos($PHP_SELF, FILENAME_CREATE_ACCOUNT) !== false || strpos($PHP_SELF, FILENAME_CREATE_GUEST_ACCOUNT) !== false)) {
	require_once (DIR_FS_EXTERNAL.'password_policy/password_policy.php');
?>
	$(function () {
		var key, hasWarnings;
		var classWarnings = "text-danger";
		var strWarnings = $("#create_account #bs4_error").html();
		var warnings = {
<?php
	if (defined('ENTRY_GENDER_ERROR')) echo '			"' . html_entity_decode(ENTRY_GENDER_ERROR) . '" : "gender",' . PHP_EOL;
	if (defined('ENTRY_FIRST_NAME_ERROR')) echo '			"' . html_entity_decode(ENTRY_FIRST_NAME_ERROR) . '" : "firstname",' . PHP_EOL;
	if (defined('ENTRY_LAST_NAME_ERROR')) echo '			"' . html_entity_decode(ENTRY_LAST_NAME_ERROR) . '" : "lastname",' . PHP_EOL;
	if (defined('ENTRY_DATE_OF_BIRTH_ERROR')) echo '			"' . html_entity_decode(ENTRY_DATE_OF_BIRTH_ERROR) . '" : "dob",' . PHP_EOL;
	if (defined('ENTRY_EMAIL_ADDRESS_ERROR')) echo '			"' . html_entity_decode(ENTRY_EMAIL_ADDRESS_ERROR) . '" : "email_address",' . PHP_EOL;
	if (defined('ENTRY_EMAIL_ADDRESS_CHECK_ERROR')) echo '			"' . html_entity_decode(ENTRY_EMAIL_ADDRESS_CHECK_ERROR) . '" : "email_address",' . PHP_EOL;
	if (defined('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS')) echo '			"' . html_entity_decode(ENTRY_EMAIL_ADDRESS_ERROR_EXISTS) . '" : "email_address",' . PHP_EOL;
	if (defined('ENTRY_EMAIL_ERROR_NOT_MATCHING')) echo '			"' . html_entity_decode(ENTRY_EMAIL_ERROR_NOT_MATCHING) . '" : "confirm_email_address",' . PHP_EOL;
	if (defined('ENTRY_STREET_ADDRESS_ERROR')) echo '			"' . html_entity_decode(ENTRY_STREET_ADDRESS_ERROR) . '" : "street_address",' . PHP_EOL;
	if (defined('ENTRY_POST_CODE_ERROR')) echo '			"' . html_entity_decode(ENTRY_POST_CODE_ERROR) . '" : "postcode",' . PHP_EOL;
	if (defined('ENTRY_CITY_ERROR')) echo '			"' . html_entity_decode(ENTRY_CITY_ERROR) . '" : "city",' . PHP_EOL;
	if (defined('ENTRY_STATE_ERROR')) echo '			"' . html_entity_decode(ENTRY_STATE_ERROR) . '" : "state",' . PHP_EOL;
	if (defined('ENTRY_STATE_ERROR_SELECT')) echo '			"' . html_entity_decode(ENTRY_STATE_ERROR_SELECT) . '" : "state",' . PHP_EOL;
	if (defined('ENTRY_COUNTRY_ERROR')) echo '			"' . html_entity_decode(ENTRY_COUNTRY_ERROR) . '" : "country",' . PHP_EOL;
	if (defined('ENTRY_TELEPHONE_NUMBER_ERROR')) echo '			"' . html_entity_decode(ENTRY_TELEPHONE_NUMBER_ERROR) . '" : "telephone",' . PHP_EOL;
	if (defined('ENTRY_PASSWORD_ERROR')) echo '			"' . sprintf(html_entity_decode(ENTRY_PASSWORD_ERROR), ENTRY_PASSWORD_MIN_LENGTH) . '" : "password",' . PHP_EOL;
	if (defined('ENTRY_PASSWORD_ERROR_MIN_LOWER')) echo '			"' . sprintf(html_entity_decode(ENTRY_PASSWORD_ERROR_MIN_LOWER), POLICY_MIN_LOWER_CHARS) . '" : "password",' . PHP_EOL;
	if (defined('ENTRY_PASSWORD_ERROR_MIN_UPPER')) echo '			"' . sprintf(html_entity_decode(ENTRY_PASSWORD_ERROR_MIN_UPPER), POLICY_MIN_UPPER_CHARS) . '" : "password",' . PHP_EOL;
	if (defined('ENTRY_PASSWORD_ERROR_MIN_NUM')) echo '			"' . sprintf(html_entity_decode(ENTRY_PASSWORD_ERROR_MIN_NUM), POLICY_MIN_NUMERIC_CHARS) . '" : "password",' . PHP_EOL;
	if (defined('ENTRY_PASSWORD_ERROR_MIN_CHAR')) echo '			"' . sprintf(html_entity_decode(ENTRY_PASSWORD_ERROR_MIN_CHAR), POLICY_MIN_SPECIAL_CHARS) . '" : "password",' . PHP_EOL;
	if (defined('ENTRY_PASSWORD_ERROR_NOT_MATCHING')) echo '			"' . html_entity_decode(ENTRY_PASSWORD_ERROR_NOT_MATCHING) . '" : "confirmation",' . PHP_EOL;
	if (defined('ENTRY_PRIVACY_ERROR')) echo '			"' . html_entity_decode(ENTRY_PRIVACY_ERROR) . '" : "privacy",' . PHP_EOL;
	if (defined('ERROR_VVCODE_POPUP')) echo '			"' . html_entity_decode(ERROR_VVCODE_POPUP) . '" : "vvcode",' . PHP_EOL;
?>
		};
<?php
    echo '        $("#create_account [name=\'street_address\']").blur(function() {if(!/[1-9]/.test(this.value) && this.value.length >= ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . '){$(\'#number-error\'). slideDown(200)}else{$(\'#number-error\').slideUp(200)}});' . PHP_EOL;
    if ($_SESSION['language_code'] == 'de') {
        echo '        $("#create_account [name=\'street_address\']").parent().append(\'<div id="number-error" style="width: 95%; float: left; display: none;"><span class="\' + classWarnings + \'">Hausnummer fehlt!</span> Ignorieren Sie diese Meldung wenn Sie keine haben.</div>\');' . PHP_EOL;
    } else if ($_SESSION['language_code'] == 'en') {
        echo '        $("#create_account [name=\'street_address\']").parent().append(\'<div id="number-error" style="width: 95%; float: left; display: none;"><span class="\' + classWarnings + \'">House number is missing!</span> Ignore this message if you have no house number.</div>\');' . PHP_EOL;
    }  else {
        echo '        $("#create_account [name=\'street_address\']").parent().append(\'<div id="number-error" style="width: 95%; float: left; display: none;"><span class="\' + classWarnings + \'">House number is missing!</span> Ignore this message if you have no house number.</div>\')' . PHP_EOL;
    }
?>
        for (key in warnings) {
            if (typeof strWarnings != "undefined" && strWarnings.indexOf(key) != -1) {
                $("#create_account [name='" + warnings[key] + "']").parent().append('<div class="create-account-warning-text" style="width: 95%; float: left;">' + key + '</div>').addClass(classWarnings);
                if (hasWarnings != 1) {
                    $("#create_account #bs4_error").css("display", "none");
                    $("#create_account [name='password'], #create_account [name='confirmation'], #create_account [name='vvcode']").parent().addClass(classWarnings);
                }
                hasWarnings = 1;
            }
        }
    });
<?php
}
// Ende Erweiterte Validation im Registrierungsformular
// Beginn KK-Megamenü
if(!empty($KK_MEGAS) && BS4_SUPERFISHMENU_SHOW == 'true') {
?>
	(function($){
		//define the defaults
		$.fn.KKMega = function(options){
			//set default options
			var defaults = {
				rows: 3,
				max: ''
			};
			//call in the default otions
			var options = $.extend(defaults, options);
			var $KKMegaObj = this;
			return $KKMegaObj.each(function(options){
				megaSetup();
				function megaSetup(){
					$($KKMegaObj).each(function(){
						if (this.id != 'main') {
							$(this).addClass('kk-mega');
						}
						$('li',this).addClass('kk-mega');
						$('ul',this).addClass('kk-mega');
						var percent = Math.floor(100/defaults.rows);
						$('li.kk-mega.level2',this).css( "width", percent +"%" );
						$('li.level2 ul',this).removeClass('dropdown-menu');
						$('li.level2 a',this).removeClass('dropdown-toggle');
						if (defaults.max != '') {
							$('li.kk-mega.level2 ul').find('ul').each(function() {
								$(this).insertAfter($(this).parent('li')).children('li').unwrap();
							});
							$('li.kk-mega.level2 ul').each(function() {
								var limax = $(this).find('li:eq('+(defaults.max -1)+')');
								var linext = $(this).find('li:eq('+defaults.max+')').length;
								if (linext > 0) {
									if ($(this).find('li.active').length < 1 && $(this).find('li.morecats').length < 1){
										$(limax).nextAll('li').addClass('d-none');
										$(limax).parent('ul').closest('li').nextAll('li').not('.level2').addClass('d-none');
										$(limax).after('<li class="morecats my-2"><a href=""><span class="more"><?php echo BS4_MORECATS_SHOW; ?></span></a></li>');
									} else if($(this).find('li.active').length > 0 && $(this).find('li.morecats').length < 1){
										$(limax).after('<li class="morecats my-2"><a href=""><span class="more"><?php echo BS4_MORECATS_HIDE; ?></span></a></li>');
									}
								}
							});
						}
					});
				}
			});
		};
	})(jQuery);
	$(document).ready(function(){
<?php foreach ($KK_MEGAS as $megas) {
	$mega = explode("-", $megas);
?>
		$('#<?php echo $mega[0]; ?>').KKMega({
			rows: '<?php echo $mega[1]; ?>',
			max: '<?php if (isset($mega[2]))echo $mega[2]; ?>'
		});
<?php } ?>
		$('ul#main').on('click', '.morecats', function(e) {
			$(this).find('span').text($(this).text() == '<?php echo BS4_MORECATS_SHOW; ?>' ? '<?php echo BS4_MORECATS_HIDE; ?>' : '<?php echo BS4_MORECATS_SHOW; ?>');
			$(this).nextAll('li').toggleClass("d-none");
			e.preventDefault();
		});
	});
<?php
}
// Ende KK-Megamenü
// Beginn Menü per Ajax nachladen
if (BS4_CATEGORIESMENU_AJAX == 'true') {
?>
	$('.box_category').on('click', '.category_button', function() {
		var $this = $(this);
		if($this.next('ul').length > 0) {
			$this.next('ul').slideToggle();
			$this.toggleClass("fa-chevron-right fa-chevron-up");
		} else {
			var path = $this.data("value");
			$.get(DIR_WS_BASE+'ajax.php', {ext: 'bs4_get_subcat', type: 'html', cPath: path, func: 1, speed: 1}, function(data) {
				if (data != '' && data != undefined) {
					$this.after(data);
					$this.next('ul').slideToggle();
					$this.toggleClass("fa-chevron-right fa-chevron-up");
				} else {
					$this.insertAfter('AJAX-FEHLER');
				}
			});
		}
<?php
if (BS4_CATEGORIESMENU_AJAX_SCROLL == 'true') {
?>
		if($('.canvasmenu').is(':visible')) {
			var col = $('#col_left');
			col.animate({scrollTop: col.scrollTop() + $this.offset().top -20}, 1000);
		} else {
			$('html, body, #col_left').stop().animate({scrollTop: $this.offset().top -20}, 1000);
		}
<?php
}
?>
	});
<?php
}
if(BS4_SUPERFISHMENU_SHOW == 'true') {
?>
	if($('.canvasmenu').is(':hidden')) {
		$('ul#main').find('ul').remove();
		$('ul#main')
			.on('mouseenter', 'li.hassub', function () {
				clearTimeout(this.timer);
				var	sel = $(this).find('>a'),
					func = $(this).hasClass('kk-mega') ? 'mega' : 'main';
				if(sel.next('ul').length > 0) {
					sel.next('ul').show();
				} else {
					var	path = sel.data("value"),
						fullpath = '<?php echo isset($_GET['cPath']) ? $_GET['cPath'] : ''; ?>';
					$.get(DIR_WS_BASE+'ajax.php', {ext: 'bs4_get_subcat', type: 'html', cPath: path, fpath: fullpath, func: func, speed: 1}, function(data) {
						if (data != '' && data != undefined) {
							sel.after(data);
							prepBigMenu(<?php echo BS4_MAXLEVEL_IN_TOPCATMENU; ?>, path);
<?php foreach ($KK_MEGAS as $megas) {
	$mega = explode("-", $megas);
?>
							if (func == 'mega'){
								$('#<?php echo $mega[0]; ?>').KKMega({
									rows: '<?php echo $mega[1]; ?>',
									max: '<?php if (isset($mega[2]))echo $mega[2]; ?>'
								});
							}
<?php } ?>
							sel.next('ul').show();
						} else {
							sel.after('AJAX-FEHLER');
						}
					});
				}
			})
			.on('mouseleave', 'li.hassub', function () {
				this.timer = setTimeout(function() {
					$(this).children('ul').hide();
				}.bind(this), 200);
			});
	}
	// refresh the page only if you're crossing into a context
	var context;
	var small = window.matchMedia("(max-width:991.98px)");
	var large = window.matchMedia("(min-width:992px)");
	if($('.canvasmenu').is(':hidden')) {
		context = 'large';
	} else {
		context = 'small';
	}
	$(window).resize(function() {
		if((small.matches) && (context != 'small')) {
			location.reload();
		} else if ((large.matches) && (context != 'large')) {
			location.reload();
		}
	});
<?php
}
// Ende Menü per Ajax nachladen
// Beginn Canvasmenü fixed top
if(BS4_MENUBAR_FIXEDTOP == 'true') {
?>
	if($('.canvasmenu').is(':visible')) {
		$('#container').addClass('pt');
		$('#navbar').attr('class','fixed-top top2 navbar navbar-expand mb-3 text-center clearfix <?php echo BS4_MENUBAR_FIXEDTOP_CLASSES; ?>');
		$('.nav-logo').detach().insertAfter('.can-left');
		$('#logobar .nav').removeClass('col-md-8');
<?php
if(BS4_LOGOBAR_FIXEDTOP == 'true') {
?>
		$('#container').addClass('pt2');
		$('#logobar').detach().appendTo('.canvasmenu').removeClass('row mb-3');
		$('#logobar .nav').removeClass('mt-3');
<?php
}
?>
	}
<?php
}
// Ende Canvasmenü fixed top
// Beginn Maxlevel Standardmenü
if(BS4_CATEGORIESMENU_MAXLEVEL != 'false') {
?>
	function stdMenu(maxlevel){
		$('#categorymenu ul').each(function() {
			if($(this).attr('data-level') > maxlevel){
				$(this).parent('li').find('.category_button').remove();
				$(this).remove();
			}
		});
	}
	stdMenu(<?php echo BS4_CATEGORIESMENU_MAXLEVEL; ?>);
<?php
}
// Ende Maxlevel Standardmenü
?>
</script>