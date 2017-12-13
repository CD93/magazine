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

      Animeglobal();
      $('#table_carte button').on('click', function(e) {
        e.preventDefault();
        clearTimeout(animglob);
        var theme =  $(this).data("theme");
        $( "#panneau" ).load( "/?page=panneau", { "theme[]": [theme] } );
        $("#blanco").show().animate({opacity: "0.8"}, 400 );
        $( "#panneau" ).animate({ left: "+=600" }, 400 );
      });
      $('#blanco').on('click', function(e) {
        $("#blanco").hide();
        $( "#panneau" ).animate({
          left: "-=600"
        }, 400)
      });
      $('#envoyer_mail').on('click', function(e) {
        e.preventDefault();
        $('#form_mail').slideToggle('300');
      });
      function tableAnime(id,lettre,) {
        $('#imt'+id).fadeTo(500,0.1, function() {
          $(this).attr("src","plugins/voeux2018/images/img"+id+lettre+".jpg").fadeTo(500,1);
        });
      }
      function Animeglobal(){
        tableAnime(95,"b",);
        setTimeout(function(){tableAnime(96,"b");},2000);
        setTimeout(function(){tableAnime(97,"b");},4000);
        setTimeout(function(){tableAnime(98,"b");},6000);
        setTimeout(function(){tableAnime(99,"b");},8000);
        setTimeout(function(){tableAnime(95,"a");},10000);
        setTimeout(function(){tableAnime(96,"a");},12000);
        setTimeout(function(){tableAnime(97,"a");},14000);
        setTimeout(function(){tableAnime(98,"a");},16000);
        setTimeout(function(){tableAnime(99,"a");},18000);
        animglob =  setTimeout(Animeglobal,20000);
      }
      // charger les popup facebook, twitter et video
      //si ancre formulaire on dépli formaulaire
      // on récupère l'ancre
      if (window.location.hash=="#btn_action") {
        $('#form_mail').slideToggle('300');
        //ancre.addClass( "active" ).parent().next('div').slideToggle(300);
        //ancre.css("background-image","url(squelettes/images/fhaut.png)");
        //ancre.attr('aria-expanded','true');
        //$(".pliage button.btn-collapse-up").show();
      }
		});
	});
});
