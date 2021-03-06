/*
 *
 *
 *                  _                   _____      _           _
 *                 | |                 / ____|    | |         | |
 *    ___ _   _ ___| |_ ___  _ __ ___ | (___   ___| | ___  ___| |_
 *   / __| | | / __| __/ _ \| '_ ` _ \ \___ \ / _ \ |/ _ \/ __| __|
 *  | (__| |_| \__ \ || (_) | | | | | |____) |  __/ |  __/ (__| |_
 *   \___|\__,_|___/\__\___/|_| |_| |_|_____/ \___|_|\___|\___|\__|
 *
 *
 * jquery.customSelect() - v0.5.1
 * http://adam.co/lab/jquery/customselect/
 * 2014-03-19
 *
 * Copyright 2013 Adam Coulombe
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @license http://www.gnu.org/licenses/gpl.html GPL2 License
 *
 * Hacked by Studio Meta \o/
 *
 */

! function(a) {
    'use strict';
    a.fn.extend({
        customSelect: function(b) {
            if ("undefined" == typeof document.body.style.maxHeight) return this;
            var c = {
                    customClass: "customSelect",
                    mapClass: !0,
                    mapStyle: !0
                },
                b = a.extend(c, b),
                d = b.customClass,
                e = function(b, c) {
                    var d = b.find(":selected"),
                        e = c.children(":first"),
                        g = d.html() || "&nbsp;";
                    e.html(g), d.attr("disabled") ? c.addClass(f("DisabledOption")) : c.removeClass(f("DisabledOption")), setTimeout(function() {
                        c.removeClass(f("Open")), a(document).off("mouseup.customSelect")
                    }, 60)
                },
                f = function(a) {
                    return d + a
                };
            return this.each(function() {
                var c = a(this),
                    g = a("<span />").addClass(f("Inner")),
                    h = a("<span />");
                c.after(h.append(g)), h.addClass(d), b.mapClass && h.addClass(c.attr("class")), b.mapStyle && h.attr("style", c.attr("style")), c.addClass("hasCustomSelect").on("render.customSelect", function() {
                    e(c, h), c.css("width", ""), parseInt(c.outerWidth(), 10) - (parseInt(h.outerWidth(), 10) - parseInt(h.width(), 10)), h.css({}), h.outerHeight(), c.attr("disabled") ? h.addClass(f("Disabled")) : h.removeClass(f("Disabled")), g.css({}), c.css({
                        "-webkit-appearance": "menulist-button",
                        position: "absolute",
                        opacity: 0
                    })
                }).on("change.customSelect", function() {
                    h.addClass(f("Changed")), e(c, h)
                }).on("keyup.customSelect", function(a) {
                    h.hasClass(f("Open")) ? (13 == a.which || 27 == a.which) && e(c, h) : (c.trigger("blur.customSelect"), c.trigger("focus.customSelect"))
                }).on("mousedown.customSelect", function() {
                    h.removeClass(f("Changed"))
                }).on("mouseup.customSelect", function(b) {
                    h.hasClass(f("Open")) || (a("." + f("Open")).not(h).length > 0 && "undefined" != typeof InstallTrigger ? c.trigger("focus.customSelect") : (h.addClass(f("Open")), b.stopPropagation(), a(document).one("mouseup.customSelect", function(b) {
                        b.target != c.get(0) && a.inArray(b.target, c.find("*").get()) < 0 ? c.trigger("blur.customSelect") : e(c, h)
                    })))
                }).on("focus.customSelect", function() {
                    h.removeClass(f("Changed")).addClass(f("Focus"))
                }).on("blur.customSelect", function() {
                    h.removeClass(f("Focus") + " " + f("Open"))
                }).on("mouseenter.customSelect", function() {
                    h.addClass(f("Hover"))
                }).on("mouseleave.customSelect", function() {
                    h.removeClass(f("Hover"))
                }).trigger("render.customSelect")
            })
        }
    })
}(jQuery);