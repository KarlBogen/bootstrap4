function bs4Carousel(selector){
		var a = selector, b = " .cols";
		function makeWrap(n){
			var divs = $(a+b);
			for(var i = 0; i < divs.length; i+=n) {
				divs.slice(i, i+n).wrapAll('<div class="carousel-item pt-2"><div class="card-deck cols'+n+'"></div></div>');
			}
			$(a).each(function(){
				$(this).find(".carousel-item").first().addClass("active");
			});
			if ($(a+" .carousel-item").length > 1) {$(a+" .carousel-controls").removeClass("invisible");}
			$(a+" .carousel").removeClass("invisible");
		}
		if (window.matchMedia('(max-width: 575.98px)').matches) {
					// 1 Bild
					makeWrap(1);
		}
		else if (window.matchMedia('(max-width: 767.98px)').matches) {
					// 2 Bilder
					makeWrap(2);
		}
		else if (window.matchMedia('(max-width: 991.98px)').matches || $('#col_full').length < 1)
		{
				// 3 Bilder
					makeWrap(3);
		}
		else
		{
				// 4 Bilder
					makeWrap(4);
		}
	}
