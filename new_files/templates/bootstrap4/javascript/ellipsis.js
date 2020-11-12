/* Codebasis -> https://stackoverflow.com/questions/536814/insert-ellipsis-into-html-tag-if-content-too-wide */

(function($) {

    'use strict';

    $.fn.ellipsis = function()
    {
        return this.each(function()
        {
            var el = $(this),
				lh = parseInt(el.css('line-height')),
                attr = el.attr('data-lines'),
                lines = (typeof attr !== typeof undefined && attr !== false) ? el.attr('data-lines') : '0',
                text = el.html();

            if (lines === '0') { return false }
            el.css({'height': (lh * lines) + 5, 'overflow': 'hidden'});

            var t = $(this.cloneNode(true))
                .hide()
                .css('position', 'absolute')
                .css('overflow', 'visible')
                .width(el.width())
                .height('auto')
                ;

            el.after(t);

            function height() { return t.height() > el.height(); };

            if (height()) { el.attr('title', text) }

            while (text.length > 0 && height())
            {
                text = text.substr(0, text.length - 1);
                t.html(text + '<span class="points">...</span>');
            }

            el.html(t.html());
            t.remove();
        });
    };
})(jQuery);