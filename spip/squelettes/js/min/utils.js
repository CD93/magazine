var Utils=Utils||{};Utils.hasMethod=function(t,e){"use strict";t=t.length?Utils.camelCase(t):"home",e=e.length?Utils.camelCase(e):"init";var i=Pages[t];try{throw new i}catch(r){r instanceof Error;var n=r[e];try{throw new n}catch(o){return o instanceof Error,o}}},Utils.camelCase=function(t){"use strict";return t.toLowerCase().replace(/-(.)/g,function(t,e){return e.toUpperCase()})},Utils.debounce=function(t,e,i){"use strict";var r;return function(){var n=this,o=arguments,a=function(){r=null,e||i.apply(n,o)},s=e&&!r;clearTimeout(r),r=setTimeout(a,t),s&&i.apply(n,o)}},Utils.poll=function(t,e,i,r,n){"use strict";var o=Number(new Date)+(r||2e3);n=n||100,function a(){t()?e():Number(new Date)<o?setTimeout(a,n):i(new Error("timed out for "+t+": "+arguments))}()},Utils.getSize=function(t,e){"use strict";var i=$(window),r=$(t),n=$("<style>tlt{z-index:9999;position:absolute;top:0.5em;left:0.5em;display:block;padding:0.5em 0.75em;font:1em/1 sans-serif;color:#fff;background:#00f;border-radius:3px;}</style>"),o=[];e=e?e+" resize":"resize";var a=function(){r.each(function(t,e){var i=$(this),r=i.outerWidth(),n=i.outerHeight();o[t].html(r+"x"+n)})},s=Utils.debounce(300,!1,a);return this.init=function(){n.appendTo("head");for(var t=0;t<r.length;t++)o.push($("<tlt/>")),o[t].appendTo(r[t].parentNode);a(),i.on(e,s)},this.kill=function(){i.off(e,s),n.remove();for(var t=0;t<o.length;t++)o[t].remove()},this.init(),this},Utils.smoothScroll=function(){"use strict";if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=$(this.hash);if(t.length)return TweenLite.to(window,.8,{scrollTo:{y:t.offset().top},ease:Expo.easeInOut}),!1}},Utils.share=function(){var t=$(this),e={type:t.data("type"),url:t.data("url"),title:t.data("title"),msg:t.data("msg"),img:t.data("img")},i={w:screen.availWidth/2||screen.width/2,h:screen.availHeight/2||screen.height/2},r={facebook:{url:"http://www.facebook.com/sharer.php?s=100&[title]="+e.titre+"&p[summary]="+e.msg+"&p[url]="+e.url+"&p[images][1]="+e.img,name:"Facebook",features:"toolbar=0,status=0,width=580,height=607,top="+(i.h-310)+",left="+(i.w-290)},twitter:{url:"http://twitter.com/intent/tweet?text="+encodeURIComponent(e.msg),name:"Twitter",features:"scrollbars=yes,width=600,height=253,top="+(i.h-135)+",left="+(i.w-300)},pinterest:{url:"http://pinterest.com/pin/create/button/?url="+e.url+"&amp;media="+e.img+"&amp;description="+e.title,name:"Pinterest",features:"scrollbars=yes,width=760,height=520,top="+(i.h-265)+",left="+(i.w-380)}},n=r[e.type].url,o=r[e.type].name,a=r[e.type].features,s=window.open(n,o,a);return s.focus(),!1},Utils.addEndEvent=Utils.debounce(200,!1,function(t){$(this).trigger(t.type+"End")}),Utils.degToRad=function(t){return t*Math.PI/180},Utils.getRandomInt=function(t,e){return Math.floor(Math.random()*(e-t))+t};