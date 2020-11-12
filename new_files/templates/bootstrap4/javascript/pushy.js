$(function () {
    function a() {
        i.toggleClass(r), g.toggleClass(p), j.toggleClass(t), l.toggleClass(v)
    }

    function b() {
        i.addClass(r), g.animate({
            left: "0px"
        }, y), j.animate({
            left: z
        }, y), l.animate({
            left: z
        }, y)
    }

    function c() {
        i.removeClass(r), g.animate({
            left: "-" + z
        }, y), j.animate({
            left: "0px"
        }, y, function () {
            $(this)
                .removeAttr("style")
        }), l.animate({
            left: "0px"
        }, y)
    }

    function d() {
        i.toggleClass(s), h.toggleClass(q), k.toggleClass(u), m.toggleClass(v)
    }

    function e() {
        i.addClass(s), h.animate({
            right: "0px"
        }, y), k.animate({
            right: z
            , left: "auto"
        }, y), m.animate({
            right: z
        }, y)
    }

    function f() {
        i.removeClass(s), h.animate({
            right: "-" + z
        }, y), k.animate({
            right: "0px"
        }, y, function () {
            $(this)
                .removeAttr("style")
        }), m.animate({
            right: "0px"
        }, y)
    }
    var g = $(".pushy-left")
        , h = $(".pushy-right")
        , i = $("body, html")
        , j = $("#container")
        , k = $("#container")
        , l = $(".push")
        , m = $(".push")
        , n = $(".site-overlay--left")
        , o = $(".site-overlay--right")
        , p = "pushy-left pushy-left--open"
        , q = "pushy-right pushy-right--open"
        , r = "pushy-left--active hidden-x"
        , s = "pushy-right--active hidden-x"
        , t = "container-push--left"
        , u = "container-push--right"
        , v = "push-push"
        , w = $(".menu-btn--left")
        , x = $(".menu-btn--right")
        , y = 200
        , z = g.width() + "px";
    xx = function () {
            var a = document.createElement("p")
                , b = !1
                , c = {
                    webkitTransform: "-webkit-transform"
                    , OTransform: "-o-transform"
                    , msTransform: "-ms-transform"
                    , MozTransform: "-moz-transform"
                    , transform: "transform"
                };
            document.body.insertBefore(a, null);
            for (var d in c) void 0 !== a.style[d] && (a.style[d] = "translate3d(1px,1px,1px)", b = window.getComputedStyle(a)
                .getPropertyValue(c[d]));
            return document.body.removeChild(a), void 0 !== b && b.length > 0 && "none" !== b
        }();
    if (xx){
		w.click(function () {
        a()
    }), x.click(function () {
        d()
    }), n.click(function () {
        a()
    }), o.click(function () {
        d()
    });
    } else {
        g.css({
            left: "-" + z
        }), j.css({
            "overflow-x": "hidden"
        }), h.css({
            right: "-" + z
        }), k.css({
            "overflow-x": "hidden"
        });
        var A = !0;
        w.click(function () {
            A ? (b(), A = !1) : (c(), A = !0)
        }), x.click(function () {
            A ? (e(), A = !1) : (f(), A = !0)
        }), n.click(function () {
            A ? (b(), A = !1) : (c(), A = !0)
        }), o.click(function () {
            A ? (e(), A = !1) : (f(), A = !0)
        })
    }
});
