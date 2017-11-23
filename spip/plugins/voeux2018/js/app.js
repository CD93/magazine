requirejs.config({
    //By default load any module IDs from js/lib
    baseUrl: 'plugins/voeux2018/js',
    //except, if the module ID starts with "app",
    //load it from the js/app directory. paths
    //config is relative to the baseUrl, and
    //never includes a ".js" extension since
    //the paths config could be for a directory.
    paths: {
        jquery: 'jquery.3.2.1.min',
        cookie: 'js.cookie'
    }
});
require(['domReady'], function (domReady) {
	domReady(function () {
		require(['jquery','cookie'], function ($, cookie) {
      $('area').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        $("#panneau").css("left","0px");
				var offsets = $('#carte').offset();
				var left = offsets.left;
				decal = 0;
				if(left <= 500) {
					decal = 500 - left ;
					$("#carte").css("left",decal);
				}
      });
			$('#fermer_menu').click(function(e) {
				e.preventDefault();
				cookie.set('menuouvert', 'non');
				console.log(cookie.get('menuouvert'));
				$("#nav-collapse").css("left","-280px");
				$("#main").css("left",0);
				$('#menu_ferme').hide(250);
        $(':not(#menu_ferme)').find('select, input, textarea, button, a').attr('aria-hidden','false');
        $('#menu_ferme').find('select, input, textarea, button, a').attr('aria-hidden','true');
				findInsiders($('#menu_ferme'));
			});
        //image map responsive
        var $img = $('img[usemap]');
    		var rwdImageMap=function(){$img.each(function(){if(void 0!==$(this).attr("usemap")){var t=this,a=$(t);$("<img />").on("load",function(){var t="width",r="height",i=a.attr(t),e=a.attr(r);if(!i||!e){var n=new Image;n.src=a.attr("src"),i||(i=n.width),e||(e=n.height)}var h=a.width()/100,s=a.height()/100,c=a.attr("usemap").replace("#",""),d="coords";$('map[name="'+c+'"]').find("area").each(function(){var t=$(this);t.data(d)||t.data(d,t.attr(d));for(var a=t.data(d).split(","),r=new Array(a.length),n=0;n<r.length;++n)r[n]=n%2==0?parseInt(a[n]/i*100*h):parseInt(a[n]/e*100*s);t.attr(d,r.toString())})}).attr("src",a.attr("src"))}})};
    			var decal;
          rwdImageMap();
          $(window).resize(rwdImageMap).trigger('resize');
		});
	});
});
