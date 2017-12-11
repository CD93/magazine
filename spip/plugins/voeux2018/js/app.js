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

      $('#table_carte button').on('click', function(e) {
        e.preventDefault();
        var theme =  $(this).data("theme");
        $( "#panneau" ).load( "/?page=panneau", { "theme[]": [theme] } );
        $("#blanco").show().animate({opacity: "0.8"}, 400 );
        $( "#panneau" ).animate({ left: "+=600" }, 400 );
      });
      $('#envoyer_mail').on('click', function(e) {
        e.preventDefault();
        $('#form_mail').slideToggle('300');
        $('#modale_video').slideUp('300');
        $('#voir_video').show();
      });
      // charger les popup facebook, twitter et video
      $("#partage_video").on("click",function(e){
         e.preventDefault();
         $('#form_mail').slideUp('300');
         $('#voir_video').hide();
	       $('#modale_video').slideDown('300');
	    });
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
