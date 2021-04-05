$(window).on('load',function() {
	$('.show_rating input').change(function () {
		var $radio = $(this);
		$('.show_rating .selected').removeClass('selected');
		$radio.closest('label').addClass('selected');
	});
});
/* Modalbox */
function loadGallery(){
	var current_image =0,selector=0,total = $('.pd_more_images a.easyimages').last().attr('data-image-id');
	if (total > 1){
		$('#show-next-image, #show-previous-image').click(function(){
			if($(this).attr('id') == 'show-previous-image'){
				current_image--;
				if (current_image < 1)current_image=total;
			} else {
				current_image++;
				if (current_image > total)current_image=1;
			}
			selector = $('[data-image-id="' + current_image + '"]');
			updateModal(selector,'image');
		});
	}
	function updateModal(selector,type) {
		var $sel = selector;
		if (type == 'image'){
			current_image = $sel.attr('data-image-id');
			var text = curtext.replace('{current}', current_image).replace('{total}', total);
			$('.modal-title').text($sel.attr('data-title'));
			if ($('.modal-body img').length){
				$('.modal-body img').attr("src", $sel.attr('data-image'));
			} else {
				$('.modal-body').append('<img class="img-fluid d-block mx-auto" src="'+$sel.attr('data-image')+'">');
			}
			if (total > 1){
				$('#show-next-image, #show-previous-image, .modal-footer .counter').show();
				$('.modal-footer .counter').empty().append(text);
			} else {
				$('#show-next-image, #show-previous-image, .modal-footer .counter').hide();
			}
		} else {
			var src = $sel.data('src');
			$('#modal .modal-dialog').addClass('src');
			$('#show-next-image, #show-previous-image, .modal-footer .counter').hide();
			$('.modal-title').text($sel.attr('title'));
			if (src.indexOf('print') != -1 || src.indexOf('bs4_') != -1) {
				var windowheight = $(window).height()-225;
				$('.modal-body').html('<iframe id="frame" src="'+src+'" width="100%" height="'+windowheight+'" frameborder="0"></iframe>');
			} else if (src.indexOf('vimeo') != -1 || src.indexOf('youtube') != -1) {
				var windowheight = $(window).height()-225;
				$('.modal-body').html('<iframe id="frame" src="'+src+'" width="100%" height="'+windowheight+'" frameborder="0" allowfullscreen=""></iframe>');
			} else {
				$('.modal-body').load(src);
			}
			if (type == 'layer'){
				$('#modal').modal('show');
			}
		}
	}
	$('a.cbimages').on('click',function(){
		updateModal($(this),'image');
	});
	$('a.iframe').on('click',function(){
		updateModal($(this),'iframe');
	});
	$("#print_order_layer").on('submit', function(event) {
		$(this).attr('data-src',$(this).attr("action") + '&' + $(this).serialize());
		updateModal($("#print_order_layer"),'layer');
		return false;
	});
}
/* Modalbox */
$(document).ready(function(){
	$('#gift_link').on('click', function(event) {
		var target = $('#gift_coupon');
		event.preventDefault();
		$('html, body').stop().animate({scrollTop: target.offset().top -20}, 1000);
		target.find('input').focus();
	});
	$('.search.dropdown').on('shown.bs.dropdown', function(e) {
		$('#inputString').focus();
	});
	/* Attribut Price Updater */
	if (typeof PriceUpdaterReady !== 'undefined' && $.isFunction(PriceUpdaterReady)) {PriceUpdaterReady();}
	/* Add slideDown animation to Bootstrap dropdown */
	$('.dropdown').on('show.bs.dropdown', function() {
		$(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	});
	$('.dropdown').on('hide.bs.dropdown', function() {
		$(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	});
	/* Copyright 2014-2015 Twitter, Inc. */
	/* Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE) */
	if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		var msViewportStyle = document.createElement('style');
		msViewportStyle.appendChild(
			document.createTextNode(
				'@-ms-viewport{width:auto!important}'
			)
		);
		document.querySelector('head').appendChild(msViewportStyle);
	}
	/* prüfen, ob Link in Navbar ansonsten ausblenden */
	if(!$(".canvasmenu a").length){$("#content_navbar2").css("display","none");}
	/* Bestsellerslider (autoslide -> interval:4000; nur per Klick -> interval:false) */
	bs4Carousel('#bs4_BsCarousel');
	/* Go to top */
	$(window).scroll(function() {if ($(this).scrollTop()) {$('.go2top').fadeIn();} else {$('.go2top').fadeOut();}});$(".go2top").click(function() {$("html, body").animate({scrollTop: 0}, 1000);});
	/* Modalbox */
	$("#modal").on('hidden.bs.modal', function () {
		$('#modal .modal-dialog').removeClass('src');
		$('.modal-title').empty();
		$('.modal-body').empty();
		$('.modal-footer .counter').empty();
	});
	$('a.iframe').each(function() {
		$(this).attr("data-src", $(this).attr("href"));
		$(this).attr("data-toggle", "modal");
		$(this).attr("data-target", "#modal");
		$(this).attr("href", "#");
	});
	loadGallery();
	/* Modalbox */
	/* aktiviere Tabs */
	$('#horizontalTab .tab-pane').removeClass('active');
	$('#bs_tabs a:first').tab('show');
	/* Accordion */
	if ($('#accordion').length > 0){
		$('#accordion .collapse').removeClass('show');
		$('.shipping').each(function(){
			if ($(this).find('input').is(':checked')) {
				$(this).children('.collapse').addClass('show');
			}
		});
		if ($('.collapse.show').length < 1){
			$('#accordion .collapse:first').collapse('show');
		}
		function toggleIcon(e) {
			$(e.target)
			.prev('.acc-header')
			.focus()
			.find(".more-less")
			.toggleClass('fa-caret-down fa-caret-up');
		}
		$('#accordion').on('hidden.bs.collapse', toggleIcon);
		$('#accordion').on('shown.bs.collapse', toggleIcon);
		$('#accordion').has('[id^="acc"]').on('shown.bs.collapse', function(e) {
			$(this).find('span[data-target="#'+e.target.id+'"] input').prop('checked', true).triggerHandler('click');
		});
	}
	/* Tooltip */
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
});